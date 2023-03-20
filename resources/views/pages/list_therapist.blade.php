
@extends('layouts.default')
@section('content')



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
           Staff List
          <small></small>
        </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active"><i class="fa fa-user-md"></i> Staff </li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row" class="">
                    <!-- Left col -->
                    <div class="col-md-12">
                        <div class="col-md-3 ">

                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addstaff">
                                Add Staff
                            </button>
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
                                                <th>Staff ID</th>
                                                <th>Staff Name</th>
                                                <th>Department</th>
                                                <th>Total Patient</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($patient_therapist as $key=> $tl)
                                            <tr>

                                                <td>{{ $tl->staff_no }}</td>
                                                <td>{{ $tl->fullname }}</td>
                                                <td>{{ $tl->name_department }}</td>
                                                <td>

                                                    {{ \App\Models\Patient::where(['staff_no' => $tl->staff_no ])->get()->count()}}

                                                </td>
                                                <td>
                                                    <center>
                                                        <a href="{{ route('therapist_patient', $tl->staff_no) }}" class="btn btn-info btn-sm"><i>VIEW</i></a>
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
            <form method="post" action="{{URL::route('add_staff')}}" id="form">
                @csrf
                <div class="modal fade" id="addstaff" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="favoritesModalLabel">Staff Registration</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First name</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter First Name">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>

                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">IC No</label>
                                    <input type="text" class="form-control" name="ic" id="ic" placeholder="Enter Lat Name">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role">

                                        <option value="0">Please Choose</option>
                                        @foreach($role as $rol)
                                        <option value="{{ $rol->id_role}}">{{$rol->name_role}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="department">
                                        <option value="0">Please Choose</option>
                                        @foreach($department as $dep)
                                        <option value="{{ $dep->id_department}}">{{$dep->name_department}}</option>
                                        @endforeach
                                    </select>
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

           
        @if( session()->has('RegistrationSuccess') )
        <script>
            swal.fire({
                title: "{{ session()->get('RegistrationSuccess') }}",
                button: "Ok"
            });
        </script>
        @endif @if( session()->has('RegistrationError') )s
        <script>
            swal.fire({
                title: "{{ session()->get('RegistrationError') }}",
                button: "Ok"
            });
        </script>
        @endif

@stop