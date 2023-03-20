<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Get;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use Hash;
use Session;
use Auth;
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
use App\Models\Transaction;
use Telegram;

class PWSCenterController extends Controller
{
	// public function walkin_session(Request $request)
	public function __construct()
	{
    	$this->middleware('auth');
	}
	public function walkin_session()
	{

		$listpatientwalkin = DB::table('patients')
		->select('*')
		->join('diagnose', 'patients.id_patients', '=', 'diagnose.id_patients')
		->join('treatment','diagnose.id_diagnose','=','treatment.id_diagnose')
		// ->join('type_sessions','diagnose.id_type_session','=','type_sessions.id_type_sessions')
		->join('assigned','assigned.id_diagnose','=','diagnose.id_diagnose')
		->join('users','users.staff_no','=','assigned.id_staff')
		->join('payments','payments.id_diagnose','=','diagnose.id_diagnose')
		->where('diagnose.id_session_category','1')
		->whereNull('patients.deleted_at')
		->whereNull('diagnose.total_session')
		->orderBy('date_treatment', 'DESC')
		->get();
		
		$listpatienthousec = DB::table('patients')
		->select('*')
		->join('diagnose', 'patients.id_patients', '=', 'diagnose.id_patients')
		->join('treatment','diagnose.id_diagnose','=','treatment.id_diagnose')
		// ->join('type_sessions','diagnose.id_type_session','=','type_sessions.id_type_sessions')
		->join('assigned','assigned.id_diagnose','=','diagnose.id_diagnose')
		->join('users','users.staff_no','=','assigned.id_staff')
		->join('payments','payments.id_diagnose','=','diagnose.id_diagnose')
		->where('diagnose.id_session_category','3')
		->whereNull('patients.deleted_at')
		->whereNull('diagnose.total_session')
		->orderBy('treatment.date_treatment', 'DESC')
		->get();

		$listpatient = DB::table('patients')
		->select('*')
		->whereNull('deleted_at')
		->get();

		$list_session = DB::table('type_sessions')
		->select('*')
		->where('category','=','1')
		->orderby('name_type_sessions','ASC')
		->get();

		$list_housec_session = DB::table('type_sessions')
		->select('*')
		->where('category','=','3')
		->orderby('name_type_sessions','ASC')
		->get();

		$therapistlist = DB::table('users')
		->select('*')
		->where('role_id','2')
		->Orwhere('department_id','4')
		->get();

		$sessionlisting = DB::table('patients')
		->select('*','diagnose.created_at as datecome')
		->join('diagnose', 'patients.id_patients', '=', 'diagnose.id_patients')
		->where('diagnose.id_session_category','2')
		->where('diagnose.total_session','>','1') //added by mat
		->whereNull('patients.deleted_at')
		->get();

		//session maybe korang salah pandang sebab bila klik row dia akan ke bawah so kat situ kena tengok betul2 code nye
		$allattendance = DB::table('diagnose')
		->select('*','treatment.id_treatment AS idtr')
		->leftjoin('treatment', 'treatment.id_diagnose', '=', 'diagnose.id_diagnose')
		->leftjoin('assigned','assigned.id_treatment','=','treatment.id_treatment')
		->leftjoin('users','users.staff_no','=','assigned.id_staff')
		->orderby("treatment.date_treatment","DESC")
		->get();

		$roleid = Auth::user()->only(['role_id']);
		
		
		// $checkRole_id = DB::table('users')
		// ->select('role_id')
		// ->where('role_id','=',$roleid)
		// ->count();

		// dd($checkRole_id);

		return View::make('pages.walkin_session',['listpatientwalkin'=> $listpatientwalkin,'roleid'=> $roleid,'listpatienthousec'=> $listpatienthousec,'listpatient'=> $listpatient , 'list_session' => $list_session, 'list_housec_session' => $list_housec_session,'therapistlist' => $therapistlist, 'sessionlisting' => $sessionlisting, 'allattendance' => $allattendance]);

	}

