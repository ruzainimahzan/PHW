<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/updated-activity', 'TelegramBotController@updatedActivity');
// Route::get('/', 'TelegramBotController@sendMessage');
Route::post('/send-message', 'TelegramBotController@storeMessage');
Route::get('/send-photo', 'TelegramBotController@sendPhoto');
Route::post('/store-photo', 'TelegramBotController@storePhoto');
Route::get('/updated-activity', 'TelegramBotController@updatedActivity');

Route::get('/', 'PWSBackendController@index')->name('login');
Route::get('/forgot_password', 'PWSHQController@forgot_password')->name('forgot_password');
Route::post('/forgot_password_process', 'PWSHQController@forgot_password_process')->name('forgot_password_process');
Route::post('/login_process', 'PWSBackendController@login_process')->name('login_process');
Auth::routes();
Route::get('/home', 'PWSBackendController@home')->name('home');
Route::get('/register_user', 'PWSBackendController@register_user')->name('register_user');
Route::get('/therapist_form', 'PWSBackendController@therapist_form')->name('therapist_form');
Route::post('/add_staff', 'PWSHQController@add_staff')->name('add_staff');
Route::get('/edit_staff/{id}', 'PWSBackendController@edit_staff')->name('edit_staff');
Route::post('edit_staff_process', 'PWSBackendController@edit_staff_process')->name('edit_staff_process');
Route::get('delete_staff/{id}', 'PWSBackendController@delete_staff')->name('delete_staff');
Route::get('logout', 'PWSBackendController@logout')->name('logout');
Route::get('/register_patient_detail', 'PWSBackendController@register_patient_detail')->name('register_patient_detail');
Route::get('/relative/{id}', 'PWSBackendController@relativeshow')->name('relativeshow');

//Route for Patient
Route::get('/register_patient', 'PWSBackendController@register_patient')->name('register_patient');
Route::get('/register_patient_nursing', 'PWSBackendController@register_patient_nursing')->name('register_patient_nursing');
Route::post('/add_patient', 'PWSBackendController@add_patient')->name('add_patient');
Route::post('/add_patient_nursing', 'PWSBackendController@add_patient_nursing')->name('add_patient_nursing');


Route::get('/edit_patient/{id}', 'PWSBackendController@edit_patient')->name('edit_patient');
Route::post('edit_patient_process', 'PWSBackendController@edit_patient_process')->name('edit_patient_process');

Route::get('/edit_patient_nursing/{id}', 'PWSBackendController@edit_patient_nursing')->name('edit_patient_nursing');
Route::post('edit_patient_nursing_process', 'PWSBackendController@edit_patient_nursing_process')->name('edit_patient_nursing_process');

Route::get('delete_patient/{id}', 'PWSBackendController@delete_patient')->name('delete_patient');
Route::get('delete_patient_nursing/{id}', 'PWSBackendController@delete_patient_nursing')->name('delete_patient_nursing');

//Route for Relative
Route::post('/add_patient_relative', 'PWSBackendController@add_patient_relative')->name('add_patient_relative');
Route::get('/edit_patient_relative/{id}', 'PWSBackendController@edit_patient_relative')->name('edit_patient_relative');
Route::post('edit_patient_relative_process', 'PWSBackendController@edit_patient_relative_process')->name('edit_patient_relative_process');
Route::get('delete_relative/{id}', 'PWSBackendController@delete_relative')->name('delete_relative');

Route::post('/add_patient_nursing_relative', 'PWSBackendController@add_patient_nursing_relative')->name('add_patient_nursing_relative');
Route::get('/edit_patient_nursing_relative/{id}', 'PWSBackendController@edit_patient_nursing_relative')->name('edit_patient_nursing_relative');
Route::post('edit_patient_nursing_relative_process', 'PWSBackendController@edit_patient_nursing_relative_process')->name('edit_patient_nursing_relative_process');
Route::get('delete_nursing_relative/{id}', 'PWSBackendController@delete_relative')->name('delete_nursing_relative');

//search patient for therapist
Route::post('/find_patient','PWSBackendController@find_patient')->name('find_patient');

