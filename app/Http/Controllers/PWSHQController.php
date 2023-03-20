<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


// namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Get;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use Hash;
use Session;
use Mail;
use Auth;
use App\Models\Users;
use App\Models\Patient;
use App\Models\PatientRelative;
use App\Models\Vital_Sign;
use App\Models\Intake_Output;
use App\Models\Medication;
use App\Models\Progress_Note;
use App\Models\Progression;
use App\Models\Monthly_Report;
use App\Models\Medication_Dosage;
use App\Models\Progress_Note_Details;
use App\Models\Treatment_HQ;
use App\Models\soap_method_HQ;
use App\Models\Diagnose_HQ;
use App\Models\MovementJoint_HQ;
use App\Models\Report_HQ;

class PWSHQController extends Controller
{
	use AuthenticatesUsers;

	public function hq_form()
	{
	 $detailspatient = [];
	 $methodlist = [];
	 
	 $queryjoints = [];
	 $queryattendance =[];
	 //dd($queryorto);

	 return \View::make('master_template')
	 ->nest('content','hq_form',array('detailspatient' => $detailspatient,'methodlist' => $methodlist , 'queryattendance' => $queryattendance, 'queryjoints' => $queryjoints));
	}

	public function find_patient_hq($id = null)
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
		  ->where($querycol,$queryope,$querywhere)
		  ->first();

