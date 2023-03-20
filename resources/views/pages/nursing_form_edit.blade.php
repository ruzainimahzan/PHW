@extends('layouts.default')
@section('content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Nursing
                    <small>Form (EDIT RECORD)</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Patient List</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row" class="">
                    <!-- Left col -->
                    <div class="col-sm-10 col-sm-push-1">


                        <section class="col-lg-12">
                            <br/>
                            
                            <form class="form-horizontal" id="patient_form" method="post"> 
                                <div class="box-body">
                                    <div class="col-sm-6 form-group">
                                     <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                     <label class="col-sm-2 control-label">Name</label>
                                     <div class="col-sm-10">
                                        <input type="text" class="form-control" id="patient-name" name="fullname_patients" value=" @if($detailspatient != null){{$detailspatient->fullname_patients}}@endif" readonly="readonly"> 
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="col-sm-2 control-label">Age</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="patient-diagnose" readonly="readonly" value=" @if($detailspatient != null){{$detailspatient->age}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="col-sm-2 control-label">Diagnose</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="patient-diagnose" readonly="readonly" value=" @if($detailspatient != null){{$detailspatient->doctor_diagnose}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="col-sm-2 control-label">Gender</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="patient-session" value=" @if($detailspatient != null){{$detailspatient->gender}}@endif" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <!-- <li <a href="#nursing-vitalsign" data-toggle="tab">VITAL SIGN FORM</a></li>
                <li><a href="#nursing-intakeoutput" data-toggle="tab">INTAKE-OUTPUT CHART</a></li>
                <li><a href="#nursing-medication" data-toggle="tab">MEDICATION CHART</a></li>
                <li><a href="#nursing-progressnote" data-toggle="tab">PROGRESS NOTE</a></li> -->
                <!-- <li ><a href="#nursing-dailyreport" data-toggle="tab">DAILY REPORT</a></li> -->
                <li class="active"><a href="#nursing-monthlyreport" data-toggle="tab">MONTHLY SUMMARY REPORT</a></li>
                <li><a href="#nursing-assessment" data-toggle="tab">NURSING ASSESSMENT FORM</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="nursing-dailyreport">
                    <div class="box box-primary">
                        <div class="box-body">
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#adddailyreport">Add Daily Report</button><br></br>
                            <table id="table_nursing_daily_report" class="table table-bordered table-striped display nowrap display nowrap">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Remarks</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( $dailyreport != null )
                                    @foreach( $dailyreport as $list )
                                    <tr>
                                        <td>{{ date("d-m-Y",strtotime($list->msr_date)) }}</td>
                                        <td>{{ $list->msr_remarks_report }}</td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-info btn-sm open-editdailyreport" data-toggle="modaledit" data-userid="{{ $detailspatient->id_patients }}">Edit</a> -->
                                            <a href="#" data-id="{{ $list->id_summary_report }}" class="dailyreport-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                            @if($detailspatient != null)
                                            <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;padding-right: 20px;">
                                                @csrf
                                                <span>
                                                    <input type="hidden" name="pdf_id_diagnose" id="pdf_id_diagnose" value="{{ $list->id_summary_report }}">
                                                    <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                                    <input type="hidden" name="type_report" id="type_report" value="nursing_daily_report">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                                </span>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form method="post" action="{{URL::route('add_dailyreport')}}" id="form">
                        @csrf
                        <div class="modal fade" id="adddailyreport" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" 
                                        id="favoritesModalLabel"><b>Add Daily Report</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="msr_date_daily_nursing" id="msr_date_daily_nursing" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Remark</label>
                                            <textarea type="text" class="form-control" id="msr_remarks_daily_report" name="msr_remarks_daily_report" style="height:250px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                                        <span class="pull-right">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="post" action="{{URL::route('edit_dailyreport_process')}}" id="form">
                    @csrf
                        <div class="modal fade" id="editdailyreport" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" 
                                        id="favoritesModalLabel"><b>Add Daily Report</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="msr_date_daily_nursing" id="msr_date_daily_nursing" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Remark</label>
                                            <textarea type="text" class="form-control" id="msr_remarks_daily_report" name="msr_remarks_daily_report" style="height:250px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                                        <span class="pull-right">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane " id="nursing-assessment">
                    <div class="box box-primary">
                        <div class="box-body">
                            <button type="button" style="visibility:hidden;" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addprogression">Add Assessment</button><br></br>
                            <table id="table-assessment" class="table table-bordered table-striped display nowrap display nowrap">
                                <thead>
                                    <tr>
                                        <th><b>Date</b></th>
                                        <th><b>Month<b></th>
                                        <th><b>Remarks</b></th>
                                        <th><b>Staff In-Charge</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( $progression != null )
                                        @foreach( $progression as $assessment )
                                        <tr>
                                            <td>{{ date("d-m-Y",strtotime($assessment->date_assessment)) }}</td>
                                            <td>{{ $assessment->month }}</td>
                                            <td>{{ $assessment->remarks }}</td>
                                            <td>@if($assessment ->staff_no != null){{ $assessment->fullname.' '.$assessment->lastname.' ('.$assessment->staff_no.')' }}@endif </td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm open-editprogression" data-toggle="modaledit" data-userid="{{ $assessment->id_assessment_report }}">Edit</a>
                                                <!-- <a href="#" data-id="{{ $assessment->id_assessment_report }}" class="progression-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a> -->
                                                @if($detailspatient != null)
                                                <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;padding-right: 20px;">
                                                    @csrf
                                                    <span>
                                                        <input type="hidden" name="pdf_id_diagnose" id="pdf_id_diagnose" value="{{ $assessment->id_assessment_report }}">
                                                        <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                                        <input type="hidden" name="type_report" id="type_report" value="nursing_assessment_report">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                                    </span>
                                                </form>
                                                @endif
                                            
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <form method="post" action="{{URL::route('add_progression')}}" id="form">
                            @csrf
                            <div class="modal fade" id="addprogression" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <input type="hidden" name="user_id" id="user_id" value="">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" 
                                            id="favoritesModalLabel"><b>Add Assessment</b></h4>
                                        </div>
                                        <div class="modal-body">
                                        <div class="form-group">
                                        <center>
                                        <img src="{{ URL::asset('images/body.jpg') }}" alt="Smiley face" height="150" width="150">
                                        </center>
                                        </div>
                                        <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                        <div class="col-sm-6 form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="date_progression" id="date_progression" readonly="readonly">
                                            </div>
                                        </div>
                                        <div>
                                            <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                        </div>
                                           <!-- <div class="form-group">
                                                <label>Problem Disease</label>
                                                <input type="text" class="form-control" id="progression_problem_disease" name="progression_problem_disease" value="">
                                            </div> -->
                                        <div class="col-sm-6 form-group">
                                            <label>Month</label>
                                            <div>
                                                <select class="form-control" name="msr_month_assessment" id="msr_month_assessment" >
                                                    <option value="">Select</option>
                                                    <option value="January">January</option>
                                                    <option value="February" >February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May" >May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August" >August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <center>
                                                <img style="height: 8cm;width: 8cm;margin-top: 10px;" src="{{ public_path('images/body.jpg') }}" />
                                            </center>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label >Remarks</label>
                                            <textarea type="text" class="form-control" id="progression_remarks" name="progression_remarks" style="height:250px;"></textarea>
                                        </div>
                                        
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                                            <span class="pull-right">
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="post" action="{{URL::route('edit_progression_process')}}" id="form">
                            @csrf
                            <div class="modal fade" id="editprogression" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" 
                                            id="favoritesModalLabel"><b>Edit Assessment</b></h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" id="user_id" value="">
                                            <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                        <div class="col-sm-6 form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="date_progression" id="date_progression" readonly="readonly">
                                            </div>
                                        </div>
                                        <div>
                                            <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                        
                                        </div>
                                           <!-- <div class="form-group">
                                                <label>Problem Disease</label>
                                                <input type="text" class="form-control" id="progression_problem_disease" name="progression_problem_disease" value="">
                                            </div> -->
                                        <div class="col-sm-6 form-group">
                                            <label>Month</label>
                                            <div>
                                                <select class="form-control" name="msr_month_assessment" id="msr_month_assessment" >
                                                    <option value="">Select</option>
                                                    <option value="January">January</option>
                                                    <option value="February" >February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May" >May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August" >August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <center>
                                            <img src="{{ URL::asset('images/body.jpg') }}" alt="Smiley face" height="300px" width="300px">
                                            </center>
                                        </div>
                                       
                                        <div class="col-sm-12 form-group">
                                            <label >Remarks</label>
                                            <textarea type="text" class="form-control" id="progression_remarks" name="progression_remarks" style="height:250px;"></textarea>
                                        </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                                            <span class="pull-right">
                                                <input type="submit" class="btn btn-primary" value="Submit">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane active" id="nursing-monthlyreport">
                        <div class="box box-primary">
                            <div class="box-body">
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addmonthlyreport">Add Monthly Report</button><br></br>
                                <table id="table-monthly" class="table table-bordered table-striped display nowrap display nowrap">
                                    <thead>
                                        <tr>
                                            <th><b>Date</b></th>
                                            <th><b>Month<b></th>
                                            <th><b>Remarks</b></th>
                                            <th><b>Staff In-Charge</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if( $monthlyreport != null )
                                        @foreach( $monthlyreport as $listmonth )
                                        <tr>
                                            <td>{{ date("d-m-Y",strtotime($listmonth->date_monthly_report)) }}</td>
                                            <td>{{ $listmonth->month }}</td>
                                            <td>{{ $listmonth->remarks }}</td>
                                            <td>@if($listmonth ->staff_no != null){{ $listmonth->fullname.' '.$listmonth->lastname.' ('.$listmonth->staff_no.')' }}@endif </td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm open-editMonthlyReport" data-toggle="modaledit" data-userid="{{ $listmonth->id_monthly_report }}">Edit</a>
                                                <a class="btn btn-primary btn-sm" href="{{ url('/listdailyreport/' . $listmonth->id_monthly_report) }}" data-userid="{{ $listmonth->id_monthly_report }}">Daily Report<a>
                                                <!-- <a href="#" data-id="{{ $listmonth->id_monthly_report }}" class="monthlyreport-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a> -->
                                            
                                               @if($detailspatient != null)
                                                <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;">
                                                    @csrf
                                                    <span>
                                                        <input type="hidden" name="pdf_id_diagnose" id="pdf_id_diagnose" value="{{ $listmonth->id_monthly_report }}">
                                                        <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                                        <input type="hidden" name="type_report" id="type_report" value="nursing_monthly_report">
                                                        <button type="hidden" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                                    </span>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <form method="post" action="{{URL::route('add_monthlyreport')}}" id="form">
                        @csrf
                        <div class="modal fade" id="addmonthlyreport" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" 
                                        id="favoritesModalLabel"><b>Add Monthly Report</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                        <div class="col-sm-6 form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="msr_date_monthly_nursing" id="msr_date_monthly_nursing" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <!--    <label >Oral Fluids</label>
                                            <input type="text" class="form-control" id="io_oral_fluids" name="io_oral_fluids"> -->
                                            <label >Month</label>
                                            <select class="form-control" name="msr_month" id="msr_month" >
                                                <option value="">Select</option>
                                                <option value="January">January</option>
                                                <option value="February" >February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May" >May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August" >August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label >Remark</label>
                                            <textarea type="text" class="form-control" id="msr_remarks_report" name="msr_remarks_report" style="height:250px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                                        <span class="pull-right">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="post" action="{{URL::route('edit_monthlyreport_process')}}" id="form">
                        @csrf
                        <div class="modal fade" id="editMonthlyReport" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" 
                                        id="favoritesModalLabel"><b>Edit Monthly Report</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" id="user_id" value="">
                                        <input type="hidden" name="id_diagnose" id="id_diagnose" value="@if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                        <div class="col-sm-6 form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="msr_date_monthly_nursing" id="msr_date_monthly_nursing" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label >Month</label>
                                            <select class="form-control" name="msr_month" id="msr_month" >
                                                <option value="">Select</option>
                                                <option value="January">January</option>
                                                <option value="February" >February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May" >May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August" >August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label >Remark</label>
                                            <textarea type="text" class="form-control" id="msr_remarks_report" name="msr_remarks_report" style="height:250px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                                        <span class="pull-right">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div>
</section>
</div>
</section>
</div>

@if( session()->has('TherapistError') )
<script>
    swal.fire({
        title: "{{ session()->get('TherapistError') }}",
        button:"Ok"
    });
</script>
@endif
@if( session()->has('SuccessDailyReport') )
<script>
    swal.fire({
        title: "{{ session()->get('SuccessDailyReport') }}",
        button:"Ok"
    });
</script>
@endif
@if( session()->has('SuccessMonthlyReport') )
<script>
    swal.fire({
        title: "{{ session()->get('SuccessMonthlyReport') }}",
        button:"Ok"
    });
</script>
@endif
@if( session()->has('SuccessProgressionReport') )
<script>
    swal.fire({
        title: "{{ session()->get('SuccessProgressionReport') }}",
        button:"Ok"
    });
</script>
@endif

@stop


