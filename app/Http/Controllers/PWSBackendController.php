<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Get;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use Hash;
use Session;
use Auth;
use Mail;
use App\Models\Users;
use App\Models\Patient;
use App\Models\Patient_Nursing;
use App\Models\PatientRelative;
use App\Models\Treatment;
use App\Models\Department;
use App\Models\Role;
use App\Models\soap_method;
use App\Models\Report;
use App\Models\Diagnose;
use App\Models\MovementJoint;
use App\Helpers\Helper;
use App\Models\Payments;
use App\Models\Type_Session;
use App\Models\Assigned;
use Request;



class PWSBackendController extends Controller
{
  public function __construct()
	{
    	$this->middleware('auth');
	}
  public function index()
  {

    return View::make('pages.login');
  }

  public function home()
  {

    return \View::make('master_template')
    ->nest('content','home');
  }

  public function register_user()
  {

    $department =  DB::table('department')->select('id_department', 'name_department')->get();
    $role =  DB::table('role')->select('id_role', 'name_role')->get();

    $liststaff = DB::table('users')
    ->join('role','role.id_role','=','users.role_id')
    ->join('department','department.id_department' ,'=','users.department_id')
    ->select('users.*','role.name_role','department.name_department')
    ->where('users.role_id','!=','1')
    ->whereNull('deleted_at')
    ->get();


    return \View::make('master_template')
    ->nest('content','registration_user',array('department' => $department,'role' => $role ,'liststaff' => $liststaff ));
  }


 
  public function therapist_patient($id){


    $department =  DB::table('department')->select('id_department', 'name_department')->get();
    $role =  DB::table('role')->select('id_role', 'name_role')->get();

    $listpatient = DB::table('users')
    ->join('patients','patients.staff_no','=','users.staff_no')
    ->join('diagnose', 'patients.id_patients', '=', 'diagnose.id_patients')
    ->where('patients.staff_no',$id)
    ->get();

    // dd($listpatient);
    return View::make('pages.list_totalpatient_therapist',['listpatient'=> $listpatient, 'department'=> $department, 'role'=> $role]);
    // return view('master_template')->nest('content','list_totalpatient_therapist',['listpatient'=> $listpatient, 'department'=> $department, 'role'=> $role ]);


  }

  public function ShowSummaryReport($id){


    $patientlist = DB::table('patients')
    ->select('*')
    ->join('diagnose', 'patients.id_patients', '=', 'diagnose.id_patients')
    ->join('treatment', 'diagnose.id_diagnose', '=', 'treatment.id_diagnose')
    ->whereNull('deleted_at');
    
    if($id != "0"){
     $time = strtotime($id);

     $newformat = date('Y-m-d',$time);


     $patientlist  = $patientlist->where('treatment.date_treatment',$newformat) ;
   }
   $patientlist = $patientlist->get();

   $listpatient = DB::table('treatment')
   ->select('*')
   ->join('report_diagnose','treatment.id_diagnose','=','report_diagnose.id_treatment_diagnose')
   ->where('report_diagnose.id_report_diagnose',$id)
   ->first();


   $contents = view('list_ofpatient',['listpatient'=> $listpatient , 'patientlist' => $patientlist]);
   $data = $contents->render();
   return response()->json( array( 'data'=>$listpatient) );


 }