	//New Changes
	public function patient_nursing()
	{
		
		$listpatientnursing = DB::table('diagnose_nursing')
		->select('*')
		->join('patients', 'patients.id_patients', '=', 'diagnose_nursing.id_patients')
		// ->leftjoin('roasters', 'patients.id_patients', '=', 'roasters.id_patients')
		->get();

		// dd($listpatientnursing);
		return View::make('pages.center_nursing_listing',['listpatientnursing'=> $listpatientnursing]);

	}

	public function submitnursingpatientedit($id)
	{
		$editpatientnursing = DB::table('diagnose_nursing')
		// 'SUM(TIMEDIFF(roasters.clockout, roasters.clockin)/10000) as total_hours'
		->select('*')
		->join('patients', 'patients.id_patients', '=', 'diagnose_nursing.id_patients')
		// ->leftjoin('roasters', 'patients.id_patients', '=', 'roasters.id_patients')
		->where('diagnose_nursing.id_diagnose',"=",$id)
		->first();

		return response()->json( array( 'data'=>$editpatientnursing) );

	}

	public function submitnursingpatientedit_process(Request $request)
	{
		
		// $update_diagnose = DB::table('diagnose')
		// ->where('id_diagnose', $id_diagnose)
		// ->update(['doctor_diagnose' => $name_diagnose]);

		return $this->patient_nursing(); 

	}

	public function get_transaction_info($id)
	{
		$getpatientinfo = DB::table('diagnose')
		->select('*')
		->join('patients', 'patients.id_patients', '=', 'diagnose.id_patients')
		->where('diagnose.id_diagnose',"=",$id)
		->first();

		// dd($getpatientinfo);

		return response()->json( array( 'data'=>$getpatientinfo) );

	}
	

	public function add_transaction_patient(Request $request){

		$data_transaction = new Transaction;

		$date=date_create(Input::get('transaction_date'));
		$newdate = date_format($date,"Y-m-d");
		$data_transaction->date =  $newdate;

		$data_transaction->id_diagnose =   Input::get('id_diagnose');
		$data_transaction->transaction_type =   Input::get('payment_mode');
		$data_transaction->reference_id =  Input::get('reference_id');
		$data_transaction->receipient_name = Input::get('receipient_name');
		$data_transaction->receipient_acc_no =  Input::get('receipient_acc_no');
		$data_transaction->receipient_reference =  Input::get('receipient_reference');
		$data_transaction->amount =  Input::get('transfer_amount');
		$data_transaction->created_at =  today();
		$data_transaction->created_by =  Auth::id();
		$data_transaction->save();

		return $this->walkin_session();
	}

	public function edit_walkin_patient($id){

		$walkindetail = DB::table('patients')
		->join('diagnose','patients.id_patients', '=', 'diagnose.id_patients')
		->join('treatment','diagnose.id_diagnose' ,'=','treatment.id_diagnose')
		->join('payments','diagnose.id_diagnose','payments.id_diagnose')
		->where('diagnose.id_diagnose', $id)
		->first();

		// dd($walkindetail);

		return response()->json( array( 'data'=>$walkindetail) );
		
	}
	
	public function edit_walkin_patient_process(Request $request)
	{
		
		$id_diagnose = Input::get('id_diagnose');
		$id_summary_diagnose	=	Input::get('id_summary_diagnose');
		$name_diagnose	=	Input::get('name_diagnose');
		$summary_treatment    =  Input::get('summary_treatment');
		$price_value_treatment    =   Input::get('price_value_treatment');
		$payment_mode    =  Input::get('payment_mode');
		$staff_id    =  Input::get('staff_id');
		// $id_type_session = json_encode($request->id_type_session);
		$id_type_session = "";

		// dd($id_type_session);

		$update_diagnose = DB::table('diagnose')
		->where('id_diagnose', $id_diagnose)
		->update(['doctor_diagnose' => $name_diagnose ,'id_type_session' => $id_type_session]);

		$update_treatment = DB::table('treatment')
		->where('id_diagnose', $id_diagnose)
		->update(['summary_treatment' => $summary_treatment, 'treatment_therapist' => $staff_id, 'payment_mode' => $payment_mode, 'treatment_amount' => $price_value_treatment ]);

		$update_user = DB::table('payments')
		->where('id_diagnose', $id_diagnose)
		->update(['type_payment' => $payment_mode , 'total_payment' => $price_value_treatment]);

		return $this->walkin_session();

	}

