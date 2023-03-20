<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

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
use Auth;
use App\Models\Users;
use App\Models\Patient;
use App\Models\PatientRelative;
use App\Models\Patient_Nursing;
use App\Models\Diagnose_Nursing;
use App\Models\Vital_Sign;
use App\Models\Intake_Output;
use App\Models\Medication;
use App\Models\Progress_Note;
use App\Models\Progression;
use App\Models\Monthly_Report;
use App\Models\Medication_Dosage;
use App\Models\Progress_Note_Details;
use App\Models\Nursing_Monthly;
use App\Models\Nursing_Daily;
use App\Models\Nursing_Assessment;



class PWSNursingController extends Controller
{
	public function __construct()
	{
    	$this->middleware('auth');
	}
	public function nursing_form()
	{
		$detailspatient =[];
		$vitalsign = [];
		$intakeoutput =[];
		$medication = [];
		$progressnote = [];
		$progression = [];
		$monthlyreport = [];
		$queryorto =[];
		$dailyreport =[];

		$nursinglist = [];
		$package =[];

		return View::make('pages.nursing_form',array('detailspatient' => $detailspatient,'nursinglist' => $nursinglist, 'dailyreport'=>$dailyreport, 'vitalsign' => $vitalsign, 'package'=> $package,'intakeoutput' => $intakeoutput, 'medication' => $medication, 'monthlyreport' => $monthlyreport, 'progression'=>$progression, 'progressnote' => $progressnote, 'queryorto' => $queryorto ));
	}

	public function nursing_list()
	{
		// $staffid = auth()->user()->staff_no;

		// $getRoleID = DB::table('users')
		// ->select('role_id')
		// ->where('staff_no','=',$staffid)
		// ->first()->role_id;
		// //dd($getRoleID);
		// $roleID = $getRoleID;
		//dd($getRoleID);

		
		// if($getRoleID <> 1)
		// {
		// 	$nursinglisting = DB::table('patients')
		// 	->select('*')
		// 	->join('diagnose_nursing', 'patients.id_patients', '=', 'diagnose_nursing.id_patients')
		// 	->leftjoin('users', 'diagnose_nursing.id_staff', '=', 'users.staff_no')
		// 	//->where('assigned.id_staff','=',$staffid)
		// 	->Where('diagnose_nursing.id_staff','=',$staffid)
		// 	//->whereNull('deleted_at')
		// 	->get();
		// }
		// else
		// {
			$nursinglisting = DB::table('patients')
			->select('*')
			->join('diagnose_nursing', 'patients.id_patients', '=', 'diagnose_nursing.id_patients')
			//->leftjoin('users', 'diagnose_nursing.id_staff', '=', 'users.staff_no')
			//->where('assigned.id_staff','=',$staffid)
			// ->Where('diagnose_nursing.id_staff','=',$staffid)
			//->whereNull('deleted_at')
			->get();
		// }
		
		//->tosql();
		//dd($nursinglisting);

	  return View::make('pages.nursing_listing',['nursinglisting'=> $nursinglisting]);
	}

	public function listdailyreport($id)
	{

		$dailyreport = DB::table('nursing_daily_report')
		->select('*')
		->leftjoin('users', 'nursing_daily_report.created_by', '=', 'users.staff_no')
		->where('id_monthly_report',$id)
		->orderby('date_daily_report','DESC')
		->get();
		
		$monthlyreport = DB::table('nursing_monthly_report')
		->select('*')
		->leftjoin('diagnose_nursing', 'nursing_monthly_report.id_diagnose', '=', 'diagnose_nursing.id_diagnose')
		->where('id_monthly_report',$id)
		->first();

		return View::make('pages.nursing_dailyreport_listing',array('dailyreport' =>  $dailyreport,'monthlyreport' =>  $monthlyreport));
	}

	public function relativeshow_nursing($id)
	{

	  $listrelative = DB::table('relative_patients')
	  ->select('*')
	  ->where('id_patients','=',$id)
	  ->where('type','=','Nursing')
	  ->get();

	  $patients = DB::table('patients')
	  ->where('id_patients',$id)
	  ->select('fullname_patients')
	  ->first();

	  return view('master_template')->nest('content','relative_list_nursing',['listrelative'=> $listrelative, 'patient' => $patients]);
	}

