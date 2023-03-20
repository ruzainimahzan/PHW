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
use App\Models\Roaster;
use Carbon\Carbon;



class PWSReportController extends Controller
{


	public function patientreport_daily(Request $request){


		if($request->ajax()){

			$dailydate1 = $request->dailydate;
			$dailydate  = date("Y-m-d", strtotime($dailydate1));
			$verified = "Verified";
			$data = DB::table('diagnose')
			->select('diagnose.created_at','diagnose.id_diagnose','patients.fullname_patients','patients.ic_patients','patients.phone_number','diagnose.doctor_diagnose','diagnose.id_type_session','treatment.treatment_amount', 'payments.total_payment')
			->join('patients','patients.id_patients','=','diagnose.id_patients')
			->join('treatment','treatment.id_diagnose','=','diagnose.id_diagnose')
			->leftjoin('payments','payments.id_diagnose','=','diagnose.id_diagnose')
			->where('payments.status_verified','=',$verified)
			->whereRaw("IF (treatment.treatment_amount = 'NULL', payments.payment_date like '%$dailydate%' ,diagnose.created_at like '%$dailydate%')")
			// ->toSql();
			->get();
			// dd($data);

			return response()->json(['data'=>$data]);
		}
		else{
			return \View::make('pages.report_daily');
		}
	}

	public function getdataTypeSession(Request $request){
		$idsessiontypejson = json_decode($request->idtypesession, true);
		$data = DB::table('type_sessions')
		->select('*')
		->whereIn('id_type_sessions',$idsessiontypejson)
		->get();

		$ez = $data->implode('name_type_sessions', ',');	
		return response()->json(['datatypesession'=>$ez]);
	}

	public function patientreport_monthly(Request $request){
		
		if($request->ajax()){
			
			$datepicer_month_start = $request->datepicer_month_start;
			$dateMonthArray = explode('-', $datepicer_month_start);
			$year = $dateMonthArray[0];
			
			$month = $dateMonthArray[1];

			$date = Carbon::createFromDate($year, $month, 1);
			
			$datepicer_month_end = $request->datepicer_month_end;
			$dateMonthArrayEnd = explode('-', $datepicer_month_end);
			$yearend1 = $dateMonthArrayEnd[0];
			$monthend1= $dateMonthArrayEnd[1];

			$dateend = Carbon::createFromDate($yearend1, $monthend1, 1);
			$datepicermonthstart  = $date->format('Y-m');

			$monthstart =  $month;
			$yearstart =  $year;
			$monthend = $monthend1;
			$yearend = $yearend1;


			$datepicermonthend = $dateend->format('Y-m');

			if($datepicer_month_start != "" && $datepicer_month_end == "")
			{	
				$data = DB::table('diagnose')
				->select('diagnose.created_at','diagnose.id_diagnose','patients.fullname_patients','patients.ic_patients','patients.phone_number','diagnose.doctor_diagnose','diagnose.id_type_session','treatment.treatment_amount', 'payments.total_payment')
				->join('patients','patients.id_patients','=','diagnose.id_patients')
				->join('treatment','treatment.id_diagnose','=','diagnose.id_diagnose')
				->leftjoin('payments','payments.id_diagnose','=','diagnose.id_diagnose')
				->whereRaw("IF (treatment.treatment_amount = 'NULL', payments.payment_date like '%$datepicermonthstart%' ,diagnose.created_at like '%$datepicermonthstart%')")
				->get();


				return response()->json(['data'=>$data]);
			}
			else
			{
				$data = DB::table('diagnose')
				->select('diagnose.created_at','diagnose.id_diagnose','patients.fullname_patients','patients.ic_patients','patients.phone_number','diagnose.doctor_diagnose','diagnose.id_type_session','treatment.treatment_amount', 'payments.total_payment')
				->join('patients','patients.id_patients','=','diagnose.id_patients')
				->join('treatment','treatment.id_diagnose','=','diagnose.id_diagnose')
				->leftjoin('payments','payments.id_diagnose','=','diagnose.id_diagnose')
				->whereRaw("IF (treatment.treatment_amount = 'NULL', MONTH(payment_date) BETWEEN '$monthstart' AND '$monthend' AND YEAR(payment_date) BETWEEN '$yearstart' AND '$yearend', MONTH(diagnose.created_at) BETWEEN '$monthstart' AND '$monthend' AND YEAR(diagnose.created_at) BETWEEN '$yearstart' AND '$yearend')")
				->get();
				// ->toSql();
				// dd($data);

				return response()->json(['data'=>$data]);
			}

		}
		else
		{
			// return \View::make('master_template')->nest('content','report_monthly');
			return \View::make('pages.report_monthly');
		}
	}
	public function patientreport_yearly(Request $request)
	{
		if($request->ajax()){
			
			$datepicer_year_start = $request->datepicer_year_start;
			$datepicer_year_end = $request->datepicer_year_end;

			

			$data = DB::table('diagnose')
			->select('diagnose.created_at','diagnose.id_diagnose','patients.fullname_patients','patients.ic_patients','patients.phone_number','diagnose.doctor_diagnose','diagnose.id_type_session','treatment.treatment_amount', 'payments.total_payment')
			->join('patients','patients.id_patients','=','diagnose.id_patients')
			->join('treatment','treatment.id_diagnose','=','diagnose.id_diagnose')
			->leftjoin('payments','payments.id_diagnose','=','diagnose.id_diagnose')
			->whereRaw("IF (treatment.treatment_amount = 'NULL', YEAR(payment_date) BETWEEN '$datepicer_year_start' AND '$datepicer_year_end', YEAR(diagnose.created_at) BETWEEN '$datepicer_year_start' AND '$datepicer_year_end')")
			->get();
				// ->toSql();
				// dd($data);
			return response()->json(['data'=>$data]);		
		}
		else
		{
			// return \View::make('master_template')->nest('content','report_yearly');
			return \View::make('pages.report_yearly');
		}
	}

