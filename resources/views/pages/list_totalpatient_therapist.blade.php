@extends('layouts.default') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Patient List
          <small>Therapist</small>
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
                </div>
                <section class="col-lg-12 connectedSortable">
                    <br/>
                    <br/>
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped display nowrap display nowrap display nowrap">
                                <thead>
                                    <tr>
                                        <th>ID Patient</th>
                                        <th>Patient Name</th>
                                        <th>IC Patient</th>
                                        <th>Diagnose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listpatient as $key=> $tl)
                                    <tr>
                                        <td>{{ $tl->mrn_no }}</td>
                                        <td>{{ $tl->fullname_patients. ' '. $tl->lastname_patients }}</td>
                                        <td>{{ $tl->ic_patients }}</td>
                                        <td>{{ $tl->doctor_diagnose }}</td>

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