	public function nursing_edit($id_diagnose)
	{
	  	$query = DB::table('patients')
	  	->select('*')
	  	->join('diagnose_nursing','patients.id_patients','=','diagnose_nursing.id_patients')
	  	->where('diagnose_nursing.id_diagnose',$id_diagnose)
		  ->first();
		  
		//  dd($query);
		// if($query)
		// {
			// $vitalsign = DB::table('vital_sign_form')
			// ->select('*')
			// ->where('id_patients','=',$query->id_patients)
			// ->get();

			// $intakeoutput = DB::table('intake_output_chart')
			// ->select('*')
			// ->where('id_patients','=',$query->id_patients)
			// ->get();

			// $queryorto = DB::table('diagnose')
			// ->select('*')
			// ->where('id_diagnose','=',$query->id_diagnose)
			// ->first();

			// $medication = DB::table('medication_chart')
			// ->select('*')
			// ->where('id_patients','=',$query->id_patients)
			// ->get();

			// $progressnote = DB::table('progress_note')
			// ->select('*')
			// ->where('id_patients','=',$query->id_patients)
			// ->get();

			$progression = DB::table('nursing_assessment_report')
			->select('*')
			->leftjoin('users', 'nursing_assessment_report.created_by', '=', 'users.staff_no')
			->where('id_diagnose','=',$id_diagnose)
			->get();

			$monthlyreport = DB::table('nursing_monthly_report')
			->select('*')
			->leftjoin('users', 'nursing_monthly_report.created_by', '=', 'users.staff_no')
			->where('id_diagnose','=',$id_diagnose)
			->where('nursing_monthly_report.deleted_at','=',NULL)
			->get();

			$dailyreport = DB::table('monthly_summary_report')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			//->where('msr_month','=',NULL)
			->get();

			return View::make('pages.nursing_form_edit',array('detailspatient' => $query, 'dailyreport'=> $dailyreport, 'progression'=> $progression, 'monthlyreport'=> $monthlyreport));
		// }
	  	// else
	  	// {
		// 	return redirect()->back()->withInput()->with('TherapistError', "Patient IC not found.");
			
	  	// }

	}

	public function save_nursing_diagnose(Request $request)
	{
	  //dd("ggsgsggsaa");
		//dd( Input::get('patient_package') );
		$id = Input::get('id_patients');

		$diagnose         = new Diagnose_Nursing;
		$diagnose->doctor_diagnose    =  Input::get('patient_diagnose');
		$diagnose->id_package        =  Input::get('patient_package');
		$diagnose->id_patients   =  $id;

		$countDiagnose = Diagnose_Nursing::get()->count();
		$diagnoseID = str_pad($countDiagnose + 1, 5, '0', STR_PAD_LEFT);
		$file =  "FLPT";
		$combine = $file.$diagnoseID;
		

		$diagnose->reference_no   =  $combine;
		// $diagnose->id_staff = Input::get('nurse_staff_id');
		$diagnose->save();

	 //dd(Request::except('submit', '_token'));
		// $data =  Diagnose_Nursing::create(Request::except('submit', '_token'));
		// $iddd = Request::input('id_patients');

		return $this->nursing_list();
	}


	public function find_patient_nursing($id = null)
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
		->select('fullname_patients','ic_patients','phone_number','age','gender','address_patients','id_patients')
		->where($querycol,$queryope,$querywhere);
		if( is_null($id)) {
			$query = $query->orwhere('phone_number', 'LIKE', '%'.$ic_patients.'%');
			} 
			$query = $query->first();