	public function previewtimetable(Request $request){
		
		$startdate = input::get('start');
		$enddate = input::get('end');
		$startdate=date_create(Input::get('start'));
		$enddate=date_create(Input::get('end'));
		$start = date_format($startdate,"Y-m-d");
		$end = date_format($enddate,"Y-m-d");

// 		SELECT patients.fullname_patients , roasters.day , users.fullname FROM `roasters` 
// LEFT JOIN users ON roasters.id_staff = users.id
// JOIN roaster_list ON roasters.id_roaster_list = roaster_list.id_roaster_list
// JOIN patients on roasters.id_patients = patients.id_patients
// WHERE roaster_list.category_roaster = 1
// ORDER BY roasters.day ASC

		$data = Roaster::select('patients.fullname_patients','patients.id_patients' , 'roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->Join('patients','roasters.id_patients','=','patients.id_patients')
		->whereBetween('day', [$start, $end])
		->where('roaster_list.category_roaster',1)
		->groupby('roasters.day')
		->orderBy('roasters.day','ASC')
		->get();

		$dataAirie = Roaster::select('patients.fullname_patients' , 'patients.id_patients','roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->join('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->Join('patients','roasters.id_patients','=','patients.id_patients')
		->whereBetween('day', [$start, $end])
		->where('roaster_list.category_roaster',1)
		 ->groupby('patients.fullname_patients')
		->orderBy('roasters.day','ASC')
		->get();

		$center = Roaster::select('category_roaster.name' , 'roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->leftJoin('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->leftJoin('patients','roasters.id_patients','=','patients.id_patients')
		->leftJoin('category_roaster','roaster_list.category_roaster','=','category_roaster.id')
		->where('roaster_list.category_roaster',2)
		->groupby('roasters.day')
		->orderBy('roasters.day','ASC')
		->get();


		$events = Roaster::select('category_roaster.name' , 'roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->leftJoin('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->leftJoin('patients','roasters.id_patients','=','patients.id_patients')
		->leftJoin('category_roaster','roaster_list.category_roaster','=','category_roaster.id')
		->where('roaster_list.category_roaster',3)
		->groupby('roasters.day')
		->orderBy('roasters.day','ASC')
		->get();
		
		$restday = Roaster::select('category_roaster.name' , 'roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->leftJoin('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->leftJoin('patients','roasters.id_patients','=','patients.id_patients')
		->leftJoin('category_roaster','roaster_list.category_roaster','=','category_roaster.id')
		->where('roaster_list.category_roaster',4)
		->groupby('roasters.day')
		->orderBy('roasters.day','ASC')
		->get();


		$rph = Roaster::select('category_roaster.name' , 'roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->leftJoin('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->leftJoin('patients','roasters.id_patients','=','patients.id_patients')
		->leftJoin('category_roaster','roaster_list.category_roaster','=','category_roaster.id')
		->where('roaster_list.category_roaster',5)
		->groupby('roasters.day')
		->orderBy('roasters.day','ASC')
		->get();

		$annualleave = Roaster::select('category_roaster.name' , 'roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->leftJoin('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->leftJoin('patients','roasters.id_patients','=','patients.id_patients')
		->leftJoin('category_roaster','roaster_list.category_roaster','=','category_roaster.id')
		->where('roaster_list.category_roaster',6)
		->groupby('roasters.day')
		->orderBy('roasters.day','ASC')
		->get();

		$maternityleave = Roaster::select('category_roaster.name' , 'roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->leftJoin('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->leftJoin('patients','roasters.id_patients','=','patients.id_patients')
		->leftJoin('category_roaster','roaster_list.category_roaster','=','category_roaster.id')
		->where('roaster_list.category_roaster',7)
		->groupby('roasters.day')
		->orderBy('roasters.day','ASC')
		->get();

		$emergencyleave = Roaster::select('category_roaster.name' , 'roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->leftJoin('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->leftJoin('patients','roasters.id_patients','=','patients.id_patients')
		->leftJoin('category_roaster','roaster_list.category_roaster','=','category_roaster.id')
		->where('roaster_list.category_roaster',8)
		->groupby('roasters.day')
		->orderBy('roasters.day','ASC')
		->get();

		$unpaidleave = Roaster::select('category_roaster.name' , 'roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->leftJoin('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->leftJoin('patients','roasters.id_patients','=','patients.id_patients')
		->leftJoin('category_roaster','roaster_list.category_roaster','=','category_roaster.id')
		->where('roaster_list.category_roaster',9)
		->groupby('roasters.day')
		->orderBy('roasters.day','ASC')
		->get();

		$oncall = Roaster::select('category_roaster.name' , 'roasters.day' , 'users.fullname','users.lastname')
		->leftJoin('users','roasters.id_staff','=','users.id')
		->leftJoin('roaster_list','roasters.id_roaster_list','=','roaster_list.id_roaster_list')
		->leftJoin('patients','roasters.id_patients','=','patients.id_patients')
		->leftJoin('category_roaster','roaster_list.category_roaster','=','category_roaster.id')
		->where('roaster_list.category_roaster',10)
		->groupby('roasters.day')
		->orderBy('roasters.day','ASC')
		->get();


		if($data != null){
			$pdf = \App::make('snappy.pdf.wrapper');
					$pdf->setOption('header-html', base_path('views/layouts/headerpdf.blade.php'));
					$pdf->setOption('dpi', 150);
					$pdf->setOption('enable-javascript', true);
					$pdf->setOption('javascript-delay', 5000);
					$pdf->setOption('enable-smart-shrinking', true);
					$pdf->setOption('no-stop-slow-scripts', true);
					// $pdf->loadView('pdfreport.timetablereport',compact('col','patient','nursi'))->setPaper('a4', 'potrait');
					$pdf->loadView('pdfreport.timetablereport',compact('data','dataAirie','center','events','restday','rph','annualleave','maternityleave','emergencyleave','unpaidleave','oncall'))->setPaper('a4', 'portrait');
					// return $pdf->inline();
					return $pdf->download('time roaster.pdf', array('Attachment' => true));
		}
	}


	public function previewreport_daily(Request $request){
		$dailydate = input::get('dailydatePDF');
		$verified = "Verified";
		if($dailydate != null){
			try{
				$dailydate = date("Y-m-d", strtotime($dailydate));
				$data = DB::table('diagnose')
				->select('diagnose.created_at','diagnose.id_diagnose','patients.fullname_patients','patients.ic_patients','patients.phone_number','diagnose.doctor_diagnose','diagnose.id_type_session','treatment.treatment_amount', 'payments.total_payment')
				->join('patients','patients.id_patients','=','diagnose.id_patients')
				->join('treatment','treatment.id_diagnose','=','diagnose.id_diagnose')
				->leftjoin('payments','payments.id_diagnose','=','diagnose.id_diagnose')
				->whereRaw("IF (treatment.treatment_amount = 'NULL', payments.payment_date like '%$dailydate%' ,diagnose.created_at like '%$dailydate%')")
				->where('payments.status_verified','=',$verified)
				->get();
				

				if(count($data)){
					$pdf = \App::make('snappy.pdf.wrapper');
					$pdf->setOption('header-html', base_path('views/layouts/headerpdf.blade.php'));
					$pdf->setOption('dpi', 150);
					$pdf->setOption('enable-javascript', true);
					$pdf->setOption('javascript-delay', 5000);
					$pdf->setOption('enable-smart-shrinking', true);
					$pdf->setOption('no-stop-slow-scripts', true);
					$pdf->loadView('pdfreport.dailydatereport', compact('data','dailydate'))->setPaper('a4', 'portrait');
					return $pdf->download('daily_report.pdf', array('Attachment' => true));
				}
				else{
					return redirect()->back()->withInput()->with('TherapistError', "No Data.");
				}
			}
			catch(Exception $e){
				
				return redirect()->back()->withInput()->with('ReportDailyError', "Please contact developer for troubleshoot.");
			}
		}else{
			return redirect()->back()->withInput()->with('ReportDailyError', "Please Select Date Report.");
		}
	}

	public function previewreport_monthly(Request $request){

		$datepicer_month_start = Input::get('datepicermonthstartPDF');
		$dateMonthArray = explode('-', $datepicer_month_start);
		$year = $dateMonthArray[0];
		
		$month = $dateMonthArray[1];

		$date = Carbon::createFromDate($year, $month, 1);
		
		$datepicer_month_end = Input::get('datepicermonthendPDF');
		$dateMonthArrayEnd = explode('-', $datepicer_month_end);
		$yearend1 = $dateMonthArrayEnd[0];
		$monthend1= $dateMonthArrayEnd[1];

		$dateend = Carbon::createFromDate($yearend1, $monthend1, 1);
		$datepicermonthstart  = $date->format('Y-m');
		$datepicermonthend  = $dateend->format('Y-m');
		$datepicermonthstart1  = $date->format('m-Y');
		$datepicermonthend1 = $dateend->format('m-Y');
		$monthstart =  $month;
		$yearstart =  $year;
		$monthend = $monthend1;
		$yearend = $yearend1;




		if($datepicer_month_start != "" && $datepicer_month_end == "")
		{	
			try{
				$data = DB::table('diagnose')
				->select('diagnose.created_at','diagnose.id_diagnose','patients.fullname_patients','patients.ic_patients','patients.phone_number','diagnose.doctor_diagnose','diagnose.id_type_session','treatment.treatment_amount', 'payments.total_payment')
				->join('patients','patients.id_patients','=','diagnose.id_patients')
				->join('treatment','treatment.id_diagnose','=','diagnose.id_diagnose')
				->leftjoin('payments','payments.id_diagnose','=','diagnose.id_diagnose')
				->whereRaw("IF (treatment.treatment_amount = 'NULL', payments.payment_date like '%$datepicermonthstart%' ,diagnose.created_at like '%$datepicermonthstart%')")
				->get();

				if(count($data)){

					$pdf = \App::make('snappy.pdf.wrapper');
					$pdf->setOption('dpi', 150);
					$pdf->setOption('enable-javascript', true);
					$pdf->setOption('javascript-delay', 5000);
					$pdf->setOption('enable-smart-shrinking', true);
					$pdf->setOption('no-stop-slow-scripts', true);
					$pdf->loadView('pdfreport.monthlydatereport', compact('data','datepicermonthstart1','datepicermonthend1'))->setPaper('a4', 'portrait');

					return $pdf->download('monthly_report.pdf', array('Attachment' => true));
				}
				else{
					return redirect()->back()->withInput()->with('TherapistError', "No Data.");
				}
			}
			
			catch(Exception $e){
				return redirect()->back()->withInput()->with('TherapistError', "Please contact developer for troubleshoot.");
			}

		}else{


			$data = DB::table('diagnose')
			->select('diagnose.created_at','diagnose.id_diagnose','patients.fullname_patients','patients.ic_patients','patients.phone_number','diagnose.doctor_diagnose','diagnose.id_type_session','treatment.treatment_amount', 'payments.total_payment')
			->join('patients','patients.id_patients','=','diagnose.id_patients')
			->join('treatment','treatment.id_diagnose','=','diagnose.id_diagnose')
			->leftjoin('payments','payments.id_diagnose','=','diagnose.id_diagnose')
			->whereRaw("IF (treatment.treatment_amount = 'NULL', MONTH(payment_date) BETWEEN '$monthstart' AND '$monthend' AND YEAR(payment_date) BETWEEN '$yearstart' AND '$yearend', MONTH(diagnose.created_at) BETWEEN '$monthstart' AND '$monthend' AND YEAR(diagnose.created_at) BETWEEN '$yearstart' AND '$yearend')")
			->get();

			if(count($data)){

				$pdf = \App::make('snappy.pdf.wrapper');
				$pdf->setOption('dpi', 150);
				$pdf->setOption('enable-javascript', true);
				$pdf->setOption('javascript-delay', 5000);
				$pdf->setOption('enable-smart-shrinking', true);
				$pdf->setOption('no-stop-slow-scripts', true);
				$pdf->loadView('pdfreport.monthlydatereport', compact('data','datepicermonthstart1','datepicermonthend1'))->setPaper('a4', 'portrait');
				
				return $pdf->download('monthly_report.pdf', array('Attachment' => true));
			}
			else{
				return redirect()->back()->withInput()->with('TherapistError', "No Data.");
			}
		}
	}

	public function previewreport_yearly(Request $request){
		$datepicer_year_start = Input::get('datepiceryearstartPDF');
		$datepicer_year_end = Input::get('datepiceryearendPDF');

		

		$data = DB::table('diagnose')
		->select('diagnose.created_at','diagnose.id_diagnose','patients.fullname_patients','patients.ic_patients','patients.phone_number','diagnose.doctor_diagnose','diagnose.id_type_session','treatment.treatment_amount', 'payments.total_payment')
		->join('patients','patients.id_patients','=','diagnose.id_patients')
		->join('treatment','treatment.id_diagnose','=','diagnose.id_diagnose')
		->leftjoin('payments','payments.id_diagnose','=','diagnose.id_diagnose')
		->whereRaw("IF (treatment.treatment_amount = 'NULL', YEAR(payment_date) BETWEEN '$datepicer_year_start' AND '$datepicer_year_end', YEAR(diagnose.created_at) BETWEEN '$datepicer_year_start' AND '$datepicer_year_end')")
		->get();

		if(count($data)){

			$pdf = \App::make('snappy.pdf.wrapper');
			$pdf->setOption('dpi', 150);
			$pdf->setOption('enable-javascript', true);
			$pdf->setOption('javascript-delay', 5000);
			$pdf->setOption('enable-smart-shrinking', true);
			$pdf->setOption('no-stop-slow-scripts', true);
			$pdf->loadView('pdfreport.yearlydatereport', compact('data','datepicer_year_start','datepicer_year_end'))->setPaper('a4', 'portrait');

			return $pdf->download('yearly_report.pdf', array('Attachment' => true));
		}
		else{
			return redirect()->back()->withInput()->with('TherapistError', "No Data.");
		}
		
	}

	public function printreceipt(Request $request){

		try{
			$id = $request->input('id_payment');
			$data = DB::table('payments')
			->select('payments.*','diagnose.doctor_diagnose','diagnose.id_type_session')
			->join('diagnose','diagnose.id_diagnose','=','payments.id_diagnose')
			->where('id_payment','=',$id)
			->get();

			$typeSession = DB::table('type_sessions')
			->select('*')
			->get();

			$arr = $data;

			$result = json_decode($arr, true);		
			$cleanResult = $result[0]['id_type_session'];
			$cleanResult = json_decode($cleanResult);

			//dd($cleanResult);
			$service = array();
			if(!empty($cleanResult)){
				foreach ($typeSession as $key => $value) {
					foreach ($cleanResult as $keytype => $valuetype) {
						if($valuetype == $value->id_type_sessions){
							array_push($service, $value->name_type_sessions);
						}
					}

				}
			}
			//dd($service);

			$user = DB::table('payments')
			->select('patients.*')
			->join('patients','patients.id_patients','=','payments.id_patients')
			->where('id_payment','=',$id)
			->first();

			if(count($data)){
				$pdf = \App::make('snappy.pdf.wrapper');
				$pdf->setOption('dpi', 150);
				$pdf->setOption('enable-javascript', true);
				$pdf->setOption('javascript-delay', 5000);
				$pdf->setOption('enable-smart-shrinking', true);
				$pdf->setOption('no-stop-slow-scripts', true);
				$pdf->loadView('pdfreport.receiptpdf', compact('data','user','service'))->setPaper('a4', 'portrait');
				return $pdf->download('receipt.pdf', array('Attachment' => true));

			}else{
				return redirect()->back()->withInput()->with('TherapistError', "No Data.");
			}
		}catch(Exception $e){
			return redirect()->back()->withInput()->with('TherapistError', "Please contact developer for troubleshoot.");
		}
	}
}
?>