	public function edit_housecall_patient($id){

		$housecalldetail = DB::table('patients')
		->join('diagnose','patients.id_patients', '=', 'diagnose.id_patients')
		->join('treatment','diagnose.id_diagnose' ,'=','treatment.id_diagnose')
		->join('payments','diagnose.id_diagnose','payments.id_diagnose')
		->where('diagnose.id_diagnose', $id)
		->first();

		return response()->json( array( 'data'=>$housecalldetail) );
		
	}
	
	public function edit_housecall_patient_process(Request $request)
	{
		$id_diagnose = Input::get('id_diagnose');
		$id_summary_diagnose =Input::get('id_summary_diagnose');
		$name_diagnose =Input::get('name_diagnose');
		$summary_treatment    =  Input::get('summary_treatment');
		$price_value_treatment    =   Input::get('price_value_treatment');
		$payment_mode    =  Input::get('payment_mode');
		$staff_id    =  Input::get('staff_id');
		$time_in    =  Input::get('attendance-timein');
		$time_out    =  Input::get('attendance-timeout');
		$id_type_session = "";

		$update_diagnose = DB::table('diagnose')
		->where('id_diagnose', $id_diagnose)
		->update(['doctor_diagnose' => $name_diagnose ,'id_type_session' => $id_type_session]);

		$update_treatment = DB::table('treatment')
		->where('id_diagnose', $id_diagnose)
		->update(['summary_treatment' => $summary_treatment, 'treatment_therapist' => $staff_id, 'payment_mode' => $payment_mode, 'treatment_amount' => $price_value_treatment ]);

		$update_user = DB::table('payments')
		->where('id_diagnose', $id_diagnose)
		->update(['type_payment' => $payment_mode , 'total_payment' => $price_value_treatment]);

		return $this->walkin_session();

	}

	public function edit_session_patient($id){

		$sessiondetail = DB::table('patients')
		->join('diagnose','patients.id_patients', '=', 'diagnose.id_patients')
		->join('treatment','diagnose.id_diagnose' ,'=','treatment.id_diagnose')
		->leftjoin('payments','diagnose.id_diagnose','payments.id_diagnose')
		->where('diagnose.id_diagnose', $id)
		->first();

		// dd($sessiondetail);

		return response()->json( array( 'data'=>$sessiondetail) );
		
	}
	
	public function edit_session_patient_process(Request $request)
	{
		$id_diagnose = Input::get('id_diagnose');
		$id_summary_diagnose =Input::get('id_summary_diagnose');
		$name_diagnose =Input::get('name_diagnose');
		$summary_treatment    =  Input::get('summary_treatment');
		$price_value_treatment    =   Input::get('price_value_treatment');
		$payment_mode    =  Input::get('payment_mode');
		$staff_id    =  Input::get('staff_id');
		$id_type_session = "";

		$update_diagnose = DB::table('diagnose')
		->where('id_diagnose', $id_diagnose)
		->update(['doctor_diagnose' => $name_diagnose ,'id_type_session' => $id_type_session]);

		$update_treatment = DB::table('treatment')
		->where('id_diagnose', $id_diagnose)
		->update(['summary_treatment' => $summary_treatment, 'treatment_therapist' => $staff_id, 'payment_mode' => $payment_mode, 'treatment_amount' => $price_value_treatment ]);

		$update_user = DB::table('payments')
		->where('id_diagnose', $id_diagnose)
		->update(['type_payment' => $payment_mode , 'total_payment' => $price_value_treatment]);

		return $this->walkin_session();

	}

	//end

	public function searchPatient(Request $request){

		$output = "";
		$patients = DB::table('patients')
		->where('ic_patients','=',$request->search)
		->orwhere('phone_number', '=',$request->search)
		// ->toSql();
		// dd($patients);
		->get();

		$output = '';
		if($patients->count() == 1)
		{
			if(!empty($patients) || !blank($patients) ) {
				foreach($patients as $key => $patient){

					$output.='<div class="form-group">
					<label>Patient Name</label>
					<input type="text" class="form-control" name="patient_name" readonly="readonly" id="patient_name" value="'.$patient->fullname_patients.' '.$patient->lastname_patients. '">
					<input type="hidden" name="user_id" id="user_id" value="'.$patient->id_patients.'">
					</div>
					<div class="form-group">
					<label>Patient No</label>
					<input type="text" class="form-control" name="ic_patients" id="ic_patients" readonly="readonly" value="'.$patient->mrn_no.'">
					</div>';		
				}
			}
		}
		else {

			return Response::json(['success' => false]);
		}
		return Response::json(['success' => true, 'value' => $output]);
	}

