
@extends('layouts.default')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Report
            <small>Daily</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ url('nursing_form_edit',$monthlyreport->id_diagnose) }}"><i class="fa fa-dashboard"></i> Monthly Report</a></li>
                <li class="active">Daily Report</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row" class="">
            <!-- Left col -->
            <div class="col-md-12">
            
            <section class="col-lg-12">
            <br/>
            <br/>
            <div class="box">
                <div class="box-header">
                <div class="row">
                    <div class="col-sm-6">
                    <h3 class="box-title">Daily Report (<b>Month: {{$monthlyreport->month}}</b>)</h3>
                    </div>
                    <div class="col-sm-6" style="text-align: end;">
                    
                </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <br>
                    <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($monthlyreport != null){{$monthlyreport->id_diagnose}}@endif">
                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#adddailyreport">Add Daily Report</button><br></br>
                    <table id="table-dailyreport" class="table table-bordered table-striped display nowrap display nowrap">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Remarks</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyreport as $key=> $dailyreport)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($dailyreport->date_daily_report))}}</td>
                                    <td>{{$dailyreport->remarks}}</td>
                                    <td>@if($dailyreport ->staff_no != null){{ $dailyreport->fullname.' '.$dailyreport->lastname.' ('.$dailyreport->staff_no.')' }}@endif </td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm open-editDailyReport" data-toggle="modaledit" data-userid="{{ $dailyreport->id_daily_report }}">Edit Daily Report</a>
                                        <a href="#" data-id="{{ $dailyreport->id_daily_report }}" class="dailyreport-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                             

                                        @if($monthlyreport != null)
                                        <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;padding-right: 20px;">
                                            @csrf
                                            <span>
                                                <input type="hidden" name="pdf_id_diagnose" id="pdf_id_diagnose" value="{{ $dailyreport->id_daily_report }}">
                                                <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($monthlyreport != null){{$monthlyreport->id_patients}}@endif">
                                                <input type="hidden" name="type_report" id="type_report" value="nursing_daily_report">
                                                <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                            </span>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            </section>
            <form method="post" action="{{URL::route('add_dailyreport')}}" id="form">
                @csrf
                <div class="modal fade" id="adddailyreport" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($monthlyreport != null){{$monthlyreport->id_diagnose}}@endif">
                            <input type="hidden" name="id_monthly" id="id_monthly" value=" @if($monthlyreport != null){{$monthlyreport->id_monthly_report}}@endif">
                            <input type="hidden" name="user_id" id="user_id" value="">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" 
                                id="favoritesModalLabel"><b>Add Daily Report</b></h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_monthly" id="id_monthly" value=" @if($monthlyreport != null){{$monthlyreport->id_monthly_report}}@endif">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" name="date_daily_report" id="date_daily_report" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label >Remark</label>
                                    <textarea type="text" class="form-control" id="remarks" name="remarks" style="height:250px;"></textarea>
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
                            <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($monthlyreport != null){{$monthlyreport->id_diagnose}}@endif">
                            <input type="hidden" name="id_monthly" id="id_monthly" value=" @if($monthlyreport != null){{$monthlyreport->id_monthly_report}}@endif">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" 
                                id="favoritesModalLabel"><b>Add Daily Report</b></h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="user_id" id="user_id" value="">
                                <input type="hidden" name="id_monthly" id="id_monthly" value=" @if($monthlyreport != null){{$monthlyreport->id_monthly_report}}@endif">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" name="date_daily_report" id="date_daily_report" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label >Remark</label>
                                    <textarea type="text" class="form-control" id="remarks" name="remarks" style="height:250px;"></textarea>
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

        </section>

    </div>
   
  
@stop
 

