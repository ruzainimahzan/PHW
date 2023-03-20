<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Roaster;
use Redirect,Response;
use Calendar;

class EventController extends Controller
{
    //   public function index()

    // {

    //     if(request()->ajax()) 
    //     {
    //      $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
    //      $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

    //      $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);

    //      return Response::json($data);
    //     }
    //     return view('fullcalendar');

    // }

    public function index()

    {

       $events = [];

       $data = Roaster::all();

       if($data->count()){

          foreach ($data as $key => $value) {

            $start = date('g:ia', strtotime($value->start));
            $end = date('g:ia', strtotime($value->end));
            $events[] = Calendar::event(

                $start."-".$end."\n".$value->title."\n Mohamad Khuzairie \n mohamad afiq bin rohani" ,

                true,

                new \DateTime($value->start_date),

                new \DateTime($value->end_date.' +1 day'),

                $value->id


            );

          }

       }

      $calendar = Calendar::addEvents($events); 

      return view('pages.mycalendar', compact('calendar'));

    }

   

    public function create(Request $request)

    {  

        $insertArr = [ 'title' => $request->title,

                       'start' => $request->start,

                       'end' => $request->end

                    ];
        
        $event = Event::insert($insertArr);   

        return Response::json($event);

    }

     

 

    public function update(Request $request)

    {   

        $where = array('id' => $request->id);

        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];

        $event  = Event::where($where)->update($updateArr);

 

        return Response::json($event);

    } 

 

 

    public function destroy(Request $request)

    {

        $event = Event::where('id',$request->id)->delete();

   

        return Response::json($event);

    }    

 

 

    

}


