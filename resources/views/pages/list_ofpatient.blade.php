@extends('layouts.default')
@section('content') 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
           Patient Attendance
          <small>List</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li class="active"><i class="fa fa-clock-o"></i> List Attendance </li>
        </ol>
      </section>
      <!-- Main content -->
               
      <section class="content">

        <div class="row" class="">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- <div class="col-md-3">
                <a href="{{ url('register_patient') }}" type="button" class="btn btn-primary btn-md">
                 List Patient
               </a>
               <a href="{{ url('therapist_form') }}" class="btn btn-primary btn-md">
               Add Diagnose</a>
          </div> -->

         

         <section class="col-lg-12 connectedSortable">
           <br/>
           <br/>
           <div class="box">
            <div class="box-header">
              <div class="row">
                
                <div class="col-sm-2">
             Date <input type="text" class="form-control datepicker" name="msr_date" id="msr_date" readonly="readonly">
            </div>
            </div>
          </div>  
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped display nowrap display nowrap display nowrap dt-responsive" cellspacing="0">
                <thead>
                  <tr>
                    <th>Attendance</th>
                    <th>ID Patient</th>
                    <th>Patient Name</th>
                    <th>IC Patient</th>
                    <th>Diagnose</th>
                    <th>Summary Report</th>

                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($patientlist as $key=> $tl)
                  <tr>
                    <td>{{ date('d-m-Y', strtotime($tl->date_treatment)) }}</td>
                    <td>{{ $tl->mrn_no }}</td>
                    <td>{{ $tl->fullname_patients }}</td>
                    <td>{{ $tl->ic_patients }}</td>
                    <td>{{ $tl->doctor_diagnose }}</td>
                    <td>
                     
                        <a href="#" class="btn btn-info btn-sm open-ViewSummaryReport" data-toggle="modaledit" data-userid="{{ $tl->id_treatment }}">VIEW</a>
                        <!-- <a href="#" data-id="{{ $tl->id_diagnose }}" class="nursinglist-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a> -->
                    
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>


        </section>

      </div>

    </section>

  </div>
  <form method="post" action="{{URL::route('add_patient')}}" id="form">
    @csrf
    <div class="modal fade" id="addpatient" 
    tabindex="-1" role="dialog" 
    aria-labelledby="addstaffLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" 
          id="favoritesModalLabel"><b>Add Patient's Information</b></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="user_id" id="user_id" value>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter First Name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Last name</label>
            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">IC Number</label>
            <input type="text" class="form-control" name="icnum" id="icnum"  placeholder="Enter IC Number">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Age</label>
            <input type="text" class="form-control" name="age" id="age"  placeholder="Enter Age">
          </div>
          <div class="form-group">
            <label >Gender</label>
              <select class="form-control" name="gender" id="gender" >
                  <option value="">Select</option>
                  <option value="Male">Male</option>
                  <option value="Female" >Female</option>
              </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" class="form-control" name="phonenum" id="phonenum"  placeholder="Enter Phone Number">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <textarea type="text" class="form-control" name="address" id="address"  placeholder="Enter address"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" 
          class="btn btn-default" 
          data-dismiss="modal">Close</button>&nbsp;
          <span class="pull-right">
            <input type="submit" class="btn btn-primary" value="Submit">

          </span>
        </div>
      </div>

    </div>
  </div>
</form>
<form method="post" action="{{URL::route('add_patient')}}" id="reportform">
            @csrf
            <div class="modal fade" id="viewsimplereport" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="favoritesModalLabel"><b>Summary Report</b></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="user_id" id="user_id" value>
                            <div class="form-group">
                                <label>Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="reportdate" id="reportdate" readonly="readonly" disabled="true" >
                                    <!-- <input type="datetime-local" class="form-control pull-right datepicker" name="reportdate" id="reportdate" dateformat="" disabled="true" readonly="readonly"> -->

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Report</label>
                                <form>
                                    <textarea class="text" name="reportdescription" disabled="true" id="reportdescription" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                        </div>
                    </div>
                </div>

            </div>
        </form>
@stop