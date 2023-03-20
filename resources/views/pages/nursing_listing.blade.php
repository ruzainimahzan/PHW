
@extends('layouts.default')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Diagnose
          <small>Patient (NURSING)</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Patient's Registration</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row" class="">
          <!-- Left col -->
          <div class="col-md-12">

           <div class="col-md-3 ">
            <a href="{{ url('nursing_form') }}" class="btn btn-primary btn-lg">
             Add Diagnose
           </a>
         </div>
         
         <section class="col-lg-12 connectedSortable">
           <br/>
           <br/>
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Diagnose's List</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped display nowrap display nowrap display nowrap">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Full Name</th>
                    <!-- <th>Last Name</th> -->
                    <th>IC Number</th>
                    <th>Phone Number</th>                   
                    <!-- <th>Staff In-Charge</th> -->
                    <th>Diagnose</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($nursinglisting as $key=> $tl)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{ $tl->fullname_patients }}</td>
                    <!-- <td>{{ $tl->lastname_patients }}</td> -->
                    <td>{{ $tl->ic_patients }}</td>
                    <td>{{ $tl->phone_number }}</td>
                    <!-- <td> @if($tl ->staff_no != null){{ $tl->fullname.' '.$tl->lastname.' ('.$tl->staff_no.')' }}@endif</td> -->
                    <td>{{ $tl->doctor_diagnose }}</td>
                    <td>
                      <center>
                        <a href="{{ route('nursing_edit', $tl->id_diagnose) }}" class="btn btn-info btn-sm"><i>EDIT</i></a>
                        <!-- <a href="#" data-id="{{ $tl->id_diagnose }}" class="nursinglist-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a> -->
                      </center>
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
  @stop
 