 public function edit_staff($id){

  $userdetails = DB::table('users')
  ->join('role','role.id_role','=','users.role_id')
  ->join('department','department.id_department' ,'=','users.department_id')
  ->select('users.*','role.name_role','department.name_department')
  ->where('id', $id)
  ->first(); 

  $liststaff = DB::table('users')
  ->join('role','role.id_role','=','users.role_id')
  ->join('department','department.id_department' ,'=','users.department_id')
  ->select('users.*','role.name_role','department.name_department')
  ->where('users.role_id','!=','1')
  ->get();
  $department =  DB::table('department')->select('id_department', 'name_department')->get();
  $role =  DB::table('role')->select('id_role', 'name_role')->get();

  $contents = view('registration_user',['userdetails'=> $userdetails , 'liststaff' => $liststaff ,'role' => $role ,'department' => $department]);
  $data = $contents->render();
  return response()->json( array( 'data'=>$userdetails) );


}

public function edit_staff_process()
{
 $user_id = input::get('user_id');
 $staff_no     =  Input::get('staff_no');
 $fullname    =   Input::get('fullname');
 $lastname    =  Input::get('lastname');
 $email        =  Input::get('email');
 $role_id         =  Input::get('role');
 $department_id   =  Input::get('department');

 $update_user = DB::table('users')
 ->where('id', $user_id)
 ->update(['staff_no' => $staff_no , 'fullname' => $fullname , 'lastname' => $lastname , 'email' => $email , 'role_id' => $role_id ,'department_id' => $department_id]);

 return redirect()->route('register_user')
 ->withSuccessMessage('Successfully Edit!');
}

public function delete_staff($id)
{
  $deletestaff = Users::find($id);
  if($deletestaff->delete()){
    return redirect()->route('register_user')
    ->withSuccessMessage('Successfully Delete!');
  }
  else
  {
    return redirect()->route('register_user');              
  }

}

public function delete_relative($id){

  $deleterelative = PatientRelative::find($id);

  if($deleterelative->delete()){
   return redirect()->route('relativeshow',[$deleterelative->id_patients])
   ->withSuccessMessage('Successfully Delete!');
 }
 else{
  return redirect()->route('relative_list');              }

}

public function register_patient()
{

  $listpatient = DB::table('patients')
  ->select('*')
  ->orderBy('created_at', 'DESC')
  ->whereNull('deleted_at')
  ->get();

  $list_session = DB::table('type_sessions')
  ->select('*')
  ->get();
  
  return View::make('pages.registration_patient',['listpatient'=> $listpatient , 'list_session' => $list_session]);

}

public function register_patient_nursing()
{

  $listpatient = DB::table('patients_nursing')
  ->select('*')
  ->whereNull('deleted_at')
  ->get();

  return \View::make('master_template')
  ->nest('content','registration_patient_nursing',['listpatient'=> $listpatient]);
}

public function add_patient(Request $request)
{

  $v = Validator::make(Request::all() , [
    'fullname' => 'required'
  ]);

  if ($v->fails())
  {
    return redirect()->route('register_patient')
    ->with('RegistrationError', "Please Fill All Information!");
  }
  else
  {
    $countPatient = Patient::get()->count();

    $invID = str_pad($countPatient + 1, 5, '0', STR_PAD_LEFT);
    $com_name =  "PT";
    $combine = $com_name.$invID;
    $Patients         = new Patient;
    $Patients->fullname_patients    =   Input::get('fullname');
    $Patients->ic_patients        =  Input::get('icnum');
    $Patients->age        =  Input::get('age');
    $Patients->gender        =  Input::get('gender');
    $Patients->phone_number        =  Input::get('phonenum');
    $Patients->address_patients        =  Input::get('address');
    $Patients->register_at        =  Input::get('registerat');
    $Patients->mrn_no = $combine;
    $Patients->created_by = Auth::id();
    $Patients->save();

    return redirect()->route('register_patient')
    ->with('RegistrationSuccess', "Registration Success");
  }
}

public function add_patient_nursing()
{

  $Patients         = new Patient_Nursing;
  $Patients->fullname_patients    =   Input::get('fullname');
  $Patients->lastname_patients    =  Input::get('lastname');
  $Patients->ic_patients        =  Input::get('icnum');
  $Patients->age        =  Input::get('age');
  $Patients->gender        =  Input::get('gender');
  $Patients->phone_number        =  Input::get('phonenum');
  $Patients->address_patients        =  Input::get('address');
  $Patients->save();

  return redirect()->route('register_patient_nursing')
  ->withSuccessMessage('Successfully Add!');
}

public function add_patient_relative()
{
  $v = Validator::make(Request::all() , [
    'fullname-relative' => 'required',
    'lastname-relative' => 'required',
    'phonenum-relative' => 'required',

  ]);

  if ($v->fails())
  {
    return redirect()->route('register_patient')
    ->with('RegistrationError', "Please Fill All Information!");
  }
  else
  {

    $PatientsRelative         = new PatientRelative;
    $PatientsRelative->fullname_relatives    =   Input::get('fullname-relative');
    $PatientsRelative->lastname_relatives    =  Input::get('lastname-relative');
    $PatientsRelative->id_patients        =  Input::get('user_id');
    $PatientsRelative->phone_no_relatives        =  Input::get('phonenum-relative');
    $PatientsRelative->save();

    return redirect()->route('register_patient')
    ->withSuccessMessage('Successfully Add!');
  }
}

public function add_patient_nursing_relative()
{
  $v = Validator::make(Request::all() , [
    'fullname-relative' => 'required',
    'lastname-relative' => 'required',
    'phonenum-relative' => 'required',

  ]);

  if ($v->fails())
  {
    return redirect()->route('register_patient')
    ->with('RegistrationError', "Please Fill All Information!");
  }
  else
  {

    $PatientsRelative         = new PatientRelative;
    $PatientsRelative->fullname_relatives    =   Input::get('fullname-relative');
    $PatientsRelative->lastname_relatives    =  Input::get('lastname-relative');
    $PatientsRelative->id_patients        =  Input::get('user_id');
    $PatientsRelative->phone_no_relatives        =  Input::get('phonenum-relative');
    $PatientsRelative->type        =  "Nursing";
    $PatientsRelative->save();

    return redirect()->route('register_patient_nursing')
    ->withSuccessMessage('Successfully Add!');
  }
}

public function edit_patient($id){

  $listpatient = DB::table('patients')
  ->select('*')
  ->get();

  $detailspatient = DB::table('patients')
  ->where('id_patients',$id)
  ->first();

  $contents = view('pages.registration_patient',['listpatient'=> $listpatient ,'detailspatient' => $detailspatient]);
  $data = $contents->render();
  return response()->json( array( 'data'=>$detailspatient) );

}

public function edit_patient_nursing($id){

  $listpatient = DB::table('patients_nursing')
  ->select('*')
  ->get();

  $detailspatient = DB::table('patients_nursing')
  ->where('id_patients',$id)
  ->first();

  $contents = view('registration_patient_nursing',['listpatient'=> $listpatient ,'detailspatient' => $detailspatient]);
  $data = $contents->render();
  return response()->json( array( 'data'=>$detailspatient) );

}

public function edit_patient_process()
{
 $user_id = input::get('user_id');
 $fullname    =   Input::get('fullname');
 $lastname    =  Input::get('lastname');
 $icnum        =  Input::get('icnum');
 $age        =  Input::get('age');
 $gender         =  Input::get('gender');
 $phonenum         =  Input::get('phonenum');
 $address         =  Input::get('address');

 $update_patient = DB::table('patients')
 ->where('id_patients', $user_id)
 ->update(['fullname_patients' => $fullname , 'lastname_patients' => $lastname , 'ic_patients' =>$icnum ,'age'=>$age,'gender'=> $gender,  'phone_number' => $phonenum, 'address_patients' => $address]);

 return redirect()->route('register_patient')
 ->withSuccessMessage('Successfully Edit!');
}

public function edit_patient_nursing_process()
{
 $user_id = input::get('user_id');
 $fullname    =   Input::get('fullname');
 $lastname    =  Input::get('lastname');
 $icnum        =  Input::get('icnum');
 $age        =  Input::get('age');
 $gender         =  Input::get('gender');
 $phonenum         =  Input::get('phonenum');
 $address         =  Input::get('address');

 $update_patient = DB::table('patients_nursing')
 ->where('id_patients', $user_id)
 ->update(['fullname_patients' => $fullname , 'lastname_patients' => $lastname , 'ic_patients' =>$icnum ,'age'=>$age,'gender'=> $gender,  'phone_number' => $phonenum, 'address_patients' => $address]);

 return redirect()->route('register_patient_nursing')
 ->withSuccessMessage('Successfully Edit!');
}

public function delete_patient($id){

  $deletepatient = Patient::find($id);
  if($deletepatient->delete()){
   return redirect()->route('register_patient',[$deletepatient->id_patients])
   ->withSuccessMessage('Successfully Delete!');
 }
 else{
  return redirect()->route('register_patient');              }

}

public function delete_patient_nursing($id){

  $deletepatient = Patient_Nursing::find($id);
  if($deletepatient->delete()){
   return redirect()->route('register_patient_nursing',[$deletepatient->id_patients])
   ->withSuccessMessage('Successfully Delete!');
 }
 else{
  return redirect()->route('register_patient');              }

}

public function register_patient_detail()
{

  return \View::make('master_template')
  ->nest('content','registration_patient_detail');
}

public function relativeshow($id)
{

  $listrelative = DB::table('relative_patients')
  ->select('*')
  ->where('id_patients','=',$id)
  ->get();

  $patients = DB::table('patients')
  ->where('id_patients',$id)
  ->select('fullname_patients')
  ->first();

  return View::make('pages.relative_list',['listrelative'=> $listrelative, 'patient' => $patients]);
  
}

public function edit_patient_relative($id)
{

  $listrelative = DB::table('relative_patients')
  ->select('*')
  ->get();

  $detailsrelative = DB::table('relative_patients')
  ->where('id_rel_patients',$id)
  ->first();

  $patients = DB::table('patients')
  ->where('id_patients',$detailsrelative->id_patients )
  ->select('fullname_patients')
  ->first();

  $contents = view('relative_list',['listrelative'=> $listrelative ,'detailsrelative' => $detailsrelative ,'patient' => $patients]);
  $data = $contents->render();
  return response()->json( array( 'data'=>$detailsrelative) );
}

public function edit_patient_relative_process()
{

  $user_id = input::get('user_id');
  $fullname_relative = input::get('fullname-relative');
  $lastname_relative     =  Input::get('lastname-relative');
  $phonenum_relative    =   Input::get('phonenum-relative');


  $update_patient = DB::table('relative_patients')
  ->where('id_rel_patients', $user_id)
  ->update(['fullname_relatives' => $fullname_relative , 'lastname_relatives' => $lastname_relative  , 'phone_no_relatives' => $phonenum_relative ]);

  return redirect()->route('register_patient')
  ->withSuccessMessage('Successfully Edit!');

}

public function logout(Request $request) 
{
  Auth::logout();
  return redirect('/login');
}

public function therapist_form()
{
 $detailspatient = [];
 $methodlist = [];
 
 $queryjoints = [];
 $queryattendance =[];
 //dd($queryorto);
 $list_session = DB::table('type_sessions')
 ->select('*')
 ->get();
 

 return \View::make('master_template')
 ->nest('content','therapist_form',array('detailspatient' => $detailspatient,'methodlist' => $methodlist , 'queryattendance' => $queryattendance, 'queryjoints' => $queryjoints ,'list_session'=> $list_session));
}



public function therapist_list()
{

  $therapistlisting = DB::table('patients')
  ->select('*')
  ->join('diagnose', 'patients.id_patients', '=', 'diagnose.id_patients')
  ->join('type_sessions','diagnose.id_type_session','=','type_sessions.id_type_sessions')
  ->whereNull('patients.deleted_at')
  ->get();

  return \View::make('master_template')
  ->nest('content','therapist_listing',['therapistlisting'=> $therapistlisting]);
}



public function therapist_edit($id_diagnose)
{


  $query = DB::table('patients')
  ->select('*')
  ->join('diagnose','patients.id_patients','=','diagnose.id_patients')
  ->where('diagnose.id_diagnose',$id_diagnose)
  ->first();

  if($query)
  {
    $methodobj = DB::table('summary_diagnose')
    ->select('*')
    ->where('id_patients','=',$query->id_patients)
    ->get();

    $querysimplereport = DB::table('report_diagnose')
    ->select('*')
    ->where('id_patients','=',$query->id_patients)
    ->get();

    $queryorto = DB::table('diagnose')
    ->select('*')
    ->join('treatment','treatment.id_diagnose','=','diagnose.id_diagnose')
    ->where('diagnose.id_diagnose','=',$query->id_diagnose)
    ->first();

    $queryjoints = DB::table('movement_joint')
    ->select('*')
    ->where('id_patients','=',$query->id_patients)
    ->get();

   
    $queryattendance = DB::table('treatment')
    ->join('patients','patients.id_patients','=','treatment.id_patients')
  //->join('user','department.id_department' ,'=','users.department_id')
    ->select('treatment.*','patients.fullname_patients AS treatment_fullname')
    ->where('treatment.id_patients','=',$query->id_patients)
    ->where('id_diagnose',$query->id_diagnose)
    ->get();


    $queryPayment = DB::table('payments')
    ->where('id_diagnose','=',$query->id_diagnose)
    ->get();

    

    $currentsession = $queryattendance->count();
    return \View::make('pages.therapist_form_edit',array('detailspatient' => $query,'methodlist' => $methodobj,'simplereport' => $querysimplereport,'queryattendance'=> $queryattendance, 'queryjoints'=> $queryjoints, 'queryorto' => $queryorto ,'id_diagnose' => $id_diagnose,'currentsession'=> $currentsession,'queryPayment' => $queryPayment));
  }
  else
  {
    return redirect()->back()->withInput()->with('TherapistError', "Patient IC not found.");
  }

}


public function add_attendance()
{
 $id = Input::get('user_id');
 $id_diagnose = Input::get('id_diagnose');
 $time_in  = date("H:i", strtotime(Input::get('attendance-timein')));
 $time_out  = date("H:i ", strtotime(Input::get('attendance-timeout')));
 $date=date_create(Input::get('attendance-date'));
 $newdate = date_format($date,"Y-m-d");
 //ini create
 $TherapistTreatment         = new Treatment;
 $TherapistTreatment->date_treatment        =  $newdate;
 $TherapistTreatment->time_in        =  $time_in ; //date_format(Input::get('attendance-timein'),"hh:mm:ss");
 $TherapistTreatment->time_out        =  $time_out ;//date_format(Input::get('attendance-timeout'),"hh:mm:ss");
 $TherapistTreatment->treatment_therapist = Input::get('attendance-therapist_id');
 $TherapistTreatment->id_patients = Input::get('attendance-patient_id');
 $TherapistTreatment->treatment_amount = Input::get('attendance-amount');
 $TherapistTreatment->id_diagnose = $id_diagnose;
 $TherapistTreatment->save();

 $method         = new soap_method;
 $method->id_patients        =  $id;
 $method->date_method = $newdate;
 //id treatment diagnose  == id_diagnose
 $method->id_treatment_diagnose = $TherapistTreatment->id_treatment;
 $method->save();
 
 $data_assign = new Assigned;
 $data_assign->id_diagnose = $id_diagnose;
 $data_assign->id_staff = Auth::user()->staff_no;
 $data_assign->id_treatment =$TherapistTreatment->id_treatment;
 $data_assign->save();


 //ini update
 //nie ah update untuk session gune cara yg sama je bro
  $update_current_sessions = Diagnose::find($id_diagnose);
  $cursession =   $update_current_sessions->current_session;
  $update_current_sessions->current_session = $cursession + 1;
  $update_current_sessions->save();


  return redirect()->route('therapist_edit',$id_diagnose);

}

public function edit_attendance(){

  //sini buat edit
 $id = Input::get('user_id');
 $id_diagnose = Input::get('id_diagnose');
 $time_in  = date("H:i", strtotime(Input::get('attendance-timein')));
 $time_out  = date("H:i ", strtotime(Input::get('attendance-timeout')));
 $date=date_create(Input::get('attendance-date'));
 $newdate = date_format($date,"Y-m-d");
 $id_treatment = Input::get('id_treatment');
 $treatment_amount = Input::get('attendance-amount_edit');

 $TherapistTreatment = DB::table('treatment')
 ->where('id_treatment',$id_treatment)
 ->update(['treatment_amount' => $treatment_amount]);


 return $this->therapist_edit( $id_diagnose );  

}

public function add_methodsoap()
{

  $id = Input::get('method_user_id');
  $id_diagnose = Input::get('id_diagnose');
  $date=date_create(Input::get('datemethod'));
  $newdate = date_format($date,"Y-m-d");

  $method         = new soap_method;
  $method->id_patients        =  $id;
  //id treatment diagnose  == id_diagnose
  $method->id_treatment_diagnose = $id_diagnose;
  $method->date_method        =  $newdate;
  $method->s_method        =  Input::get('smethod');
  $method->o_method        =  Input::get('omethod');
  $method->a_method        =  Input::get('amethod');
  $method->p_method        =  Input::get('pmethod');
  $method->save();


  return $this->therapist_edit( $id_diagnose );
}
public function delete_method($id){
//dd("here");
  $query = DB::table('summary_diagnose')
  ->select('id_patients','id_treatment_diagnose')
  ->where('id_summary_diagnose','=',$id)
  ->first();

  $deletemethod = soap_method::find($id);
  $deletemethod->delete();
  return $this->therapist_edit( $query->id_treatment_diagnose );

}

public function delete_attendance($id){

  $query = DB::table('treatment')
  ->select('id_patients','id_diagnose')
  ->where('id_treatment','=',$id)
  ->first();

  $deletemethod = Treatment::find($id);
  $deletemethod->delete();
  return $this->therapist_edit( $query->id_diagnose );

}

public function add_simplereport()
{
  $date=date_create(Input::get('reportdate'));
  $newdate = date_format($date,"Y-m-d");

  $id = Input::get('user_id');
  $id_diagnose = Input::get('id_diagnose');
  $SimpleReport         = new Report;
  $SimpleReport->id_patients        =  $id;
  $SimpleReport->report_date     =  $newdate;
  $SimpleReport->id_treatment_diagnose = $id_diagnose;
  $SimpleReport->report_description        =  Input::get('reportdescription');

  $SimpleReport->save();
  return $this->therapist_edit( $id_diagnose );
}

public function delete_report($id){


  $query = DB::table('report_diagnose')
  ->select('id_patients','id_treatment_diagnose')
  ->where('id_report_diagnose','=',$id)
  ->first();

  $deletereport = Report::find($id);
  $deletereport->delete();

  return $this->therapist_edit( $query->id_treatment_diagnose );
}

public function find_patient($id = null)
{
  $ic_patients = Input::get('ic_patients');
  
  if( is_null($id) ){
    $querycol = 'ic_patients';
    $queryope = 'LIKE';
    $querywhere = '%'.$ic_patients.'%';

  }
  else{
    $querycol = 'id_patients';
    $queryope = '=';
    $querywhere = $id;
  }
  
  $query = DB::table('patients')
  ->select('fullname_patients','ic_patients','phone_number','address_patients','id_patients')
  ->where($querycol,$queryope,$querywhere);
  if( is_null($id)) {
    $query = $query->orwhere('phone_number', 'LIKE', '%'.$ic_patients.'%');
  } 
  $query = $query->first();

  if($query)
  {
    $methodobj = DB::table('summary_diagnose')
    ->select('*')
    ->where('id_patients','=',$query->id_patients)
    ->get();

    $querysimplereport = DB::table('report_diagnose')
    ->select('*')
    ->where('id_patients','=',$query->id_patients)
    ->get();

    // $queryorto = DB::table('diagnose')
    // ->select('*')
    // ->where('id_patients','=',$query->id_patients)
    // ->first();

    $queryjoints = DB::table('movement_joint')
    ->select('*')
    ->where('id_patients','=',$query->id_patients)
    ->get();

    $queryattendance = DB::table('treatment')
    ->join('patients','patients.id_patients','=','treatment.id_patients')
  //->join('user','department.id_department' ,'=','users.department_id')
    ->select('treatment.*','patients.fullname_patients AS treatment_fullname')
    ->where('treatment.id_patients','=',$query->id_patients)
    ->get();

    $list_session = DB::table('type_sessions')
    ->select('*')
    ->get();
    

    return \View::make('master_template')
    ->nest('content','therapist_form',array('detailspatient' => $query,'methodlist' => $methodobj,'simplereport' => $querysimplereport,'queryattendance'=> $queryattendance, 'queryjoints'=> $queryjoints,'list_session' => $list_session));
  }
  else
  {
    return redirect()->back()->withInput()->with('TherapistError', "Patient IC not found.");
  }
}

public function pdf_report(){
  try{

    $id_diagnose = Input::get('pdf_id_diagnose');
    dd($id_diagnose);
    $id = Input::get('pdf_user_id');
    //nursing report
    $pdf_id = Input::get('pdf_id_diagnose');

    $ReportType = Input::get('type_report');
    $data = [];

    $Arylist = config('ReportConfig.Report');
    $path = $table = $pdfname = $typepatient = '';


    if (!empty($Arylist)) {
      foreach ($Arylist as $reportname => $Array) {
        if (is_array($Array)) {
          if( $reportname ==  $ReportType){
            foreach ($Array as $key => $value) {
              $path = array_get($Array, 'pathReport');
              $table = array_get($Array, 'table');
              $pdfname = array_get($Array, 'pdfname');
              $typepatient = array_get($Array, 'patient');
           
            }
          }
        }
      }
    }

    $user=[];

    if( !empty($path) && !empty($table) && !empty($typepatient)){

      if( !is_null($id_diagnose) ){
        if($table == "treatment"){
          $data = DB::table($table)
          ->select('*')
          ->where('id_patients','=',$id)
          ->get();
        }
        else if($table == "summary_diagnose"){
        
          $data = DB::table($table)
          ->select('*')
          ->join('treatment','treatment.id_treatment','=','summary_diagnose.id_treatment_diagnose')
          ->where('treatment.id_diagnose','=',$id_diagnose)
          // ->get();
          ->toSql();
          dd($data);
     
        }
        else if($table == "diagnose")
        {
          $data = DB::table($table)
          ->select('*')
          ->where('id_diagnose','=',$id_diagnose)
          ->get();
        }
        else if($table == "nursing_monthly_report" &&  $ReportType == "nursing_monthly_report")
        {
          // console.log("Test");
          $data = DB::table('nursing_monthly_report')
          ->select('*')
          ->leftjoin('diagnose_nursing','nursing_monthly_report.id_diagnose','=','diagnose_nursing.id_diagnose')
          ->leftjoin('patients','diagnose_nursing.id_patients','=','patients.id_patients')
          ->where('id_monthly_report','=',$id_diagnose)
          ->get();

        }
        else if($table == "nursing_daily_report" &&  $ReportType == "nursing_daily_report")
        {
          $data = DB::table('nursing_daily_report')
          ->select('*')
          ->leftjoin('diagnose_nursing','nursing_daily_report.id_diagnose','=','diagnose_nursing.id_diagnose')
          ->leftjoin('patients','diagnose_nursing.id_patients','=','patients.id_patients')
          ->where('id_daily_report','=',$id_diagnose)
          ->get();
        }
        else if($table == "nursing_assessment_report" &&  $ReportType == "nursing_assessment_report")
        {
          $data = DB::table('nursing_assessment_report')
          ->select('*')
          ->leftjoin('diagnose_nursing','nursing_assessment_report.id_diagnose','=','diagnose_nursing.id_diagnose')
          ->leftjoin('patients','diagnose_nursing.id_patients','=','patients.id_patients')
          ->where('id_assessment_report','=',$id_diagnose)
          ->get();

          


        }
        else{
   
          $data = DB::table($table)
          ->select('*')
          ->where('id_patients','=',$id)
     // ->where('id_diagnose','=',$id_diagnose)
          ->get();
        }
        $user = DB::table($typepatient)
        ->select('*')
        ->join('diagnose_nursing', 'patients.id_patients', '=', 'diagnose_nursing.id_patients')
        ->where('patients.id_patients','=',$id)
        ->first();

        $userdiagnose = DB::table($typepatient)
        ->select('*')
        ->join('diagnose', 'patients.id_patients', '=', 'diagnose.id_patients')
        ->where('patients.id_patients','=',$id)
        ->first();



      }



      if(count($data)){

        $refdiagnose = DB::table('diagnose')
        ->select('reference_no')
        ->where('id_diagnose','=',$id_diagnose)
        ->first();

        $pdf = \App::make('snappy.pdf.wrapper');
  
        $pdf->setOption('dpi', 150);
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        $pdf->loadView($path, compact('data','user','refdiagnose','userdiagnose'))->setPaper('a4', 'portrait');
        return $pdf->download($pdfname, array('Attachment' => true));

      }else{
        return redirect()->back()->withInput()->with('TherapistError', "No Data to Print.");
      }
    }
    else{
      return redirect()->back()->withInput()->with('TherapistError', "Please Contact Developer for Troubleshoot.");
    }
  }
  catch (Exception $e) {
    return redirect()->back()->withInput()->with('TherapistError', "Please Contact Developer for Troubleshoot.");
  }

}

public function save_ortherapist(Request $request)
{


 $list_session = DB::table('type_sessions')
 ->select('*')
 ->get();

//  dd($request::get('id_type_session'));
 $id_diagnose_latest = input::get("id_diagnose_latest");
 $id_patients = input::get("id_patients");
 $doctor_diagnose = input::get("doctor_diagnose");
 $doctor_management = input::get("doctor_management");
 $problem = input::get("problem");
 $observation =input::get("observation");
 $palpation = input::get("palpation");
 $current_history = input::get("current_history");
 $past_history = input::get("past_history");
 $pain_scale = input::get("pain_scale");
 $area = input::get("area");
 $nature = input::get("nature");
 $agg = input::get("agg");
 $hours = input::get("hours");
 $irrirability_id = input::get("irrirability_id");
 $general_health = input::get("general_health");
 $pmhx_surgery = input::get("pmhx_surgery");
 $medication_steroid = input::get("medication_steroid");
 $mri_xray = input::get("mri_xray");
 $occupation_recreation = input::get("occupation_recreation");
 $neurological_motor = input::get("neurological_motor");
 $neurological_seasation = input::get("neurological_seasation"); 
 $neurological_reflexes = input::get("neurological_reflexes");
 $short_term_goals = input::get("short_term_goals");
 $long_term_goals = input::get("long_term_goals");
 $physiotherapist_impression = input::get("physiotherapist_impression");
 $plan_of_treatment = input::get("plan_of_treatment");
 $special_test = input::get("special_test");
 $clearing_test_other_joins = input::get("clearing_test_other_joins");
 $id_type_session = input::get("id_type_session");
 $total_session = input::get("total_session");
 $price_session = input::get("price_session");
 $current_session = input::get("current_session");

 $data = Diagnose::where('id_diagnose',$id_diagnose_latest)
 ->update([ 'id_patients' => $id_patients ,
   'doctor_diagnose' => $doctor_diagnose,
   'doctor_management' => $doctor_management,
   'problem' => $problem,
   'observation' => $observation,
   'palpation' => $palpation,
   'current_history' => $current_history,
   'past_history' => $past_history,
   'pain_scale'=>$pain_scale,
   'area' => $area,
   'nature' => $nature,
   'agg'=> $agg,
   'hours'=>$hours, 
   'irrirability_id'=>$irrirability_id,
   'general_health'=>$general_health,
   'pmhx_surgery'=>$pmhx_surgery, 
   'medication_steroid'=>$medication_steroid,
   'mri_xray'=>$mri_xray,
   'occupation_recreation'=>$occupation_recreation, 
   'neurological_motor'=>$neurological_motor, 
   'neurological_seasation'=>$neurological_seasation, 
   'neurological_reflexes'=>$neurological_reflexes, 
   'short_term_goals'=>$short_term_goals,
   'long_term_goals'=>$long_term_goals,
   'physiotherapist_impression'=>$physiotherapist_impression,
   'plan_of_treatment'=>$plan_of_treatment,
   'special_test'=>$special_test,
   'clearing_test_other_joins'=>$clearing_test_other_joins,
   'id_type_session'=>$id_type_session,
   'total_session'=>$total_session,
   'price_session'=>$price_session,
   'current_session'=>$current_session]);

//  $data =  Diagnose::create(Request::except('submit', '_token','fullname_patients','ic_patients','address_patients','phone_number','id_type_session','total_session','current_session','price_session'));


 //update reference no 
 $countDiagnose = Diagnose::get()->count();
 $diagnoseID = str_pad($countDiagnose + 1, 5, '0', STR_PAD_LEFT);
 $file =  "FLPT";
 $combine = $file.$diagnoseID;
 $data_ref = Diagnose::find($id_diagnose_latest);
 $data_ref->reference_no = $combine;
 $data_ref->save();


 $data_others = Diagnose::find($id_diagnose_latest);
 $data_others->id_type_session = input::get("id_type_session");
 $data_others->total_session = input::get("total_session");
 $data_others->current_session = input::get("current_session");
 $data_others->price_session = input::get("price_session");
 $data_others->save();
 $iddd = Request::input('id_patients');

 return redirect()->route('therapist_edit',$id_diagnose_latest)->with('ortherapistSuccess','Your data was entered successfully');
//  return $this->therapist_edit($id_diagnose_latest)->with('ortherapistSuccess','Your data was entered successfully');
}

public function add_joint_movement()
{
  $id = Input::get('user_id');
  $id_diagnose = Input::get('id_diagnose');
  $movementjoint         = new MovementJoint;
  $movementjoint->id_patients        =  $id;
  $movementjoint->id_diagnose        = $id_diagnose;
  $movementjoint->name_joints        =  Input::get('name_joints');
  $movementjoint->status_joints        =  Input::get('status_joints');
  $movementjoint->remark_joints        =  Input::get('remark_joints');
  $movementjoint->save();

  return $this->therapist_edit($id_diagnose);
  
}

public function delete_joints($id){

  $query = DB::table('movement_joint')
  ->select('id_patients')
  ->where('id_movement_joint','=',$id)
  ->first();

  $deletereport = MovementJoint::find($id);
  $deletereport->delete();

  return $this->find_patient($query->id_patients);
}


public function add_payment(Request $request){



  if($request::hasFile('file_attachment')) {
   $request::validate([
    'payment_date'     =>  'required',
    'payment_paid'     =>  'required'
  ]);

            // Get filename with extension            
   $filenameWithExt = $request::file('file_attachment')->getClientOriginalName();
            // Get just filename
   $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
           // Get just ext
   $extension = $request::file('file_attachment')->getClientOriginalExtension();

            //Filename to store
   $fileNameToStore = $filename.'_'.time().'.'.$extension; 
            //dd($fileNameToStore);                      
          // Upload Image

   $id_diagnose = $request::input('id_diagnose');


   $path = $request::file('file_attachment')->storeAs('public/files_payment', $fileNameToStore);
   $id_diagnose = $request::input('id_diagnose');
   $payment = new Payments;
   $date=date_create($request::input('payment_date'));
   $payment_date = date_format($date,"Y-m-d");
   $payment->payment_date = $payment_date;
   $payment->type_payment = $request::input('type_payment');
   $payment->file_attachment = $fileNameToStore;
   $payment->id_diagnose = $request::input('id_diagnose');
   $payment->id_patients = $request::input('user_id');
   $payment->id_treatment_ref = $request::input('id_treatment');
   $total_payment = $request::input('total_payment');
   $paypaid = $request::input('payment_paid');
   $bal = $total_payment - $paypaid;
   $payment->total_payment = $total_payment;
   $payment->balance_payment = $bal;
   $payment->payment_paid = $paypaid;
   $payment->status_verified = "Not Verified";
   $payment->department = "Therapist";
   $payment->id_user = Auth::id();
   $payment->save();

   $balance = Diagnose::where('id_diagnose',$request::input('id_diagnose'))
   ->update(['balance_amount' => $bal]);

   $diagnosedetails = Diagnose::where('id_diagnose',$request::input('id_diagnose'))
   ->first();

   $treatmentdetails = Treatment::where('id_diagnose',$request::input('id_diagnose'))
   ->first();

   $patientsname = Patient::select('fullname_patients','ic_patients','address_patients')
   ->where('id_patients',  $request::input('user_id'))
   ->first();
   $physioname =  DB::table('users')
   ->where('id',  Auth::id())
   ->first();
   

   if($diagnosedetails->total_session != null){

   }

   $to_name="PHW";
   $to_email=config('mail.mail_admin_phw');
   $data=array("personincharge"=>$physioname->fullname ,"namepatients"=>$patientsname->fullname_patients,"datepayment"=>$payment_date,"diagnose"=>$diagnosedetails->problem,"summary_treatment" => $treatmentdetails->summary_treatment,"total_payment" => $total_payment ,"paid" =>$paypaid);
   Mail::send('mails.notifypayment',$data,function($message) use ($to_name,$to_email){
    $message->to($to_email)
    ->subject('Notify Payment');
  });

  return redirect()->route('therapist_edit',$id_diagnose);
}

}

public function edit_payment(Request $request)
{

  if($request::hasFile('file_attachment')) {
    $request::validate([
     'payment_date'     =>  'required',
     'payment_paid'     =>  'required'
   ]);
 
             // Get filename with extension            
    $filenameWithExt = $request::file('file_attachment')->getClientOriginalName();
             // Get just filename
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            // Get just ext
    $extension = $request::file('file_attachment')->getClientOriginalExtension();
 
             //Filename to store
    $fileNameToStore = $filename.'_'.time().'.'.$extension; 
             //dd($fileNameToStore);                      
           // Upload Image
 
    $id_diagnose = $request::input('id_diagnose');
 
 
    $path = $request::file('file_attachment')->storeAs('public/files_payment', $fileNameToStore);
    $id_diagnose = $request::input('id_diagnose');
    $id_payment = $request::input('id_payment');

    $countPayments = Payments::where('reference_no','!=',NUll)->get()->count();
    $pyID = str_pad($countPayments + 1, 5, '0', STR_PAD_LEFT);
    $file =  "RC";
    $combineReceipt = $file.$pyID;

    $date=date_create($request::input('payment_date'));
    $payment_date = date_format($date,"Y-m-d");
    $payment = DB::table('payments')
    ->where('id_payment', $id_payment)
    ->update(['payment_date' => $payment_date , 
    'reference_no' => $combineReceipt,
    'type_payment' => $request::input('type_payment'),
    'file_attachment' => $fileNameToStore,
    'id_diagnose' => $request::input('id_diagnose'),
    'id_patients' => $request::input('user_id'),
    'payment_paid' => $request::input('payment_paid'),
    'status_verified' => "Not Verified",
    'department' => "Therapist",
      'id_user' => Auth::id(),
    ]);
   
      
    $diagnosedetails = Diagnose::where('id_diagnose',$request::input('id_diagnose'))
    ->first();
 
    $treatmentdetails = Treatment::where('id_diagnose',$request::input('id_diagnose'))
    ->first();
 
    $patientsname = Patient::select('fullname_patients','ic_patients','address_patients')
    ->where('id_patients',  $request::input('user_id'))
    ->first();

    $physioname =  DB::table('users')
    ->where('id',  Auth::id())
    ->first();

    $total_payment = $request::input('total_payment');
    $paypaid = $request::input('payment_paid');
    
    $to_name="PHW";
    $to_email=config('mail.mail_admin_phw');
    $data=array("personincharge"=>$physioname->fullname ,"namepatients"=>$patientsname->fullname_patients,"datepayment"=>$payment_date,"diagnose"=>$diagnosedetails->problem,"summary_treatment" => $treatmentdetails->summary_treatment,"total_payment" => $total_payment ,"paid" =>$paypaid);
    Mail::send('mails.notifypayment',$data,function($message) use ($to_name,$to_email){
     $message->to($to_email)
     ->subject('Notify Payment');
   });
 
  return redirect()->route('therapist_edit',$id_diagnose);
  }
}
public function list_stafftherapist()
{
  return view('master_template')->nest('content','list_therapist');
}

public function list_ofpatient($id)
{

  $patientlist = DB::table('patients')
  ->select('*')
  ->join('diagnose', 'patients.id_patients', '=', 'diagnose.id_patients')
  ->join('treatment', 'diagnose.id_diagnose', '=', 'treatment.id_diagnose')
  ->orderBy('date_treatment', 'DESC')
  ->whereNull('deleted_at');
  
  if($id != "0"){
   $time = strtotime($id);

   $newformat = date('Y-m-d',$time);


   $patientlist  = $patientlist->where('treatment.date_treatment',$newformat) ;
 }
 $patientlist = $patientlist->get();



 return \View::make('pages.list_ofpatient',['patientlist'=> $patientlist]);



}

public function assign_patient()
{
  $staffid = auth()->user()->staff_no;
  
  $patientlist = DB::table('diagnose')
  ->select('diagnose.id_diagnose','diagnose.id_patients','diagnose.reference_no','patients.mrn_no','patients.fullname_patients','patients.lastname_patients','diagnose.doctor_diagnose','assigned.id_staff','users.fullname','category.name','assigned.task_status','assigned.id_assigned','treatment.id_treatment','diagnose.created_at as diag_created')
  ->leftjoin('treatment','treatment.id_diagnose','=','diagnose.id_diagnose')
  ->leftjoin('patients','patients.id_patients','=','treatment.id_patients')
  ->leftjoin('assigned','assigned.id_treatment','=','treatment.id_treatment')
  ->leftjoin('type_sessions','diagnose.id_session_category','=','type_sessions.id_type_sessions')
  ->leftjoin('category','diagnose.id_session_category','=','category.id')
  ->leftjoin('users','users.staff_no','=','assigned.id_staff')
  ->where('assigned.id_staff','=',$staffid)
  ->groupby('diagnose.id_diagnose')
  ->orderby('diag_created','DESC')
  ->get();
  
  $therapistlist = DB::table('users')
  ->select('*')
  ->where('role_id','2')
  ->get();

  return View::make('pages.assign_patient',['patientlist'=> $patientlist, 'therapistlist' => $therapistlist]);

}

public function assign_patientmodal($id)
{
  $patientlist = DB::table('patients')
  ->select('*')
  ->where('id_patients',$id)
  ->first();

  return response()->json( array( 'data'=>$patientlist) );
}

public function submitAssignPatient()
{
  $user_id = input::get('user_id');
  $staff_id = input::get('staff_id');
  $treatment_id = input::get('user_treatmentid');

  DB::table('assigned')
  ->where('id_treatment', $treatment_id)
  ->update(['id_staff' => $staff_id]);

  DB::table('treatment')
  ->where('id_treatment', $treatment_id)
  ->update(['treatment_therapist' => $staff_id]);

  DB::table('patients')
  ->where('id_patients', $user_id)
  ->update(['assign_to' => $staff_id]);

  return redirect()->route('assign_patient')
  ->withSuccessMessage('Successfully Edit!');
}
public function submitAssignStatus(){
  $user_id = input::get('user_idstat');
  $staff_stat = input::get('staff_status');

  $update_stat = DB::table('assigned')
  ->where('id_assigned', $user_id)
  ->update(['task_status' => (int)$staff_stat]);

  // dd($user_id);

  return redirect()->route('assign_patient');
}




public function edit_summary_report($id){

  $soapmethod = soap_method::where('id_summary_diagnose',$id)->first();

  return response()->json( array( 'data'=>$soapmethod) );

}


public function edit_summary_rep_process(Request $request)
{

  $id_diagnose = Input::get('id_diagnose');
  $id_summary_diagnose =Input::get('id_summary_diagnose');
  $s_method    =  Input::get('smethod');
  $o_method    =   Input::get('omethod');
  $a_method    =  Input::get('amethod');
  $p_method    =  Input::get('pmethod');

  $update_user = DB::table('summary_diagnose')
  ->where('id_summary_diagnose', $id_summary_diagnose)
  ->update(['s_method' => $s_method , 'o_method' => $o_method , 'a_method' => $a_method ,'p_method' => $p_method]);


  return $this->therapist_edit($id_diagnose);
}
}