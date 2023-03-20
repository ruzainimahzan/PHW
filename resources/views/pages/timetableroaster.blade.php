@extends('layouts.default')
@section('content') 
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Roster Report
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Timetable Roster</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                    <div class="box-body">
                    <div class="row">
                       
                            
                                <form method="post" action="{{URL::route('previewtimetable')}}">
                                    {{ csrf_field() }}
                                    <div class="col-md-2">
                                        <label>Start Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker_report" name="start" id="start" readonly="readonly"> 
                                  
                                            </div>
                                  
                                    </div>

                                    <div class="col-md-2">
                                        <label>End Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker_report" name="end" id="end" readonly="readonly"> 
                                  
                                            </div>
                                  
                                    </div>

                                    <div class="col-md-4">
                                        <label></label>
                                            <div class="input-group date">
                                                
                                           
                                            <button class="btn btn-primary"  style="margin-top:6px;"><i class="fa fa-search" ></i>&nbsp;Submit</button>&nbsp;&nbsp;
                                     
                                            
  
                                    </div>

                                    
                                    </form>
                              
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