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
use Illuminate\Http\Request;

class PWSPaymentController extends Controller
{
  public function __construct()
	{
    	$this->middleware('auth');
	} 
public function payment_list()
{

  $paymentlisting = DB::table('payments')
  ->select('payments.*','patients.fullname_patients','patients.lastname_patients','diagnose.doctor_diagnose' ,'users.fullname')
  ->join('patients','payments.id_patients','=','patients.id_patients')
  ->join('diagnose', 'payments.id_diagnose', '=', 'diagnose.id_diagnose')
  ->join('users','payments.id_user','=','users.id')
  ->get();

  return \View::make('master_template')
  ->nest('content','payment_listing',['paymentlisting'=> $paymentlisting]);
}

public function verified_status($id){

$payment = Payments::find($id);
$payment->verify_by = Auth::id();
$payment->status_verified = "Verified";
$payment->save();

 $paymentlisting = DB::table('payments')
  ->select('payments.*','patients.fullname_patients','patients.lastname_patients','diagnose.doctor_diagnose' ,'users.fullname')
  ->join('patients','payments.id_patients','=','patients.id_patients')
  ->join('diagnose', 'payments.id_diagnose', '=', 'diagnose.id_diagnose')
  ->join('users','payments.id_user','=','users.id')
  ->get();
   return \View::make('master_template')
  ->nest('content','payment_listing',['paymentlisting'=> $paymentlisting]);
}



}