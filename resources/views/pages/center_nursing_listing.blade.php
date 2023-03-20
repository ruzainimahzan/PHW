@extends('layouts.default')
@section('content')

<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Patient List
          <small>Nurse</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li class="active"><i class="fa fa-user-plus"></i> Patient's Listing</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row" class="">
          <div class="col-md-12">
           <div class="col-md-3 ">
            <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addpatient">
             Add Patient
           </button> -->
         </div>
         <section class="col-lg-12 connectedSortable">
           <br/>
           <br/>
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Patient's List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped display nowrap display nowrap display nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>IC Number</th>
                    <th>Phone Number</th>
                    <th>Diagnose</th>
                    <th>Total Hours</th>
                    <th>Total Price</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listpatientnursing as $key=> $lp)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{ $lp->fullname_patients }}</td>
                    <td>{{ $lp->ic_patients }}</td>
                    <td>{{ $lp->phone_number }}</td>
                    <td>{{ $lp->doctor_diagnose }}</td>
                    <td></td>
                    <td></td>
                    <td>
                      <center>
                        <a href="#" class="btn btn-info btn-sm open-editnursingpatient" data-toggle="modaledit" data-userid="{{ $lp->id_diagnose }}">Edit Patient</a>
                     </center>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
      <form method="post" action="{{URL::route('submitnursingpatientedit_process')}}" id="form">
      @csrf
        <div class="modal fade" id="editnursingpatient" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" 
                  id="favoritesModalLabel"><b>Edit Nursing's Patient</b></h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Patient Name</label>
                  <input type="text" class="form-control" name="pt_name" id="pt_name" readonly="true">
                </div>
                <div class="form-group">
                  <label>Patient IC</label>
                  <input type="text" class="form-control" name="pt_ic" id="pt_ic" readonly="true">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone Number</label>
                  <input type="text" class="form-control" name="pt_phone_no" id="pt_phone_no" readonly="true">
                </div>
                <div class="form-group">
                  <label>Diagnose</label>
                  <input type="text" class="form-control" name="pt_diagnose" id="pt_diagnose" readonly="true">
                </div>
                <div class="form-group">
                  <label>Total Hours</label>
                  <input type="text" class="form-control" name="pt_total_hours" id="pt_total_hours" readonly="true">
                </div>
                <div class="form-group">
                  <label>Total Price(RM)</label>
                  <input type="text" class="form-control" name="pt_total_price" id="pt_total_price" autocomplete="off">
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
    </section>
  </div>


@endsection