	public function add_walkin_patient(Request $request){

		$rules = [
			'id_type_session' => 'required',
			'name_diagnose' => 'required',
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('walkin_session')
			->with('RegistrationError', "Please Fill All Information!");
		}
		else
		{

			$data = new Diagnose;

			$data->id_patients = $request->user_id;
			$data->id_type_session = json_encode($request->id_type_session);
			$data->doctor_diagnose = $request->name_diagnose;
			$data->id_session_category = $request->id_session_category;
			$data->save();
			
			$data_treatment = new Treatment;
			$data_treatment->date_treatment = today();
			$data_treatment->treatment_therapist = $request->staff_id;
			$data_treatment->treatment_amount = $request->price_value_treatment;
			$data_treatment->id_diagnose = $data->id_diagnose;
			$data_treatment->id_patients = $request->user_id;
			$data_treatment->payment_mode = $request->payment_mode;
			$data_treatment->summary_treatment = $request->summary_treatment;
			$data_treatment->save();

			$data_assign = new Assigned;
			$data_assign->id_diagnose = $data->id_diagnose;
			$data_assign->id_staff = $request->staff_id;
			$data_assign->id_treatment =$data_treatment->id_treatment;
			$data_assign->save();
		//update reference no 
			$countDiagnose = Diagnose::get()->count();
			$diagnoseID = str_pad($countDiagnose + 1, 5, '0', STR_PAD_LEFT);
			$file =  "FLPT";
			$combine = $file.$diagnoseID;
			$data_ref = Diagnose::find($data->id_diagnose);
			$data_ref->reference_no = $combine;
			$data_ref->save();

			$payment = new Payments;
			$payment_date = today();
			$payment->payment_date = $payment_date;
			$payment->type_payment = $request->payment_mode;
			$payment->id_diagnose =  $data->id_diagnose;
			$payment->id_patients = $request->user_id;
			$payment->total_payment = $request->price_value_treatment;
			$payment->status_verified = "Not Verified";
			$payment->id_user = Auth::id();
			$payment->save();

			
			$patientsname = Patient::select('fullname_patients','ic_patients','address_patients')
			->where('id_patients',  $request->user_id)
			->first();
			$physioname =  DB::table('users')
			->where('staff_no', $request->staff_id)
			->first();



			$datetoday = date('d-m-Y');
			$text = "Assign Details Patients(<b>Walk In</b>)\n"
			. "<b>Patients</b> : $patientsname->fullname_patients\n"
			. "<b>Staff In Charge</b> : $physioname->fullname\n"
			. "<b>Diagnose</b> : $request->name_diagnose\n"
			. "<b>Date</b> : $datetoday ";
			
		
			Telegram::sendMessage([
				'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
				'parse_mode' => 'HTML',
				'text' => $text
			]);

			return redirect()->route('walkin_session')->with('WalkInSuccess', "Your Data Already Add Successfully");
		}
	}