//Route for Therapist
Route::post('/add_attendance','PWSBackendController@add_attendance')->name('add_attendance');
Route::post('/edit_attendance','PWSBackendController@edit_attendance')->name('edit_attendance');
Route::post('/add_methodsoap','PWSBackendController@add_methodsoap')->name('add_methodsoap');
Route::get('delete_method/{id}', 'PWSBackendController@delete_method')->name('delete_method');
Route::post('/add_orthopaedic','PWSBackendController@add_orthopaedic')->name('add_orthopaedic');
Route::post('/add_simplereport','PWSBackendController@add_simplereport')->name('add_simplereport');
Route::get('delete_report/{id}', 'PWSBackendController@delete_report')->name('delete_report');
Route::get('delete_attendance/{id}', 'PWSBackendController@delete_attendance')->name('delete_attendance');
//post ortherapist form(
Route::post('/add_joint_movement','PWSBackendController@add_joint_movement')->name('add_joint_movement');
Route::post('/save_ortherapist','PWSBackendController@save_ortherapist')->name('save_ortherapist'); 
Route::get('delete_joints/{id}','PWSBackendController@delete_joints')->name('delete_joints');

//pdf report
Route::post('pdf_report', 'PWSBackendController@pdf_report')->name('pdf_report');

//=================== NURSING FORM =============================================
Route::get('/nursing_form', 'PWSNursingController@nursing_form')->name('nursing_form');
Route::get('/nursing_form_edit/{id_diagnose}', 'PWSNursingController@nursing_edit')->name('nursing_edit');
Route::get('/nursing_listing', 'PWSNursingController@nursing_list')->name('nursing_list');
Route::get('/progress_note', 'PWSNursingController@progress_note')->name('progress_note');
// Route::get('/nursing_form', 'PWSNursingController@nursing_form')->name('nursing_form');
Route::post('/find_patient_nursing','PWSNursingController@find_patient_nursing')->name('find_patient_nursing');
Route::get('/relative_nursing/{id}', 'PWSNursingController@relativeshow_nursing')->name('relativeshow_nursing');

Route::get('/listdailyreport/{id}', 'PWSNursingController@listdailyreport')->name('listdailyreport');

//=================== NURSING MODAL =============================================

Route::get('/therapist_form_edit/{id_diagnose}', 'PWSNursingController@therapist_edit')->name('therapist_edit');
Route::get('/medication_dosage/{id}', 'PWSNursingController@medication_dosage')->name('medication_dosage');
Route::get('/progress_note_details/{id}', 'PWSNursingController@progress_note_details')->name('progress_note_details');
//## ADD NURSING
//## ADD NURSING
Route::post('/add_vital_sign','PWSNursingController@add_vital_sign')->name('add_vital_sign');
Route::post('/add_intakeoutput','PWSNursingController@add_intakeoutput')->name('add_intakeoutput');
Route::post('/add_medication','PWSNursingController@add_medication')->name('add_medication');
Route::post('/add_progressnote','PWSNursingController@add_progressnote')->name('add_progressnote');
Route::post('/add_progressnotedetails','PWSNursingController@add_progressnotedetails')->name('add_progressnotedetails');
Route::post('/add_progression', 'PWSNursingController@add_progression')->name('add_progression');
Route::post('/add_dailyreport','PWSNursingController@add_dailyreport')->name('add_dailyreport');
Route::post('/add_monthlyreport','PWSNursingController@add_monthlyreport')->name('add_monthlyreport');
Route::post('/add_medication_dosage', 'PWSNursingController@add_medication_dosage')->name('add_medication_dosage');



Route::post('/save_nursing_diagnose','PWSNursingController@save_nursing_diagnose')->name('save_nursing_diagnose');
Route::get('/nursing_monthlyreport/{id}', 'PWSNursingController@nursing_monthlyreport')->name('nursing_monthlyreport');

