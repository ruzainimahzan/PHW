
@extends('layouts.default')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Relative
          <small>Patience</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('register_patient') }}"><i class="fa fa-dashboard"></i> Patients List</a></li>
          <li class="active">Relative List</li>
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
                  <h3 class="box-title">Relative List (<b>{{$patient->fullname_patients}}</b>)</h3>
                </div>
                <div class="col-sm-6" style="text-align: end;">
                 
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <br>

              <table id="table-patient" class="table table-bordered table-striped display nowrap display nowrap">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Full Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($listrelative as $key=> $lp)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$lp->fullname_relatives}}</td>
                    <td>{{$lp->lastname_relatives}}</td>
                    <td>{{$lp->phone_no_relatives}}</td>
                    <td>
                      <a href="#" class="btn btn-info btn-sm open-editrelative" data-toggle="modaledit" data-userid="{{ $lp->id_rel_patients }}"><i class="fa fa-edit"></i></a>
                       <a href="#" data-id="{{$lp->id_rel_patients}}" class="relative-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


        </section>

      </div>

    </section>

  </div>
  <form method="post" action="{{URL::route('edit_patient_relative_process')}}" id="form">
    @csrf
    <div class="modal fade" id="editrelative" tabindex="-1" role="dialog" aria-labelledby="addrelativeLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" 
          id="favoritesModalLabel"><b>Edit Relative's Information</b></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="user_id" id="user_id" value>
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control" name="fullname-relative" id="fullname-relative" placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control" name="lastname-relative" id="lastname-relative"  placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phonenum-relative" id="phonenum-relative"  placeholder="Enter Phone Number">
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
  
@stop
 

