@extends('layouts.default') 
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Diagnose
          <small>Patient</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-h-square"></i> Diagnose's List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row" class="">
            <!-- Left col -->
            <div class="col-md-12">

                <div class="col-md-3 ">
                    <a href="{{ url('therapist_form') }}" class="btn btn-primary btn-lg">
             Add Diagnose
           </a>
                </div>
                <!--  -->
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
                                        <th>ID Patient</th>
                                        <th>Patient Name</th>
                                        <th>IC Patient</th>
                                        <th>Phone Number</th>
                                        <th>Diagnose</th>
                                        <th>Type Session</th>
                                        <th>Total Session</th>
                                        <th>Current Session</th>
                                        <th>Price</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($therapistlisting as $key=> $tl)
                                    <tr>
                                        <td>{{ $tl->mrn_no }}</td>
                                        <td>{{ $tl->fullname_patients. ' '. $tl->lastname_patients }}</td>
                                        <td>{{ $tl->ic_patients }}</td>
                                        <td>{{ $tl->phone_number }}</td>
                                        <td>{{ $tl->doctor_diagnose }}</td>
                                        <td>{{ $tl->name_type_sessions}}</td>
                                        <td>{{ $tl->total_session }}</td>
                                        <td>@if($tl->current_session == NULL) {{ '0' }} @else {{ $tl->current_session }} @endif</td>
                                        <td>{{ $tl->price_session }}</td>
                                        <td>
                                            <a href="{{ route('therapist_edit', $tl->id_diagnose) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

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