//## EDIT NURSING
Route::get('/edit_vitalsign/{id}', 'PWSNursingController@edit_vitalsign')->name('edit_vitalsign');
Route::post('edit_vitalsign_process', 'PWSNursingController@edit_vitalsign_process')->name('edit_vitalsign_process');
Route::get('/edit_intakeoutput/{id}', 'PWSNursingController@edit_intakeoutput')->name('edit_intakeoutput');
Route::post('edit_intakeoutput_process', 'PWSNursingController@edit_intakeoutput_process')->name('edit_intakeoutput_process');
Route::get('/edit_medication/{id}', 'PWSNursingController@edit_medication')->name('edit_medication');
Route::post('edit_medication_process', 'PWSNursingController@edit_medication_process')->name('edit_medication_process');
Route::get('/edit_progressnote/{id}', 'PWSNursingController@edit_progressnote')->name('edit_progressnote');
Route::post('edit_progressnote_process', 'PWSNursingController@edit_progressnote_process')->name('edit_progressnote_process');
Route::get('/edit_progression/{id}', 'PWSNursingController@edit_progression')->name('edit_progression');
Route::post('edit_progression_process', 'PWSNursingController@edit_progression_process')->name('edit_progression_process');
Route::get('/edit_dailyreport/{id}', 'PWSNursingController@edit_dailyreport')->name('edit_dailyreport');
Route::post('edit_dailyreport_process', 'PWSNursingController@edit_dailyreport_process')->name('edit_dailyreport_process');
Route::get('/edit_monthlyreport/{id}', 'PWSNursingController@edit_monthlyreport')->name('edit_monthlyreport');
Route::post('edit_monthlyreport_process', 'PWSNursingController@edit_monthlyreport_process')->name('edit_monthlyreport_process');


//## DELETE NURSING
Route::get('delete_vitalsign/{id}','PWSNursingController@delete_vitalsign')->name('delete_vitalsign');
Route::get('delete_intakeoutput/{id}','PWSNursingController@delete_intakeoutput')->name('delete_intakeoutput');
Route::get('delete_medicationchart/{id}','PWSNursingController@delete_medicationchart')->name('delete_medicationchart');
Route::get('delete_progressnote/{id}','PWSNursingController@delete_progressnote')->name('delete_progressnote');
Route::get('delete_progression/{id}','PWSNursingController@delete_progression')->name('delete_progression');
Route::get('delete_monthlyreport/{id}','PWSNursingController@delete_monthlyreport')->name('delete_monthlyreport');
Route::get('delete_dailyreport/{id}','PWSNursingController@delete_dailyreport')->name('delete_dailyreport');

Route::get('delete_medicationroutine/{id}','PWSNursingController@delete_medicationroutine')->name('delete_medicationroutine');
Route::get('delete_progressnotedetail/{id}','PWSNursingController@delete_progressnotedetail')->name('delete_progressnotedetail');
Route::get('delete_diagnose_nursing/{id}','PWSNursingController@delete_diagnose_nursing')->name('delete_diagnose_nursing');

Route::get('/edit_patient_nursing_relative/{id}', 'PWSNursingController@edit_patient_nursing_relative')->name('edit_patient_nursing_relative');
Route::post('edit_patient_nursing_relative_process', 'PWSNursingController@edit_patient_nursing_relative_process')->name('edit_patient_nursing_relative_process');
Route::get('delete_relative_nursing/{id}', 'PWSNursingController@delete_relative_nursing')->name('delete_relative_nursing');

//=================== HQ FORM =============================================
Route::get('/hq_form', 'PWSHQController@hq_form')->name('hq_form');
Route::post('/find_patient_hq','PWSHQController@find_patient_hq')->name('find_patient_hq');
Route::get('/relativeshow/{id}', 'PWSHQController@relativeshow')->name('relativeshow');
Route::post('/add_patient_relative_hq', 'PWSHQController@add_patient_relative_hq')->name('add_patient_relative_hq');
Route::get('/edit_patient_relative_hq/{id}', 'PWSHQController@edit_patient_relative_hq')->name('edit_patient_relative_hq');
Route::post('edit_patient_relative_process_hq', 'PWSHQController@edit_patient_relative_process_hq')->name('edit_patient_relative_process_hq');
Route::get('delete_relative_hq/{id}', 'PWSHQController@delete_relative_hq')->name('delete_relative_hq');
Route::get('/hq_listing', 'PWSHQController@hq_list')->name('hq_list');
Route::get('/hq_form_edit/{id_diagnose}', 'PWSHQController@hq_edit')->name('hq_edit');
Route::get('/hq_form', 'PWSHQController@hq_form')->name('hq_form');
Route::post('/save_ortherapist_hq','PWSHQController@save_ortherapist_hq')->name('save_ortherapist_hq');

