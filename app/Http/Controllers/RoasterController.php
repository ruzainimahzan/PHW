<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Roaster;
use App\Models\CategoryRoaster;
use App\Models\Users;
use App\Models\Patient;
use App\Models\RoasterList;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use Auth;
use Redirect,Response;
use Calendar;
use Carbon\Carbon;

class RoasterController extends Controller
{
    //
    //  public function index()
    // {
       
    //     if(request()->ajax()) 
    //     {
    //      $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
    //      $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
    //      $data = Roaster::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end','patients_id','staff_id']);
   
    //      return Response::json($data);
    //     }

    //     $users =  DB::table('users')->get();
    //    	$patientnursing = DB::table('patients_nursing')->get();
    //     return view('pages.fullcalendar', compact('users', 'patientnursing'));
    // }

    public function index()

    {
        $users =  DB::table('users')->get();
       	$patientnursing = DB::table('patients_nursing')->get();
    //    $events = [];

    //    $data = Roaster::all();
        
    //     $users =  DB::table('users')->get();
    //    	$patientnursing = DB::table('patients_nursing')->get();
    //    if($data->count()){

    //       foreach ($data as $key => $value) {

    //         $start = date('g:ia', strtotime($value->start));
    //         $end = date('g:ia', strtotime($value->end));
    //         $events[] = Calendar::event(

    //             $start."-".$end."\n".$value->title."\n Mohamad Khuzairie \n mohamad afiq bin rohani" ,

    //             true,

    //             new \DateTime($value->start_date),

    //             new \DateTime($value->end_date.' +1 day'),

    //             $value->id


    //         );

    //       }

    //    }

    //   $calendar = Calendar::addEvents($events); 
    $calendar = Roaster::all();
    // return view('admin.appointments.index', compact('appointments'));

      return view('pages.fullcalendar', compact('calendar','users','patientnursing'));

    }
    



    public function create(Request $request)
    {  
    	$title = $request->title;
    	$dateroaster = $request->dateRoaster;
  
    	$time_start = $request->timestart;
    	$time_end = $request->timeend;
    	
    	$startDT = date('Y-m-d H:i:s', strtotime("$dateroaster $time_start"));
    	$endDT = date('Y-m-d H:i:s', strtotime("$dateroaster $time_end"));
    	$patients_id = $request->patientsid;
    	$staff_id = $request->staffid;

    	$roaster = new Roaster;
        $roaster->title = $title;
        $roaster->start = $startDT;
        $roaster->end = $endDT;
        $roaster->patients_id = $patients_id;
        $roaster->staff_id = $staff_id;
        $roaster->created_by = Auth::id();
        $roaster->save();


  		return redirect()->route('roaster_index');
    }


    public function destroy(Request $request)
    {

        $roaster = Roaster::where('id',$request->id)->delete();
        return Response::json($roaster);

    }    

    public function timetableroaster()
    {
        return view('pages.timetableroaster');
    }
     
    public function roaster()
    {
   
        return view('pages.roaster');
    }
    
    public function roaster_edit(Request $request)
    {
      
        $idroasterlisting = $request->id;
        return view('pages.roaster_edit',compact('idroasterlisting'));
    }

    public function roasterfind(Request $request)
    {
        $id = $request->id;

        $data = RoasterList::join('category_roaster', 'roaster_list.category_roaster', '=', 'category_roaster.id')
        ->where('id_roaster_list',$id)
        ->first();
  
        return response()->json($data);
    }


    public function getCategoryRoaster()
    {
    
        $data = CategoryRoaster::get();
        return response()->json($data);
    }
    
    public function getPatient(){

        $data = Patient::get();
        return response()->json($data);
    } 

    public function getStaff(){
       
        $data = Users::where('department_id',4)->get();
        return response()->json($data);
    }

    public function getRoasterList(){
        $data = RoasterList::join('category_roaster', 'roaster_list.category_roaster', '=', 'category_roaster.id')->get();
     
        return response()->json($data);
    }


    public function getRoasterListPatient(Request $request){
      
        $roasterlist = RoasterList::where('id_roaster_list',$request->id_roaster_listing)->first();
     
        if($roasterlist->category_roaster == 1){
            
            $data = Roaster::leftjoin('users', 'roasters.id_staff', '=', 'users.id')
            ->select('roasters.id','roasters.day','roasters.id_staff','roasters.clockin','roasters.clockout','roasters.id_patients','roasters.id_roaster_list')
            ->where('id_patients', $request->id_patients)
            ->where('id_roaster_list',$request->id_roaster_listing)
            ->get();
            // ->toSql();
            // dd($data);

            return response()->json($data);
        }
        else{
            $data = Roaster::join('users', 'roasters.id_staff', '=', 'users.id')
            ->select('roasters.id','roasters.day','roasters.id_staff','roasters.clockin','roasters.clockout','roasters.id_patients','roasters.id_roaster_list')
            ->where('id_roaster_list',$request->id_roaster_listing)
            ->get();

            return response()->json($data);
        }
       
        
   
    }

    public function submit(Request $request) {
     
        $this->validate($request, [
            
            'categoryroaster' => 'required|not_in:0',
            'myDate' => 'required',
            
        ]);
         $newmonth = Carbon::createFromFormat('Y-m', $request->myDate)->format('m');
         $newyear = Carbon::createFromFormat('Y-m', $request->myDate)->format('Y');

        $RoasterList = new RoasterList;
        $RoasterList->category_roaster = $request->categoryroaster;
        $RoasterList->month_roaster = $newmonth;
        $RoasterList->year_roaster = $newyear;
        $RoasterList->save();
        return response()->json(null, 200);

    }

    public function submitroaster(Request $request){
 
     $roaster = $request->roasters;
     foreach($roaster as $ro){
          
          $roasterlist = RoasterList::where('id_roaster_list',$ro['id_roaster_list'])->first();

          if($roasterlist->category_roaster == 1)
            {
                $roas = Roaster::updateOrCreate(
                    ['id_roaster_list' => $ro['id_roaster_list'] , 'day' => $ro['day'] ,'id_patients' => $ro['id_patients']],
                    ['id_staff' => $ro['id_staff'] , 'clockin' =>  $ro['clockin'] , 'clockout' => $ro['clockout']]
                );
            }

            else
            {
                $roas = Roaster::updateOrCreate(
                    ['id_roaster_list' => $ro['id_roaster_list'] , 'day' => $ro['day'],'id_staff' => $ro['id_staff']],
                    ['clockin' =>  $ro['clockin'] , 'clockout' => $ro['clockout']]
                );
            }
         
     }

        return response()->json(null, 200);
    }


    public function removeroaster(Request $request)
    {
        
        $Roasterdel = Roaster::where('id',$request->id)->delete();
        return response()->json(null, 200);
    }

    // public function checkroaster(Request $request){
    //     $check = Roaster::where('id',$request->id)->first();
        
    // }
}