		if($query)
		{
			$vitalsign = DB::table('vital_sign_form')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$intakeoutput = DB::table('intake_output_chart')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			// $queryorto = DB::table('diagnose_nursing')
			// ->select('*')
			// ->where('id_patients','=',$query->id_patients)
			// ->first();

			$queryorto = [];

			$medication = DB::table('medication_chart')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$progressnote = DB::table('progress_note')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$progression = DB::table('progression')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$monthlyreport = DB::table('monthly_summary_report')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$package = DB::table('package')
			->select('*')
			->where('type_package','=',"nursing")
			->get();

			$nursinglist = DB::table('users')
			->select('*')
			->where('role_id','2')
			->where('department_id','4')
			->get();
			
			return View::make('pages.nursing_form',array('detailspatient' => $query, 'nursinglist'=>$nursinglist, 'vitalsign'=> $vitalsign , 'package'=> $package, 'queryorto' => $queryorto,'progressnote' => $progressnote, 'progression'=> $progression, 'intakeoutput' => $intakeoutput, 'medication' => $medication, 'monthlyreport'=> $monthlyreport));
		}
		else{
			return redirect()->route('nursing_form')->with('RegistrationError', "Please Fill All Information!");
	
		}
	}

	//ADD METHOD
	public function add_vital_sign()
	{
		$id = Input::get('id_patients');

		$time_vital  = date("H:i ", strtotime(Input::get('vs_time')));

		$vitalsign         = new Vital_Sign;
		$vitalsign->vital_date     =  Input::get('vs_date');
		$vitalsign->vital_time    =   $time_vital;
		$vitalsign->vital_blood_pressure    =  Input::get('bp');
		$vitalsign->vital_pulse        =  Input::get('pulse');
		$vitalsign->vital_resp         =  Input::get('resp');
		$vitalsign->vital_temp         =  Input::get('temp');
		$vitalsign->vital_gm         =  Input::get('gm');
		$vitalsign->vital_sign   =  Input::get('sign');
		$vitalsign->id_patients   =  $id;
		$vitalsign->save();

		return $this->find_patient_nursing( $id );
	}

	public function add_intakeoutput()
	{
		$id = Input::get('id_patients');

		$time_io  = date("H:i ", strtotime(Input::get('io_time')));

		$intakeoutput         = new Intake_Output;
		$intakeoutput->io_date     =  Input::get('io_date');
		$intakeoutput->io_time    =   $time_io;
		$intakeoutput->io_oral_fluids    =  Input::get('io_oral_fluids');
		$intakeoutput->io_iv_fluids        =  Input::get('io_iv_fluids');
		$intakeoutput->io_total_intake         =  Input::get('io_total_intake');
		$intakeoutput->io_vomitus         =  Input::get('io_vomitus');
		$intakeoutput->io_gastric_aspiration         =  Input::get('io_gastric_aspiration');
		$intakeoutput->io_bowel_open   =  Input::get('io_bowel_open');
		$intakeoutput->io_urine         =  Input::get('io_urine');
		$intakeoutput->io_remarks         =  Input::get('io_remarks');
		$intakeoutput->io_total_output   =  Input::get('io_total_output');
		$intakeoutput->id_patients   =  $id;
		$intakeoutput->save();

		return $this->find_patient_nursing( $id );
	}
	
	public function add_medication()
	{
		$id = Input::get('id_patients');

		$medication         = new Medication;
		$medication->mc_date_start     =  Input::get('mc_date_start');
		$medication->mc_prescription_name    =  Input::get('mc_prescription_name');
		$medication->mc_dosage        =  Input::get('mc_dosage');
		$medication->mc_duration         =  Input::get('mc_duration');
		$medication->mc_route         =  Input::get('mc_route');
		$medication->mc_sign         =  Input::get('mc_sign');
		$medication->id_patients   =  $id;
		$medication->save();

		return $this->find_patient_nursing( $id );
	}

	public function add_progressnote()
	{
		$id = Input::get('id_patients');
		// $time_pn  = date("H:i ", strtotime(Input::get('pn_time')));

		$progressnote         = new Progress_Note;
		$progressnote->pn_date     =  Input::get('pn_date');
		// $progressnote->pn_time    =   $time_pn;
		$progressnote->pn_activity    =  Input::get('pn_activity');
		$progressnote->id_patients   =  $id;
		$progressnote->save();

		return $this->find_patient_nursing( $id );
	}

	public function add_progression()
	{
		$id = Input::get('id_patients');
		$date=date_create(Input::get('date_progression'));
 		$newdate = date_format($date,"Y-m-d");
		 $id_diagnose = Input::get('id_diagnose');

		$progression         = new Nursing_Assessment;
		$progression->date_assessment     =  $newdate;
		$progression->id_diagnose     =  Input::get('id_diagnose');
		$progression->month    =   Input::get('msr_month_assessment');
		$progression->created_by   =  auth()->user()->staff_no;
		// $progression->progression_problem_disease     =  Input::get('progression_problem_disease');
		$progression->remarks    =   Input::get('progression_remarks');
		$progression->save();

		
		return redirect()->route('nursing_edit',$id_diagnose)->with('SuccessProgressionReport', "Summary Report add successfully");
	}

	public function add_dailyreport()
	{
		$id = Input::get('id_patients');

		$date=date_create(Input::get('date_daily_report'));
		$newdate = date_format($date,"Y-m-d");
		 
		$id_month = Input::get('id_monthly');
		$dailyreport         = new Nursing_Daily;
		$dailyreport->date_daily_report     =  $newdate ; 
		$dailyreport->id_monthly_report    =	Input::get('id_monthly');
		$dailyreport->id_diagnose    =   Input::get('id_diagnose');
		$dailyreport->remarks    =   Input::get('remarks');
		$dailyreport->created_by   =  auth()->user()->staff_no;
		$dailyreport->created_at   =  today();
		$dailyreport->save();

		return redirect()->route('listdailyreport',$id_month)->with('SuccessDailyReport', "Daily Report add successfully");
		// return $this->nursing_edit( $id );
	}

	public function add_monthlyreport()
	{
		$id_user = Auth::id();
		
		$id = Input::get('id_patients');
		$staffid = auth()->user()->staff_no;

		$date=date_create(Input::get('msr_date_monthly_nursing'));
 		$newdate = date_format($date,"Y-m-d");
		$id_diagnose = Input::get('id_diagnose');

		$monthlyreport         = new Nursing_Monthly;
		$monthlyreport->date_monthly_report    =   $newdate;
		$monthlyreport->month    =   Input::get('msr_month');
		$monthlyreport->remarks    =   Input::get('msr_remarks_report');
		$monthlyreport->id_diagnose   =  Input::get('id_diagnose');
		$monthlyreport->created_by   =  $staffid;
		$monthlyreport->save();

		$id = Input::get('id_patients');
		$date=date_create(Input::get('date_progression'));
 		$newdate = date_format($date,"Y-m-d");
		 $id_diagnose = Input::get('id_diagnose');

		$progression         = new Nursing_Assessment;
		$progression->date_assessment     =  $newdate;
		$progression->id_diagnose     =  Input::get('id_diagnose');
		$progression->month    =   Input::get('msr_month');
		$progression->created_by   =  auth()->user()->staff_no;
		// $progression->progression_problem_disease     =  Input::get('progression_problem_disease');
		$progression->remarks    =   Input::get('progression_remarks');
		$progression->save();

		return redirect()->route('nursing_edit',$id_diagnose)->with('SuccessMonthlyReport', "Monthly Report add successfully");
	}

	public function add_medication_dosage()
	{
		$id = Input::get('user_id');
		
		$medication_dosage         = new Medication_Dosage;
		$medication_dosage->mcr_date_given     =  Input::get('dosage_date');
		$medication_dosage->mcr_given_by    =   Input::get('dosage_given');
		$medication_dosage->id_prescription   =  $id;
		$medication_dosage->save();

		// return $this->find_patient_nursing( $id );
	 	 return redirect()->route('medication_dosage',[$medication_dosage->id_prescription]);
	}

	public function add_progressnotedetails()
	{
		$id = Input::get('user_id');
		
		$time_pnd  = date("H:i ", strtotime(Input::get('pnd_time')));
		$pn_details         = new Progress_Note_Details;
		$pn_details->pnd_time     =  $time_pnd;
		$pn_details->pnd_description    =   Input::get('pnd_description');
		$pn_details->id_progress_note   =  $id;
		$pn_details->save();

		// return $this->find_patient_nursing( $id );
	 	 return redirect()->route('progress_note_details',[$pn_details->id_progress_note]);
   	}

	//END ADD METHOD

	//EDIT METHOD

	public function edit_vitalsign($id)
	{

		$listvital = DB::table('vital_sign_form')
		->select('*')
		->get();

		$detailvital = DB::table('vital_sign_form')
		->where('id_vital_sign',$id)
		->first();

		$detailspatient = $detailvital->id_patients;

		$query = DB::table('patients')
		->select('fullname_patients','ic_patients','phone_number','age','gender','address_patients','id_patients')
		->where('id_patients' , $detailspatient)
		->first();

		if($query)
		{
			$vitalsign = DB::table('vital_sign_form')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$intakeoutput = DB::table('intake_output_chart')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$queryorto = DB::table('diagnose')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->first();

			$medication = DB::table('medication_chart')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$progressnote = DB::table('progress_note')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$progression = DB::table('progression')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$monthlyreport = DB::table('monthly_summary_report')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$contents = view('nursing_form',['detailvital'=> $detailvital ,'listvital' => $listvital , 'detailspatient' => $query, 'vitalsign'=> $vitalsign , 'queryorto' => $queryorto,'progressnote' => $progressnote, 'progression'=> $progression, 'intakeoutput' => $intakeoutput, 'medication' => $medication, 'monthlyreport'=> $monthlyreport]);
		$data = $contents->render();
		return response()->json( array( 'data'=>$detailvital) );

		}
	}

	public function edit_vitalsign_process()
	{
		$user_id = input::get('user_id');
		$vs_date    =   Input::get('vs_date');
		$vs_time    =  Input::get('vs_time');
		$bp        =  Input::get('bp');
		$pulse        =  Input::get('pulse');
		$resp         =  Input::get('resp');
		$temp         =  Input::get('temp');
		$gm         =  Input::get('gm');
		$sign         =  Input::get('sign');

		$update_vitalsign = DB::table('vital_sign_form')
		->where('id_vital_sign', $user_id)
		->update(['vital_date' => $vs_date , 'vital_time' => $vs_time , 'vital_blood_pressure' =>$bp ,'vital_pulse'=>$pulse,'vital_resp'=> $resp,  'vital_temp' => $temp, 'vital_gm' => $gm, 'vital_sign' => $sign]);

		return redirect()->route('nursing_form')
		->withSuccessMessage('Successfully Edit!');
	}

	public function edit_intakeoutput($id)
	{

		$listintakeoutput = DB::table('intake_output_chart')
		->select('*')
		->get();

		$detailintakeoutput = DB::table('intake_output_chart')
		->where('id_intake_output',$id)
		->first();

		$detailspatient = $detailintakeoutput->id_patients;

		$query = DB::table('patients')
		->select('fullname_patients','ic_patients','phone_number','age','gender','address_patients','id_patients')
		->where('id_patients' , $detailspatient)
		->first();

		if($query)
		{
			$vitalsign = DB::table('vital_sign_form')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$intakeoutput = DB::table('intake_output_chart')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$queryorto = DB::table('diagnose')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->first();

			$medication = DB::table('medication_chart')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$progressnote = DB::table('progress_note')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$progression = DB::table('progression')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$monthlyreport = DB::table('monthly_summary_report')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$contents = view('nursing_form',['detailintakeoutput'=> $detailintakeoutput ,'listintakeoutput' => $listintakeoutput , 'detailspatient' => $query, 'vitalsign'=> $vitalsign , 'queryorto' => $queryorto,'progressnote' => $progressnote, 'progression'=> $progression, 'intakeoutput' => $intakeoutput, 'medication' => $medication, 'monthlyreport'=> $monthlyreport]);
		$data = $contents->render();
		return response()->json( array( 'data'=>$detailintakeoutput) );

		}
		
	}

	public function edit_intakeoutput_process()
	{
		$user_id = input::get('user_id');
		$io_date     =  Input::get('io_date');
		$io_time    =   date("H:i ", strtotime(Input::get('io_time')));
		$io_oral_fluids    =  Input::get('io_oral_fluids');
		$io_iv_fluids        =  Input::get('io_iv_fluids');
		$io_total_intake         =  Input::get('io_total_intake');
		$io_vomitus         =  Input::get('io_vomitus');
		$io_gastric_aspiration         =  Input::get('io_gastric_aspiration');
		$io_bowel_open   =  Input::get('io_bowel_open');
		$io_remarks         =  Input::get('io_remarks');
		$io_total_output   =  Input::get('io_total_output');

		$update_intakeoutput = DB::table('intake_output_chart')
		->where('id_intake_output', $user_id)
		->update(['io_date' => $io_date , 'io_time' => $io_time , 'io_oral_fluids' =>$io_oral_fluids ,'io_iv_fluids'=>$io_iv_fluids,'io_total_intake'=> $io_total_intake,  'io_vomitus' => $io_vomitus, 'io_gastric_aspiration' => $io_gastric_aspiration, 'io_bowel_open' => $io_bowel_open, 'io_remarks' => $io_remarks,'io_total_output' => $io_total_output,]);

		return redirect()->route('nursing_form')
		->withSuccessMessage('Successfully Edit!');
	}

	public function edit_medication($id)
	{
		dd($id);
		$listmedication = DB::table('medication_chart')
		->select('*')
		->get();

		$detailmedication = DB::table('medication_chart')
		->where('id_prescription',$id)
		->first();

		$detailspatient = $detailmedication->id_patients;

		$query = DB::table('patients')
		->select('fullname_patients','ic_patients','phone_number','age','gender','address_patients','id_patients')
		->where('id_patients' , $detailspatient)
		->first();

		if($query)
		{
			$vitalsign = DB::table('vital_sign_form')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$intakeoutput = DB::table('intake_output_chart')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$queryorto = DB::table('diagnose')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->first();

			$medication = DB::table('medication_chart')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$progressnote = DB::table('progress_note')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$progression = DB::table('progression')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$monthlyreport = DB::table('monthly_summary_report')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$contents = view('nursing_form',['detailmedication'=> $detailmedication ,'listmedication' => $listmedication , 'detailspatient' => $query, 'vitalsign'=> $vitalsign , 'queryorto' => $queryorto,'progressnote' => $progressnote, 'progression'=> $progression, 'intakeoutput' => $intakeoutput, 'medication' => $medication, 'monthlyreport'=> $monthlyreport]);
		$data = $contents->render();
		return response()->json( array( 'data'=>$detailmedication) );

		
		}
		
	}

	public function edit_medication_process()
	{

		$mc_date_start     =  Input::get('mc_date_start');
		$mc_prescription_name    =  Input::get('mc_prescription_name');
		$mc_dosage        =  Input::get('mc_dosage');
		$mc_duration         =  Input::get('mc_duration');
		$mc_route         =  Input::get('mc_route');
		$mc_sign         =  Input::get('mc_sign');

		$update_medication = DB::table('medication_chart')
		->where('id_prescription', $user_id)
		->update(['mc_date_start' => $mc_date_start , 'mc_prescription_name' => $mc_prescription_name , 'mc_dosage' =>$mc_dosage ,'mc_duration'=>$mc_duration,'mc_route'=> $mc_route,  'mc_sign' => $mc_sign]);

		return redirect()->route('nursing_form')
		->withSuccessMessage('Successfully Edit!');
	}

	public function edit_progressnote($id)
	{
		$listprogressnote = DB::table('progress_note')
		->select('*')
		->get();

		$detailprogressnote = DB::table('progress_note')
		->where('id_progress_note',$id)
		->first();

		$detailspatient = $detailprogressnote->id_patients;

		$query = DB::table('patients')
		->select('fullname_patients','ic_patients','phone_number','age','gender','address_patients','id_patients')
		->where('id_patients' , $detailspatient)
		->first();

		if($query)
		{
			$vitalsign = DB::table('vital_sign_form')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$intakeoutput = DB::table('intake_output_chart')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$queryorto = DB::table('diagnose')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->first();

			$medication = DB::table('medication_chart')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$progressnote = DB::table('progress_note')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$progression = DB::table('progression')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$monthlyreport = DB::table('monthly_summary_report')
			->select('*')
			->where('id_patients','=',$query->id_patients)
			->get();

			$contents = view('nursing_form',['detailprogressnote'=> $detailprogressnote ,'listprogressnote' => $listprogressnote , 'detailspatient' => $query, 'vitalsign'=> $vitalsign , 'queryorto' => $queryorto,'progressnote' => $progressnote, 'progression'=> $progression, 'intakeoutput' => $intakeoutput, 'medication' => $medication, 'monthlyreport'=> $monthlyreport]);
		$data = $contents->render();
		return response()->json( array( 'data'=>$detailprogressnote) );
		}
		
	}

	public function edit_progressnote_process()
	{
		$user_id = input::get('user_id');

		$pn_date     =  Input::get('pn_date');
		// $progressnote->pn_time    =   $time_pn;
		$pn_activity    =  Input::get('pn_activity');

		$update_progressnote = DB::table('progress_note')
		->where('id_progress_note', $user_id)
		->update(['pn_date' => $pn_date , 'pn_activity' => $pn_activity ]);

		return redirect()->route('nursing_form')
		->withSuccessMessage('Successfully Edit!');
	}

	public function edit_progression($id)
	{
		$detailassessment = Nursing_Assessment::where('id_assessment_report',$id)->first();

		return response()->json( array( 'data'=>$detailassessment) );
		
	}

	public function edit_progression_process()
	{
		$id = input::get('user_id');

		$id_diagnose     =  Input::get('id_diagnose');
		$date = date_create(Input::get('date_progression'));
 		$newdate = date_format($date,"Y-m-d");
		
		$created_by   =  auth()->user()->staff_no;

		$month    =   Input::get('msr_month_assessment');
		$progression_remarks    =   Input::get('progression_remarks');

		$update_progressnote = DB::table('nursing_assessment_report')
		->where('id_assessment_report', $id)
		->update(['month' => $month ,'date_assessment' => $newdate ,'created_by' => $created_by , 'remarks' => $progression_remarks ]);

		return redirect()->route('nursing_edit',$id_diagnose)->with('SuccessMonthlyReport', "Assessment Report edit successfully");
	}
	// =============================
	public function edit_dailyreport($id)
	{
		$detaildaily = Nursing_Daily::where('id_daily_report',$id)->first();

		return response()->json( array( 'data'=>$detaildaily) );
		
	}

	public function edit_dailyreport_process()
	{
		$user_id = input::get('user_id');
		$id_month = input::get('id_monthly');

		$date=date_create(Input::get('date_daily_report'));
 		$msr_date = date_format($date,"Y-m-d");

		// $msr_date     =  Input::get('date_daily_report');
		$msr_remarks_report    =   Input::get('remarks');

		$update_daily = DB::table('nursing_daily_report')
		->where('id_daily_report', $user_id)
		->update(['date_daily_report' => $msr_date ,'remarks' => $msr_remarks_report ]);

		return redirect()->route('listdailyreport',$id_month);
	}


	// =============================

	public function edit_monthlyreport($id)
	{
		$detailmonthlyreport = Nursing_Monthly::where('id_monthly_report',$id)->first();

		return response()->json( array( 'data'=>$detailmonthlyreport) );
	}

	public function edit_monthlyreport_process()
	{

		$staffid = auth()->user()->staff_no;
		$id = input::get('user_id');
		$id_diagnose = input::get('id_diagnose');

		$date=date_create(Input::get('msr_date_monthly_nursing'));
 		$msr_date = date_format($date,"Y-m-d");

		// $msr_date     =  Input::get('msr_date');
		$msr_month    =   Input::get('msr_month');
		$msr_remarks_report    =   Input::get('msr_remarks_report');

		$update_progressnote = DB::table('nursing_monthly_report')
		->where('id_monthly_report', $id)
		->update(['date_monthly_report' => $msr_date , 'month' => $msr_month ,'created_by' => $staffid , 'remarks' => $msr_remarks_report ]);

		return redirect()->route('nursing_edit',$id_diagnose)->with('SuccessMonthlyReport', "Monthly Report add successfully");
	}

	public function nursing_monthlyreport($id)
	{

		return redirect()->route('nursing_form');
	}


	public function edit_patient_nursing_relative($id)
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

	  $contents = view('relative_list_nursing',['listrelative'=> $listrelative ,'detailsrelative' => $detailsrelative ,'patient' => $patients]);
	  $data = $contents->render();
	  return response()->json( array( 'data'=>$detailsrelative) );
	}

	public function edit_patient_nursing_relative_process()
	{

	  $user_id = input::get('user_id');
	  $fullname_relative = input::get('fullname-relative');
	  $lastname_relative     =  Input::get('lastname-relative');
	  $phonenum_relative    =   Input::get('phonenum-relative');


	  $update_patient = DB::table('relative_patients_nursing')
	  ->where('id_rel_patients', $user_id)
	  ->update(['fullname_relatives' => $fullname_relative , 'lastname_relatives' => $lastname_relative  , 'phone_no_relatives' => $phonenum_relative ]);

	  return redirect()->route('register_patient')
	  ->withSuccessMessage('Successfully Edit!');

	}


	//END EDIT METHOD

	//DELETE METHOD
	public function delete_vitalsign($id){

		$query = DB::table('vital_sign_form')
		->select('id_patients')
		->where('id_vital_sign','=',$id)
		->first();

		$deletemethod = Vital_Sign::find($id);
		$deletemethod->delete();

		return $this->nursing_edit($query->id_patients);
	}

	public function delete_intakeoutput($id){

		$query = DB::table('intake_output_chart')
		->select('id_patients')
		->where('id_intake_output','=',$id)
		->first();

		$deletemethod = Intake_Output::find($id);
		$deletemethod->delete();

		return $this->nursing_edit($query->id_patients);
	}

	public function delete_relative_nursing($id)
	{

	  $deleterelative = PatientRelative::find($id);

	  if($deleterelative->delete()){
	   return redirect()->route('relativeshow_nursing',[$deleterelative->id_patients])
	   ->withSuccessMessage('Successfully Delete!');
	 }
	 else{
	  return redirect()->route('relative_list_nursing');              }

	}

	public function delete_medicationchart($id){

		$query = DB::table('medication_chart')
		->select('id_patients')
		->where('id_prescription','=',$id)
		->first();

		$deletemethod = Medication::find($id);
		$deletemethod->delete();

		return $this->nursing_edit($query->id_patients);
	}

	public function delete_medicationroutine($id){

		$query = DB::table('medical_chart_routine')
		->select('id_prescription')
		->where('id_routine','=',$id)
		->first();

		$deletemethod = Medication_Dosage::find($id);
		$deletemethod->delete();

		return redirect()->route('medication_dosage',[$query->id_prescription]);
	}

	public function delete_progressnote($id){

		$query = DB::table('progress_note')
		->select('id_patients')
		->where('id_progress_note','=',$id)
		->first();

		$deletemethod = Progress_Note::find($id);
		$deletemethod->delete();

		return $this->find_patient_nursing($query->id_patients);
	}

	public function delete_progressnotedetail($id){

		$query = DB::table('progress_note_details')
		->select('id_progress_note')
		->where('id_pn_detail','=',$id)
		->first();

		$deletemethod = Progress_Note_Details::find($id);
		$deletemethod->delete();

		return redirect()->route('progress_note_details',[$query->id_progress_note]);
	}

	public function delete_progression($id){

		$query = DB::table('nursing_assessment_report')
		->select('*')
		->where('id_assessment_report','=',$id)
		->first();

		$deletemethod = Nursing_Assessment::find($id);
		$deletemethod->delete();

		return redirect()->route('nursing_edit',$query->id_diagnose)->with('SuccessMonthlyReport', "Assessment Report deleted successfully");
	}

	public function delete_monthlyreport($id){

		$getMonth = DB::table('nursing_monthly_report')
		->select('*')
		->where('id_monthly_report','=',$id)
		->first();

		$deleted_at = today();

		$query = DB::table('nursing_monthly_report')
		->where('id_monthly_report',$id)
		->update(['deleted_at' => today()]);

		// $deletemethod = Nursing_Monthly::find($id);
		// $deletemethod->delete();

		return redirect()->route('nursing_edit',$getMonth->id_diagnose)->with('SuccessMonthlyReport', "Monthly Report delete successfully");
		// return redirect()->route('nursing_edit',$id_diagnose);
		// return $this->nursing_edit($id_diagnose);
	}

	public function delete_dailyreport($id){

		$id_diagnose = Input::get('id_diagnose');
		$query = DB::table('nursing_daily_report')
		->select('*')
		->where('id_daily_report','=',$id)
		->first();

		$deletemethod = Nursing_Daily::find($id);
		$deletemethod->delete();

		return redirect()->route('listdailyreport',$query->id_monthly_report);
	}

	public function delete_diagnose_nursing($id){

		$query = DB::table('diagnose_nursing')
		->select('id_patients')
		->where('id_diagnose','=',$id)
		->first();

		$deletemethod = Diagnose_Nursing::find($id);
		$deletemethod->delete();

		return $this->nursing_list();
	}

	
	

	//END DELETE METHOD

	public function progress_note_details($id)
	{
		$listpndetails = DB::table('progress_note_details')
		->select('*')
		->where('id_progress_note','=',$id)
		->get()
		->sortBy('pnd_time');

		$listpn = DB::table('progress_note')
		->where('id_progress_note',$id)
		->select('id_progress_note','pn_date')
		->first();


		return view('master_template')->nest('content','nursing_progress_note',['listpn'=> $listpn, 'listpndetails' => $listpndetails]);
	}

	public function medication_dosage($id)
	{

		$listprescriptiondosage = DB::table('medical_chart_routine')
		->select('*')
		->where('id_prescription','=',$id)
		->get();

		$listprescription = DB::table('medication_chart')
		->where('id_prescription',$id)
		->select('id_prescription','mc_prescription_name')
		->first();


		return view('master_template')->nest('content','nursing_medication_dosage',['listprescription'=> $listprescription, 'listprescriptiondosage' => $listprescriptiondosage]);
	}
	

}