Route::post('/add_methodsoap_hq','PWSHQController@add_methodsoap_hq')->name('add_methodsoap_hq');
Route::get('delete_method_hq/{id}', 'PWSHQController@delete_method_hq')->name('delete_method_hq');
Route::post('/add_orthopaedic_hq','PWSHQController@add_orthopaedic_hq')->name('add_orthopaedic_hq');
Route::post('/add_simplereport_hq','PWSHQController@add_simplereport_hq')->name('add_simplereport_hq');
Route::get('delete_report_hq/{id}', 'PWSHQController@delete_report_hq')->name('delete_report_hq');
Route::post('/add_attendance_hq','PWSHQController@add_attendance_hq')->name('add_attendance_hq');
Route::get('delete_attendance_hq/{id}', 'PWSHQController@delete_attendance_hq')->name('delete_attendance_hq');
Route::post('/add_joint_movement_hq','PWSHQController@add_joint_movement_hq')->name('add_joint_movement_hq');
Route::get('delete_joints_hq/{id}','PWSHQController@delete_joints_hq')->name('delete_joints_hq');

Route::get('/therapist_listing', 'PWSBackendController@therapist_list')->name('therapist_list');
Route::get('/therapist_form_edit/{id_diagnose}', 'PWSBackendController@therapist_edit')->name('therapist_edit');
Route::get('/list_stafftherapist', 'PWSHQController@register_staff')->name('register_staff');
Route::get('/list_ofpatient', 'PWSBackendController@list_ofpatient')->name('list_ofpatient');
Route::get('/list_ofpatient/{id}', 'PWSBackendController@list_ofpatient')->name('list_ofpatient');

Route::get('/therapist_patient/{id}', 'PWSBackendController@therapist_patient')->name('therapist_patient');

// Route::get('/therapist_patient/{id}', 'PWSHQController@therapist_patient')->name('therapist_patient');

Route::get('/ShowSummaryReport/{id}', 'PWSBackendController@ShowSummaryReport')->name('ShowSummaryReport');

Route::get('/assign_patient', 'PWSBackendController@assign_patient')->name('assign_patient');
Route::get('/assign_patientmodal/{id}', 'PWSBackendController@assign_patientmodal')->name('assign_patientmodal');
Route::post('/submitAssignPatient', 'PWSBackendController@submitAssignPatient')->name('submitAssignPatient');
Route::post('/submitAssignStatus', 'PWSBackendController@submitAssignStatus')->name('submitAssignStatus');

//=================== Payment =============================================
Route::post('/add_payment','PWSBackendController@add_payment')->name('add_payment');
Route::post('/edit_payment','PWSBackendController@edit_payment')->name('edit_payment');
Route::get('/payment_listing','PWSPaymentController@payment_list')->name('payment_list');
Route::get('/verified_status/{id}','PWSPaymentController@verified_status')->name('verified_status');

//roaster
Route::get('/roaster', 'RoasterController@roaster')->name('roaster');
Route::get('/roaster_edit/{id}', 'RoasterController@roaster_edit')->name('roaster_edit');
Route::get('/roasterfind/{id}', 'RoasterController@roasterfind')->name('roasterfind');
Route::get('/timetableroaster', 'RoasterController@timetableroaster')->name('timetableroaster');

//calendar
 Route::get('/events', 'EventController@index')->name('testairie');
Route::get('/fullcalendareventmaster','RoasterController@index')->name('roaster_index');
Route::post('/fullcalendareventmaster/create','RoasterController@create')->name('roaster_add');
Route::post('/fullcalendareventmaster/update','RoasterController@update');
Route::post('/fullcalendareventmaster/delete','RoasterController@destroy');

