@extends('layouts.default')
@section('content') 
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Daily Report
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Daily Report</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                    <div class="box-body">
                    <div class="row">
                       
                            
                            <form id="form_submit_button1">
                                    <div class="col-md-2">
                                        <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker_report" name="dailydate" id="dailydate" readonly="readonly"> 
                                  
                                            </div>
                                  
                                    </div>

                                    <div class="col-md-4">
                                        <label></label>
                                            <div class="input-group date">
                                                
                                            <!-- <input type="submit" class="btn btn-primary pull-left" value="Submit" style="margin-top:6px;">&nbsp;&nbsp; -->
                                            <!-- <a href class="btn btn-primary searchdaily" id="form_submit_button" style="margin-top:6px;" onclick="dailydate(document.getElementById('dailydate').value)"><i class="fa fa-search" ></i>&nbsp;Submit</a> -->
                                            <button class="btn btn-primary" id="form_submit_button" style="margin-top:6px;"><i class="fa fa-search" ></i>&nbsp;Submit</button>&nbsp;&nbsp;
                                            </form>
                                            <form method="post" action="{{URL::route('previewreport_daily')}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="dailydatePDF" id="dailydatePDF">
                                            <button class="btn btn-success" id="dailyPDF" style="margin-top: -58px;margin-left: 110px;"><i class="fa fa-download"></i>&nbsp;Export to PDF</button>
                                           </form>
  
                                    </div>

                                    
                
                              
                            </div>
                    

                                
                            
                            
                      
                    </div>
                    <BR>
                    <div class="row">
                        <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped display nowrap display nowrap display nowrap dt-responsive dailydatatable" cellspacing="0">
                            <thead>
                    
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Name Patient</th>
                                <th>IC Patient</th>
                                <th>Phone No</th>
                                <th>Diagnose</th>
                                <th>Treatment</th>
                                <th>Price(RM)</th>
                            </tr>
                            </thead>
                            <tbody>
                          
                            </tbody>
                        </table>

                        </div>

                     

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</body>

@if( session()->has('ReportDailyError') )
<script>
swal.fire({
    title: "{{ session()->get('TherapistError') }}",
    button:"Ok"
});
</script>
@endif


@stop