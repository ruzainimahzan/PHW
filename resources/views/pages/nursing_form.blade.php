

@extends('layouts.default')
@section('content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Nursing
                    <small>Form (NEW RECORD)</small>
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
                            <form class="form-horizontal" id="find_patient_form" method="post" action="{{URL::route('find_patient_nursing')}}"> 
                                @csrf
                                <div class="row">
                                 <div class="col-md-12 form-group">
                                    <label class="col-md-4 control-label" >Keywords(IC)</label>
                                    <div class="col-md-3" >
                                        <input type="text" class="form-control" id="ic_patients" name="ic_patients">
                                    </div>
                                    <div class="col-md-2">
                                      <input type="submit" name="submit" class="form-control btn btn-primary" value="Find">
                                  </div>
                              </div>
                          </div>
                      </form>
                      <form class="form-horizontal" id="patient_form" method="post" action="{{URL::route('save_nursing_diagnose')}}"> 
                        @csrf
                        <div class="box-body">
                            <center>
                                <div>
                                    <input type="hidden" class="form-control" id="id_patients" name="id_patients" value=" @if($detailspatient != null){{$detailspatient->id_patients}}@endif" readonly="readonly">
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="col-sm-4 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="patient-name" name="fullname_patients" value=" @if($detailspatient != null){{$detailspatient->fullname_patients}}@endif" readonly="readonly"> 
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="col-sm-4 control-label">Age</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="patient-age" readonly="readonly" value=" @if($detailspatient != null){{$detailspatient->age}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="col-sm-4 control-label">Diagnose</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="patient_diagnose" name="patient_diagnose">
                                    </div>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <input type="submit" class="btn btn-primary btn-md" name="submit" value="SUBMIT">
                                <div>


                                </center>
                            <!-- <div class="col-sm-6 form-group">
                                <label class="col-sm-4 control-label">Gender</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="patient-session" value=" @if($detailspatient != null){{$detailspatient->gender}}@endif" readonly="readonly">
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-6 form-group">
                                <label class="col-sm-4 control-label">Nursing Package</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="patient_package" id="patient_package" value = "">
                                        @foreach($package as $item)
                                          <option value="{{$item->id_package}}">{{$item->name_package}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-6 form-group">
                                <label class="col-sm-4 control-label">Amount (RM)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="patient_amount" name="patient_amount" value="">
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-6 form-group">
                                <label class="col-sm-4 control-label">Total Session (Hour)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="patient_session" name="patient_session" value="">
                                </div>
                            </div> -->
                            <!-- Added 20200129 -->
                            <!-- <div class="col-sm-6 form-group">
                                <label class="col-sm-4 control-label">Nurse Name</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="nurse_staff_id" id="nurse_staff_id">
                                        @foreach($nursinglist as $staff)
                                        <option value="{{ $staff->staff_no}}">{{$staff->staff_no. ' - ' .$staff->fullname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->


                        </div>
                        <div style="margin-left: 420px">
                            <!-- <input type="submit" class="btn btn-primary btn-md" name="submit" value="SUBMIT"> -->
                        </div>
                        
                    </form>
                    
                </section>
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

@if( session()->has('RegistrationError') )
    <script>
        Swal.fire
            ({
              type: 'error',
              title: 'Oops...',
              text: 'User Not Found!',
            });
    </script>
@endif

@stop