//CENTER 
Route::get('/walkin_session', 'PWSCenterController@walkin_session')->name('walkin_session');
Route::get('/searchPatient','PWSCenterController@searchPatient')->name('searchPatient');

Route::get('/get_transaction_info','PWSCenterController@get_transaction_info')->name('get_transaction_info');
Route::post('/add_transaction_patient','PWSCenterController@add_transaction_patient')->name('add_transaction_patient');

Route::get('/patient_nursing', 'PWSCenterController@patient_nursing')->name('patient_nursing');
Route::get('/submitnursingpatientedit/{id}', 'PWSCenterController@submitnursingpatientedit')->name('submitnursingpatientedit');
Route::post('/submitnursingpatientedit_process', 'PWSCenterController@submitnursingpatientedit_process')->name('submitnursingpatientedit_process');

Route::post('/add_walkin_patient','PWSCenterController@add_walkin_patient')->name('add_walkin_patient');
Route::get('/edit_walkin_patient/{id}','PWSCenterController@edit_walkin_patient')->name('edit_walkin_patient');
Route::post('/edit_walkin_patient_process','PWSCenterController@edit_walkin_patient_process')->name('edit_walkin_patient_process');

Route::post('/add_house_call','PWSCenterController@add_house_call')->name('add_house_call');
Route::get('/edit_housecall_patient/{id}','PWSCenterController@edit_housecall_patient')->name('edit_housecall_patient');
Route::post('/edit_housecall_patient_process','PWSCenterController@edit_housecall_patient_process')->name('edit_housecall_patient_process');

Route::post('/add_session_patient','PWSCenterController@add_session_patient')->name('add_session_patient');
Route::get('/edit_session_patient/{id}','PWSCenterController@edit_session_patient')->name('edit_session_patient');
Route::post('/edit_session_patient_process','PWSCenterController@edit_session_patient_process')->name('edit_session_patient_process');

Route::post('/add_session_attendant_patient','PWSCenterController@add_session_attendant_patient')->name('add_session_attendant_patient');
Route::get('/ViewSummaryReportSession/{id}', 'PWSCenterController@ViewSummaryReportSession')->name('ViewSummaryReportSession');
Route::get('/patientInfo/{id}','PWSCenterController@patientInfo')->name('patientInfo');
Route::post('/update_price', 'PWSCenterController@update_price')->name('update_price');
Route::get('/get_price/{id}','PWSCenterController@get_price')->name('get_price');
Route::post('/update_status', 'PWSCenterController@update_status')->name('update_status');
Route::get('/get_status/{id}','PWSCenterController@get_status')->name('get_status');
Route::post('/update_verified', 'PWSCenterController@update_verified')->name('update_verified');
Route::post('/update_price_walkin','PWSCenterController@update_price_walkin')->name('update_price_walkin');
Route::get('/edit_summary_report/{id}','PWSBackendController@edit_summary_report')->name('edit_summary_report');
Route::post('/edit_summary_rep_process','PWSBackendController@edit_summary_rep_process')->name('edit_summary_rep_process');


//report
Route::get('/patientreport_daily','PWSReportController@patientreport_daily')->name('patientreport_daily');
Route::post('/previewreport_daily','PWSReportController@previewreport_daily')->name('previewreport_daily');
Route::post('/previewtimetable','PWSReportController@previewtimetable')->name('previewtimetable');
Route::get('/getdataTypeSession','PWSReportController@getdataTypeSession')->name('getdataTypeSession');
Route::get('/patientreport_monthly','PWSReportController@patientreport_monthly')->name('patientreport_monthly');
Route::post('/previewreport_monthly','PWSReportController@previewreport_monthly')->name('previewreport_monthly');
Route::get('/patientreport_yearly','PWSReportController@patientreport_yearly')->name('patientreport_yearly');
Route::post('/previewreport_yearly','PWSReportController@previewreport_yearly')->name('previewreport_yearly');
Route::post('/printreceipt','PWSReportController@printreceipt')->name('printreceipt');


