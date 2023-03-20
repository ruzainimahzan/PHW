
@extends('layouts.default')
@section('content')
@inject('Helpers','App\Helpers\Helper') 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Assign Patient
          <small>Therapist</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Assign Patient</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row" class="">
          <!-- Left col -->
          <div class="col-md-12">

            <section class="col-lg-12 connectedSortable">
              <br/>
              <br/>
              <div class="box">
              <div class="box-header">
                <h3 class="box-title">List Staff</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <br>
                <table id="example1" class="table table-bordered table-striped display nowrap display nowrap display nowrap">
                  <thead>
                    <tr>
                      <th hidden="true">Date</th>
                      <th>MRN No</th>
                      <th>Patient Name</th>
                      <th>Diagnose</th>
                      <th>Handle By</th>
                      <th>Session Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($patientlist as $key=> $lp)
                    <tr>
                      <td hidden="true">{{ date('d-m-Y', strtotime($lp->diag_created)) }}</td>
                      <td>{{ $lp->mrn_no}}</td>
                      <td>{{ $lp->fullname_patients. ' '. $lp->lastname_patients }}</td>
                      <td>{{ $lp->doctor_diagnose}}</td>                 
                      <td>{{ $lp->id_staff. ' - ' .$lp->fullname}}</td>
                      <td>{{ $lp->name}}</td>
                      <td>{!! $Helpers->statusPatient($lp->task_status) !!}</td>
                      <td>
                        <center>
                        @if($lp->task_status == 1)
                          <a href="{{ route('therapist_edit', $lp->id_diagnose)}}" class="btn btn-success">Proceed</a>
                          @endif
                          <!-- <a href="#"  data-toggle="modaledit"  class="btn btn-info btn-sm open-editSummaryRep"><i class="fa fa-edit"></i></a> -->
                          <a href="#" class="btn btn-info btn-sm open-assignstatus" data-toggle="modaledit" data-username="{{ $lp->fullname_patients. ' '. $lp->lastname_patients }}" data-userid="{{ $lp->id_assigned }}">Update Status</i></a>
                          <!-- <a href="#" class="btn btn-info btn-sm open-assignpatient" data-toggle="modaledit" data-userid="{{ $lp->id_patients }}">Assign Patient</i></a> -->
                          <a href="#" class="btn btn-info btn-sm open-assignpatient" data-toggle="modaledit" data-userid="{{ $lp->id_patients }}" data-treatmentid="{{ $lp->id_treatment }}">Assign Patient</i></a>
                        </center>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>MRN No</th>
                      <th>Patient Name</th>
                      <th>Handle By</th>
                      <th>Session Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </section>
        </div>
      </section>

    </div>
    <form method="post" action="{{URL::route('submitAssignPatient')}}" id="form">
      @csrf
      <div class="modal fade" id="modalassignpatient" 
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
            id="favoritesModalLabel">Assign Patient</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="user_id" id="user_id">
            <input type="hidden" name="user_treatmentid" id="user_treatmentid">
            <div class="form-group">
              <label for="exampleInputEmail1">MRN No</label>
              <input type="text" class="form-control" name="mrn_no" id="mrn_no" placeholder="" readonly="readonly">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Patient Name</label>
              <input type="text" class="form-control" name="patient_name" id="patient_name" placeholder="" readonly="readonly">
            </div>
            <div class="form-group">
              <label>Therapist Name</label>
              <select type="text" class="form-control select2" name="staff_id">
                @foreach($therapistlist as $staff)
                <option value="{{ $staff->staff_no}}">{{$staff->staff_no. ' - ' .$staff->fullname}}</option>
                @endforeach
              </select>
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

  <form method="post" action="{{URL::route('submitAssignStatus')}}" id="formstatus">
      @csrf
      <div class="modal fade" id="modalassignstatus">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" 
            data-dismiss="modal" 
            aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" >Assign Status</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="user_idstat" id="user_idstat">
            <div class="form-group">
              <label>Patient Name</label>
              <input type="text" class="form-control" name="patient_name_status" id="patient_name_status" placeholder="" readonly="readonly">
            </div>
            <div class="form-group">
              <label>Therapist Name</label>
              <select type="text" class="form-control" name="staff_status">
                <option value="0">Pending</option>
                <option value="1">Accept</option>
                <option value="2">Reject</option>
              </select>
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


  @if( session()->has('RegistrationSuccess') )
  <script>
  swal.fire({
    title: "{{ session()->get('RegistrationSuccess') }}",
    button:"Ok"
  });
  </script>
  @endif

  @if( session()->has('RegistrationError') )
  <script>
  swal.fire({
    title: "{{ session()->get('RegistrationError') }}",
    button:"Ok"
  });
  </script>
  @endif

@stop