	public function add_house_call(Request $request){

		$rules = [
			'id_type_session' => 'required',
			'housec_name_diagnose' => 'required',
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('walkin_session')
			->with('RegistrationError', "Please Fill All Information!");
		}
		else
		{

			$data = new Diagnose;

			$data->id_patients = $request->user_id;
			$data->id_type_session = json_encode($request->id_type_session);
			$data->doctor_diagnose = $request->housec_name_diagnose;
			$data->id_session_category = $request->id_session_category;
			$data->save();
			
			$time_in  = date("H:i", strtotime(Input::get('attendance-timein')));
			$time_out  = date("H:i ", strtotime(Input::get('attendance-timeout')));

			$data_treatment = new Treatment;
			$data_treatment->date_treatment = today();
			$data_treatment->treatment_therapist = $request->housec_staff_id;
			$data_treatment->treatment_amount = $request->housec_price_value_treatment;
			$data_treatment->time_in = $time_in;
			$data_treatment->time_out = $time_out;
			$data_treatment->id_diagnose = $data->id_diagnose;
			$data_treatment->id_patients = $request->user_id;
			$data_treatment->payment_mode = $request->housec_payment_mode;
			$data_treatment->summary_treatment = $request->housec_summary_treatment;
			$data_treatment->save();

			$data_assign = new Assigned;
			$data_assign->id_diagnose = $data->id_diagnose;
			$data_assign->id_staff = $request->housec_staff_id;
			$data_assign->id_treatment =$data_treatment->id_treatment;
			$data_assign->save();
		//update reference no 
			$countDiagnose = Diagnose::get()->count();
			$diagnoseID = str_pad($countDiagnose + 1, 5, '0', STR_PAD_LEFT);
			$file =  "FLPT";
			$combine = $file.$diagnoseID;
			$data_ref = Diagnose::find($data->id_diagnose);
			$data_ref->reference_no = $combine;
			$data_ref->save();
			
			$patientsname = Patient::select('fullname_patients','ic_patients','address_patients')
			->where('id_patients',  $request->user_id)
			->first();
			$physioname =  DB::table('users')
			->where('staff_no', $request->housec_staff_id)
			->first();

			$datetoday = date('d-m-Y');

			$payment = new Payments;
			$payment_date = today();
			$payment->payment_date = $payment_date;
			$payment->type_payment = $request->housec_payment_mode;
			$payment->id_diagnose =  $data->id_diagnose;
			$payment->id_patients = $request->user_id;
			$payment->total_payment = $request->housec_price_value_treatment;
			$payment->status_verified = "Not Verified";
			$payment->id_user = Auth::id();
			$payment->save();


		$text = "Assign Details Patients(<b>House Call</b>)\n"
		  . "<b>Patients</b> : $patientsname->fullname_patients\n"
		  . "<b>Staff In Charge</b> : $physioname->fullname\n"
		  . "<b>Diagnose</b> : $request->housec_name_diagnose;\n"
		  . "<b>Date</b> : $datetoday ";
		
  
	  Telegram::sendMessage([
		  'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
		  'parse_mode' => 'HTML',
		  'text' => $text
	  ]);

		return redirect()->route('walkin_session');

		
		}

	}

	public function add_session_patient(Request $request){
		$rules = [
			'id_type_session' => 'required',
			'name_diagnose' => 'required',
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return redirect()->route('walkin_session')
			->with('RegistrationError', "Please Fill All Information!");
		}
		else
		{

			$data = new Diagnose;
			$data->id_patients = $request->user_id;
			$data->id_type_session = json_encode($request->id_type_session);
			$data->doctor_diagnose = $request->name_diagnose;
			$data->total_session = $request->total_session;
			$data->current_session = 1;
			$data->price_session = $request->price_value_treatment;
			$data->id_session_category = $request->id_session_category;
			$data->save();
			
			$data_treatment = new Treatment;
			$data_treatment->date_treatment = today();
			$data_treatment->treatment_therapist = $request->staff_id;
		// $data_treatment->treatment_amount = $request->price_value_treatment;
			$data_treatment->id_diagnose = $data->id_diagnose;
			$data_treatment->id_patients = $request->user_id;
			$data_treatment->payment_mode = $request->payment_mode;
			$data_treatment->save();

			$data_assign = new Assigned;
			$data_assign->id_diagnose = $data->id_diagnose;
			$data_assign->id_staff = $request->staff_id;
			$data_assign->id_treatment =$data_treatment->id_treatment;
			$data_assign->save();

		//update reference no 
			$countDiagnose = Diagnose::get()->count();
			$diagnoseID = str_pad($countDiagnose + 1, 5, '0', STR_PAD_LEFT);
			$file =  "FLPT";
			$combine = $file.$diagnoseID;
			$data_ref = Diagnose::find($data->id_diagnose);
			$data_ref->reference_no = $combine;
			$data_ref->save();

			$data_summary = new soap_method;
			$data_summary->id_treatment_diagnose = $data_treatment->id_treatment;
			$data_summary->id_patients = $request->user_id;
			$data_summary->date_method = today();
			$data_summary->save();

			$patientsname = Patient::select('fullname_patients','ic_patients','address_patients')
			->where('id_patients',  $request->user_id)
			->first();
			$physioname =  DB::table('users')
			->where('staff_no', $request->staff_id)
			->first();
			

		// $to_name= Input::get('fullname');
		// $to_email="kembarairie@gmail.com";
		// $data=array("name"=>$to_name,"email"=>Input::get('email'),"password" => Input::get('password'));
		// Mail::send('mails.notifystaffregistration',$data,function($message) use ($to_name,$to_email){
		// $message->to($to_email)
		// ->subject('PHW Registration Details');
		//  });
			
			$datetoday = date('d-m-Y');
			$text = "Assign Details Patients(<b>Sessions</b>)\n"
			. "<b>Patients</b> : $patientsname->fullname_patients\n"
			. "<b>Staff In Charge</b> : $physioname->fullname\n"
			. "<b>Diagnose</b> : $request->name_diagnose \n"
			. "<b>Date</b> : $datetoday ";
			
			
			Telegram::sendMessage([
				'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
		  // 'chat_id' => 'Ruzaini_Mahzan',
				'parse_mode' => 'HTML',
				'text' => $text
			]);
			
			return redirect()->route('walkin_session');
		//return $this->walkin_session();
		}
	}