		  if($query)
		  {
		    $methodobj = DB::table('summary_diagnose_hq')
		    ->select('*')
		    ->where('id_patients','=',$query->id_patients)
		    ->get();

		    $querysimplereport = DB::table('report_diagnose_hq')
		    ->select('*')
		    ->where('id_patients','=',$query->id_patients)
		    ->get();

		    // $queryorto = DB::table('diagnose')
		    // ->select('*')
		    // ->where('id_patients','=',$query->id_patients)
		    // ->first();

		    $queryjoints = DB::table('movement_joint_hq')
		    ->select('*')
		    ->where('id_patients','=',$query->id_patients)
		    ->get();

		    $queryattendance = DB::table('treatment_hq')
		    ->join('patients','patients.id_patients','=','treatment_hq.id_patients')
		  //->join('user','department.id_department' ,'=','users.department_id')
		    ->select('treatment_hq.*','patients.fullname_patients AS treatment_fullname')
		    ->where('treatment_hq.id_patients','=',$query->id_patients)
		    ->get();


		    return \View::make('master_template')
		    ->nest('content','hq_form',array('detailspatient' => $query,'methodlist' => $methodobj,'simplereport' => $querysimplereport,'queryattendance'=> $queryattendance, 'queryjoints'=> $queryjoints));
		  }
		  else
		  {
		    return redirect()->back()->withInput()->with('TherapistError', "Patient IC not found.");
		  }
	}

	public function add_patient_relative_hq()
	{

	  $PatientsRelative         = new PatientRelative;
	  $PatientsRelative->fullname_relatives    =   Input::get('fullname-relative');
	  $PatientsRelative->lastname_relatives    =  Input::get('lastname-relative');
	  $PatientsRelative->id_patients        =  Input::get('user_id');
	  $PatientsRelative->phone_no_relatives        =  Input::get('phonenum-relative');
	  $PatientsRelative->save();

	  // $query = DB::table('relative_patients')
	  // 	->select('id_patients')
	  // 	->where('id_rel_patients','=',$id)
	  // 	->first();

	  return $this->find_patient_hq(Input::get('user_id'))
	  ->withSuccessMessage('Successfully Edit!');

	}

	public function edit_patient_relative_hq($id)
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

	  $contents = view('hq_form',['listrelative'=> $listrelative ,'detailsrelative' => $detailsrelative ,'patient' => $patients]);
	  $data = $contents->render();
	  return response()->json( array( 'data'=>$detailsrelative) );
	}

	public function edit_patient_relative_process_hq()
	{
	  $user_id = input::get('user_id');
	  $fullname_relative = input::get('fullname-relative');
	  $lastname_relative     =  Input::get('lastname-relative');
	  $phonenum_relative    =   Input::get('phonenum-relative');

	  $update_patient = DB::table('relative_patients')
	  ->where('id_rel_patients', $user_id)
	  ->update(['fullname_relatives' => $fullname_relative , 'lastname_relatives' => $lastname_relative  , 'phone_no_relatives' => $phonenum_relative ]);

	  $query = DB::table('relative_patients')
	  	->select('id_patients')
	  	->where('id_rel_patients','=',$user_id)
	  	->first();
	  return $this->find_patient_hq($query->id_patients)
	  ->withSuccessMessage('Successfully Edit!');

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

	public function delete_relative_hq($id)
	{

		$query = DB::table('relative_patients')
	  	->select('id_patients')
	  	->where('id_rel_patients','=',$id)
	  	->first();

	  $deleterelative = PatientRelative::find($id);

	  if($deleterelative->delete()){
	  	return $this->find_patient_hq($query->id_patients)
	   // return redirect()->route('relativeshow',[$deleterelative->id_patients])
	   ->withSuccessMessage('Successfully Delete!');
	 }
	 else{
	  return redirect()->route('hq_form');              }

	}

	public function hq_list()
	{

	  $hqlisting = DB::table('patients')
	  ->select('*')
	  ->join('diagnose_hq', 'patients.id_patients', '=', 'diagnose_hq.id_patients')
	  ->whereNull('deleted_at')
	  ->get();

	  return \View::make('master_template')
	  ->nest('content','hq_listing',['hqlisting'=> $hqlisting]);
	}

	public function hq_edit($id_diagnose)
	{
	  $query = DB::table('patients')
	  ->select('*')
	  ->join('diagnose_hq','patients.id_patients','=','diagnose_hq.id_patients')
	  ->where('diagnose_hq.id_diagnose',$id_diagnose)
	  ->first();

	  if($query)
	  {
	    $methodobj = DB::table('summary_diagnose_hq')
	    ->select('*')
	    ->where('id_treatment_diagnose','=',$query->id_diagnose)
	    ->get();

	    $querysimplereport = DB::table('report_diagnose_hq')
	    ->select('*')
	    ->where('id_treatment_diagnose','=',$query->id_diagnose)
	    ->get();

	    $queryorto = DB::table('diagnose_hq')
	    ->select('*')
	    ->where('id_diagnose','=',$query->id_diagnose)
	    ->first();

	    $queryjoints = DB::table('movement_joint_hq')
	    ->select('*')
	    ->where('id_diagnose','=',$query->id_diagnose)
	    ->get();

	    $queryattendance = DB::table('treatment_hq')
	    ->join('patients','patients.id_patients','=','treatment_hq.id_patients')
	  //->join('user','department.id_department' ,'=','users.department_id')
	    ->select('treatment_hq.*','patients.fullname_patients AS treatment_fullname')
	    ->where('treatment_hq.id_diagnose','=',$query->id_diagnose)
	    ->get();


	    return \View::make('master_template')
	    ->nest('content','hq_form_edit',array('detailspatient' => $query,'methodlist' => $methodobj,'simplereport' => $querysimplereport,'queryattendance'=> $queryattendance, 'queryjoints'=> $queryjoints, 'queryorto' => $queryorto ,'id_diagnose' => $id_diagnose));
	  }
	  else
	  {
	    return redirect()->back()->withInput()->with('TherapistError', "Patient IC not found.");
	  }

	}

	public function save_ortherapist_hq(Request $request)
	{
		$data =  Diagnose_HQ::create(Request::except('submit', '_token'));
		$iddd = Request::input('id_patients');
		return $this->hq_edit($data->id_diagnose);
	}

	public function add_attendance_hq()
	{
		$id = Input::get('user_id');
		$id_diagnose = Input::get('id_diagnose');
		$time_in  = date("H:i", strtotime(Input::get('attendance-timein')));
		$time_out  = date("H:i ", strtotime(Input::get('attendance-timeout')));
		$date=date_create(Input::get('attendance-date'));
		$newdate = date_format($date,"Y-m-d");
		$TherapistTreatment         = new Treatment_HQ;
		$TherapistTreatment->date_treatment        =  $newdate;
		$TherapistTreatment->time_in        =  $time_in ; //date_format(Input::get('attendance-timein'),"hh:mm:ss");
		$TherapistTreatment->time_out        =  $time_out ;//date_format(Input::get('attendance-timeout'),"hh:mm:ss");
		$TherapistTreatment->treatment_therapist = Input::get('attendance-therapist_id');
		$TherapistTreatment->id_patients = Input::get('attendance-patient_id');
		$TherapistTreatment->treatment_amount = Input::get('attendance-amount');
		$TherapistTreatment->id_diagnose = $id_diagnose;
		$TherapistTreatment->save();

	  	return $this->hq_edit( $id_diagnose );
	}

	public function add_methodsoap_hq()
	{

	  $id = Input::get('method_user_id');
	  $id_diagnose = Input::get('id_diagnose');
	  $date=date_create(Input::get('datemethod'));
	  $newdate = date_format($date,"Y-m-d");

	  $method         = new soap_method_HQ;
	  $method->id_patients        =  $id;
	  //id treatment diagnose  == id_diagnose
	  $method->id_treatment_diagnose = $id_diagnose;
	  $method->date_method        =  $newdate;
	  $method->s_method        =  Input::get('smethod');
	  $method->o_method        =  Input::get('omethod');
	  $method->a_method        =  Input::get('amethod');
	  $method->p_method        =  Input::get('pmethod');
	  $method->save();

	  return $this->hq_edit( $id_diagnose );
	}

	public function add_joint_movement_hq()
	{

	  $id = Input::get('user_id');
	  $id_diagnose = Input::get('id_diagnose');
	  $movementjoint         = new MovementJoint_HQ;
	  $movementjoint->id_patients        =  $id;
	  $movementjoint->id_diagnose        = $id_diagnose;
	  $movementjoint->name_joints        =  Input::get('name_joints');
	  $movementjoint->status_joints        =  Input::get('status_joints');
	  $movementjoint->remark_joints        =  Input::get('remark_joints');
	  $movementjoint->save();

	  return $this->hq_edit($id_diagnose);
	  
	}

	public function add_simplereport_hq()
	{
	  $date=date_create(Input::get('reportdate'));
	  $newdate = date_format($date,"Y-m-d");

	  $id = Input::get('user_id');
	  $id_diagnose = Input::get('id_diagnose');
	  $SimpleReport         = new Report_HQ;
	  $SimpleReport->id_patients        =  $id;
	  $SimpleReport->report_date     =  $newdate;
	  $SimpleReport->id_treatment_diagnose = $id_diagnose;
	  $SimpleReport->report_description        =  Input::get('reportdescription');

	  $SimpleReport->save();
	  return $this->hq_edit( $id_diagnose );
	}

	public function delete_report_hq($id){

	  $query = DB::table('report_diagnose_hq')
	  ->select('id_patients','id_treatment_diagnose')
	  ->where('id_report_diagnose','=',$id)
	  ->first();

	  $deletereport = Report_HQ::find($id);
	  $deletereport->delete();

	  return $this->hq_edit( $query->id_treatment_diagnose );
	}

	public function delete_method_hq($id)
	{
	//dd("here");
	  $query = DB::table('summary_diagnose_hq')
	  ->select('id_patients','id_treatment_diagnose')
	  ->where('id_summary_diagnose','=',$id)
	  ->first();

	  $deletemethod = soap_method_HQ::find($id);
	  $deletemethod->delete();
	  return $this->hq_edit( $query->id_treatment_diagnose );

	}

	public function delete_attendance_hq($id){

	  $query = DB::table('treatment_hq')
	  ->select('id_patients','id_diagnose')
	  ->where('id_treatment','=',$id)
	  ->first();

	  $deletemethod = Treatment_HQ::find($id);
	  $deletemethod->delete();
	  return $this->hq_edit( $query->id_diagnose );

	}

	public function delete_joints_hq($id){

	  $query = DB::table('movement_joint_hq')
	  ->select('id_patients','id_diagnose')
	  ->where('id_movement_joint','=',$id)
	  ->first();

	  $deletereport = MovementJoint_HQ::find($id);
	  $deletereport->delete();

	  return $this->hq_edit($query->id_diagnose);
	}

	public function therapist_patient()
	{
		$patient_therapist = DB::table('users')
	  	->select('*')
	  	->get();

	  	return \View::make('master_template')
	  	->nest('content','list_therapist',['patient_therapist'=> $patient_therapist]);

	}

	public function register_staff()
	{
		$department =  DB::table('department')->select('id_department', 'name_department')->get();
		$role =  DB::table('role')->select('id_role', 'name_role')->get();

		$patient_therapist = DB::table('users')
	  	->select('*')
		->join('department','department.id_department','=','users.department_id')
		->where('users.email','!=','superadmin@gmail.com')
	  	->get();

		return View::make('pages.list_therapist',['department' => $department,'role' => $role ,'patient_therapist'=> $patient_therapist]);
	 
	}

	public function forgot_password()
	{
		return View::make('pages.forgot_password');
	}

	public function forgot_password_process(Request $request)
	{
		//  dd(Input::all());
		$v =Validator::make(Input::all() ,  [
			'email' => 'required',
			'password' => 'min:6|required',
		    'confirm_password' => 'required|min:6',
		]);
		// dd($v);
		// $validator = Validator::make(Input::all(), $rules);

		if ($v->fails())
		{
		
			return redirect()->route('register_staff')
			->with('RegistrationError', "Please Fill All Information!");
		}
		else
		{
			
			$emailUser = Input::get('email');

	
			$pass         =  Input::get('password');
			$newPassword    =  Hash::make($pass);

			$getID = DB::table('users')
			->select('*')
			->where('email','=',$emailUser)
			->get();
			
			// dd($getID->count());
			if($getID->count() == 1)
			{
		
				$update_user = DB::table('users')
				->where('id', $getID[0]->id)
				->update(['password' => $newPassword]);

				return redirect()->route('login')->with('RegistrationError', "Success Change Password!");
			}
			else{
				return View::make('pages.forgot_password')->with('RegistrationError', "Invalid Email!");
			}

			
		}
	}

	public function add_staff()
	{

		$rules = [
			'fullname' => 'required',
			'email' => 'required',
			'password' => 'required',
			'role' => 'required|not_in:0',
			'department' => 'required|not_in:0',
		];
	
		$validator = Validator::make(Input::all(), $rules);
	
		if ($validator->fails()) 
		{
			return redirect()->route('register_staff')
			->with('RegistrationError', "Please Fill All Information!");
		}
		else
		{
			$emailUser = Input::get('email');
			$emailName = Input::get('fullname');
			$emailPassword = Input::get('password');
			$emailContent = "Hi ".$emailName.",<br>Please use below information to login in PWH system:<br><br>";
			$emailContent .= "Username: <b>".$emailUser."</b><br>";
			$emailContent .= "Password: <b>".$emailPassword."</b>";
			$emailSubject = "Login Information to PWH system";
	
			$countStaff = Users::get()->count();
			$invID = str_pad($countStaff + 1, 5, '0', STR_PAD_LEFT);
			$com_name =  "PHW";
			$combine = $com_name.$invID;
	
			$Users         = new Users;
			$Users->staff_no    =  $combine;
			$Users->fullname    =  Input::get('fullname');
			$Users->lastname    =  Input::get('lastname');
			$Users->ic    =  Input::get('ic');
			$Users->email        =  Input::get('email');
			$pass         =  Input::get('password');
			$Users->password     =  Hash::make($pass);
			$Users->role_id         =  Input::get('role');
			$Users->department_id   =  Input::get('department');
			$Users->save();
	
			$to_name= Input::get('fullname');
			$to_email= Input::get('email');
			$data=array("name"=>$to_name,"email"=>Input::get('email'),"password" => Input::get('password'));
			Mail::send('mails.notifystaffregistration',$data,function($message) use ($to_name,$to_email){
			$message->to($to_email)
			->subject('PHW Registration');
			});
	
			$department =  DB::table('department')->select('id_department', 'name_department')->get();
			$role =  DB::table('role')->select('id_role', 'name_role')->get();
	
			$patient_therapist = DB::table('users')
			->select('*')
			->join('department','department.id_department','=','users.department_id')
			->get();
	
			return redirect()->route('register_staff',['department' => $department,'role' => $role ,'patient_therapist'=> $patient_therapist]);
			
		}
	}
	

}