	public function add_session_attendant_patient(Request $request){

		// $data = new Diagnose;
		$diagnose_id = Input::get('id_diagnose');
		$payment_paid = Input::get('price_value_treatment');
		$data = Diagnose::find($diagnose_id);
		$current_payment = $data->total_payment;

		if($current_payment == NULL){
			$current_payment = 0;
		}


		$cur_session = $data->current_session; 
		$data->current_session = $cur_session + 1;
		$data->total_payment = $current_payment + $payment_paid;
		$data->save();

		$data_treatment = new Treatment;

		$date=date_create(Input::get('attendance-date'));
		$newdate = date_format($date,"Y-m-d");
		$data_treatment->date_treatment =  $newdate;

		$data_treatment->treatment_therapist =  $request->staff_id;
		$data_treatment->treatment_amount =  Input::get('price_value_treatment');
		$data_treatment->id_diagnose = Input::get('id_diagnose');
		$data_treatment->id_patients =  Input::get('id_patients');
		$data_treatment->payment_mode =  Input::get('payment_mode');
		$data_treatment->save();

		$method         = new soap_method;
		$method->id_patients        =  Input::get('id_patients');
		$method->date_method = $newdate;
		//id treatment diagnose  == id_diagnose
		$method->id_treatment_diagnose = $data_treatment->id_treatment;
		$method->save();

		$data_assign = new Assigned;
		$data_assign->id_diagnose = Input::get('id_diagnose');
		$data_assign->id_staff = $request->staff_id;
		$data_assign->id_treatment =$data_treatment->id_treatment;
		$data_assign->save();

		//update reference no 
		$countDiagnose = Diagnose::get()->count();
		$diagnoseID = str_pad($countDiagnose + 1, 5, '0', STR_PAD_LEFT);
		$file =  "FLPT";
		$combine = $file.$diagnoseID;
		$data_ref = Diagnose::find(Input::get('id_diagnose'));
		$data_ref->reference_no = $combine;
		$data_ref->save();

		return $this->walkin_session();
	}

	public function ViewSummaryReportSession($id){


		$listsummary = DB::table('treatment')
		->select('*')
		->join('summary_diagnose','treatment.id_treatment','=','summary_diagnose.id_treatment_diagnose')
		->where('summary_diagnose.id_treatment_diagnose',$id)
		->get();

		$listpatientwalkin = DB::table('patients')
		->select('*')
		->join('diagnose', 'patients.id_patients', '=', 'diagnose.id_patients')
		->join('type_sessions','diagnose.id_type_session','=','type_sessions.id_type_sessions')
		->join('treatment','diagnose.id_diagnose','=','treatment.id_diagnose')
		->join('assigned','assigned.id_diagnose','=','diagnose.id_diagnose')
		->join('users','users.staff_no','=','assigned.id_staff')
		->where('id_type_sessions','!=','1')
		->where('id_type_sessions','!=','3')
		->whereNull('patients.deleted_at')
		->whereNull('diagnose.total_session')
		->get();

		

		$listpatient = DB::table('patients')
		->select('*')
		->whereNull('deleted_at')
		->get();

		$list_session = DB::table('type_sessions')
		->select('*')
		->get();

		$therapistlist = DB::table('users')
		->select('*')
		->where('role_id','2')
		->get();

		$sessionlisting = DB::table('patients')
		->select('*','diagnose.created_at as datecome')
		->join('diagnose', 'patients.id_patients', '=', 'diagnose.id_patients')
		// ->join('treatment','diagnose.id_diagnose','=','treatment.id_diagnose')
		->join('type_sessions','diagnose.id_type_session','=','type_sessions.id_type_sessions')
		->where('id_type_sessions','=','1') //added by mat
		->whereNull('patients.deleted_at')
		// ->tosql();
		// dd($sessionlisting);
		->get();

		$allattendance = DB::table('diagnose')
		->select('*','treatment.id_treatment AS idtr')
		->join('treatment', 'treatment.id_diagnose', '=', 'diagnose.id_diagnose')
		->join('assigned','assigned.id_diagnose','=','diagnose.id_diagnose')
		->join('users','users.staff_no','=','assigned.id_staff')
		//airie tambah
		->join('payments','payments.id_diagnose','=','diagnose.id_diagnose')
		// ->toSql();
		->get();

		// dd($listsummary);

		$contents = view('walkin_session',['listsummary'=> $listsummary, 'listpatientwalkin'=> $listpatientwalkin,'listpatient'=> $listpatient , 'list_session' => $list_session, 'therapistlist' => $therapistlist, 'sessionlisting' => $sessionlisting, 'allattendance' => $allattendance]);
		$data = $contents->render();
		return response()->json( array( 'data'=>$listsummary) );
	}

	public function patientInfo($id){

		$patientInfo = DB::table('diagnose')
		->select('*')
		->join('patients', 'patients.id_patients', '=', 'diagnose.id_patients')
		->where('diagnose.id_diagnose','=',$id)
		->first();

		return response()->json( array( 'data'=>$patientInfo) );

	}

	public function update_price(Request $request){
		$treatment_id = input::get('price_user_id');
		$price = input::get('att_price');

		$update_user = DB::table('treatment')
		->where('id_treatment', $treatment_id)
		->update(['treatment_amount' => $price ]);

		return redirect()->route('walkin_session')
		->with('TherapistError', "Price Updated!");
	}

	public function update_price_walkin(Request $request)
	{
		$paymentid = $request->paymentid;
		$treatmentid = $request->treatmentid;
		$amount = $request->price_walkin;
		$payment_mode = $request->payment_mode;

		$update_treatment = DB::table('treatment')
		->where('id_treatment',$treatmentid)
		->update(['treatment_amount' => $amount , 'payment_mode' => $payment_mode]);

		$update_payment = DB::table('payments')
		->where('id_payment', $paymentid)
		->update(['total_payment' => $amount]);

		return redirect()->route('walkin_session')->with('walkinPaymentUpdate','Payment has been updated.');

	}

	public function update_verified(Request $request)

	{
		$input = $request->paymentid;
		$update_verified = DB::table('payments')
		->where('id_payment', $input)
		->update(['status_verified' => "Verified" ]);
		return response()->json(['success'=>'Payment Has Been Verified.']);
	}

	public function get_price($id){

		$price = DB::table('treatment')
		->select('*')
		->where('id_treatment','=',$id)
		->first();

		return response()->json( array( 'data'=>$price) );
	}

	public function update_status(Request $request){
		$treatment_id = input::get('status_user_id');
		$status = input::get('paid_status');

		$update_user = DB::table('treatment')
		->where('id_treatment', $treatment_id)
		->update(['status_paid' => $status ]);

		return redirect()->route('walkin_session')
		->with('TherapistError', "Payment Status Updated!");
	}

	public function get_status($id){

		$status = DB::table('treatment')
		->select('*')
		->where('id_treatment','=',$id)
		->first();

		return response()->json( array( 'data'=>$status) );
	}



}