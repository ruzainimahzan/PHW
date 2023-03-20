
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span> 
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Passionate</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">

                                    <p>
                                        {{ Auth::user()->name }}
                                        <small>{{ Auth::user()->email }}</small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                    <img src="dist/img/PHW_logo.jpg" class="user-image" alt="User Image" style="max-width:230px;height:60px">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>

                    </div>
                </div>

                @include('layouts/navigation')
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    HQ
                    <small>Form</small>
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
                            <form class="form-horizontal" id="find_patient_form" method="post" action="{{URL::route('find_patient_hq')}}"> 
                                @csrf
                                <div class="row">
                                   <div class="col-md-12 form-group">
                                    <label class="col-lg-5 control-label" >Keywords(IC)</label>
                                    <div class="col-md-3" >
                                        <input type="text" class="form-control" id="ic_patients" name="ic_patients">
                                    </div>
                                    <div class="col-sm-1">
                                      <input type="submit" name="submit" class="form-control btn btn-primary" value="Find">
                                  </div>
                              </div>
                          </div>
                      </form>
                      <form class="form-horizontal" id="patient_form" method="post"> 
                        <div class="box-body">
                            <div class="col-sm-6 form-group">
                                <label class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="patient-name" name="fullname_patients" value=" @if($detailspatient != null){{$detailspatient->fullname_patients}}@endif" readonly="readonly"> 
                                </div>
                            </div>
                         
                            <div class="col-sm-6 form-group">
                                <label class="col-sm-4 control-label">IC</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ic_patients" name="ic_patients" value="@if($detailspatient != null){{$detailspatient->ic_patients}}@endif" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-sm-4 control-label">Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="address_patients" name="address_patients" value="@if($detailspatient != null){{$detailspatient->address_patients}}@endif" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-sm-4 control-label">Phone Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="@if($detailspatient != null){{$detailspatient->phone_number}}@endif" readonly="readonly">
                                </div>
                            </div>
                          <!--   <div class="col-sm-6 form-group">
                                <label class="col-sm-4 control-label">Total Session</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="patient-session">
                                </div>
                            </div> -->
                            

                        </div>
                    </form>
                </section>
            </div>
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#therapist-ortho" data-toggle="tab">Orthopaediac Form</a></li>
                <li><a href="#therapist-jointmovement" data-toggle="tab">Orthopaedic Form (Joint Movement)</a></li>
                <!-- <li><a href="#therapist-attendance" data-toggle="tab">Attendance</a></li> -->
                <!-- <li><a href="#therapist-soap" data-toggle="tab">S-O-A-P</a></li> -->
                <!-- <li><a href="#therapist-report" data-toggle="tab">Simple Report</a></li> -->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="therapist-ortho">
                    <div class="box box-primary">
                        <form class="form-horizontal" method="post" action="{{URL::route('save_ortherapist_hq')}}" >
                        @csrf
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                  <li class="active"><a href="#tab_doc" data-toggle="tab">Doctor Tab</a></li>
                                  <li><a href="#tab_health" data-toggle="tab">Health History</a></li>
                                  <li><a href="#tab_cond" data-toggle="tab">Condition</a></li>
                                  <li><a href="#tab_question" data-toggle="tab">Special Question</a></li>
                                  <li><a href="#tab_test" data-toggle="tab">Special / Clearing Test</a></li>
                                  <li><a href="#tab_neuro" data-toggle="tab">Neurological</a></li>
                                  <li><a href="#tab_goal" data-toggle="tab">Goal</a></li>
                                  <li><a href="#tab_physio" data-toggle="tab">Physiotherapist</a></li>
                              </ul>
                              <div class="tab-content">
                                <div class="tab-pane active" id="tab_doc">
                                    <!-- kat sini -->
                                    
                                        <div class="box-body">
                                            <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Doctor's Diagnose</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="doctor_diagnose" name="doctor_diagnose" style="text-align: left;"></textarea>
                                                </div> 
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Doctor's Management</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="ortho-docdiagnose" name="doctor_management"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Problem</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="ortho-docdiagnose" name="problem"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Observation</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="observation" name="observation"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Palpation</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="ortho-docdiagnose" name="palpation"></textarea>
                                                </div>
                                            </div>
                                        </div>
                              
                                </div>
                                <div class="tab-pane" id="tab_health">
                                  
                                        <div class="box-body">
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Currrent History</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="current_history" name="current_history"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Past History</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="past_history" name="past_history"></textarea>
                                                </div>
                                            </div>
                                        </div>
                          
                                </div>
                                <div class="tab-pane" id="tab_cond">
                                  
                                        <div class="box-body">
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Pain Scale</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="pain_scale" name="pain_scale" value = "">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Area</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="area" name="area" value = ""
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Nature</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nature" name="nature" value = ""
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Agg</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="agg" name="agg" value = ""
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Ease</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="ease" name="ease" value = ""
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">24 Hours</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="hours" id="hours" value = "">
                                                        <option readonly="readonly">Select</option>
                                                        <option value="On">On</option>
                                                        <option value="Off">Off</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- tukar sini -->
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Irritability</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="irrirability_id" id="irrirability_id" value = "">
                                                        <option value="">Select</option>
                                                        <option value="High">High</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="Low">Low</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                              
                                </div>
                                <div class="tab-pane" id="tab_question">
                                    
                                        <div class="box-body">
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">General Health</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="general_health" name="general_health" value = ""> 
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">PMHX / Surgery</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="pmhx_surgery" name="pmhx_surgery" value = ""
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">1X / MRI / X-Ray</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="mri_xray" name="mri_xray" value = ""
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Medication / Steroid</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="medication_steroid" name="medication_steroid" value = ""
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Occupation / Recreation</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="occupation_recreation" name="occupation_recreation" value = ""
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                
                                </div>
                                <div class="tab-pane" id="tab_test">
                                 
                                        <div class="box-body">
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Special Test</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="special_test" name="special_test"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Clearing Test / Other Joints</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="clearing_test_other_joins" name="clearing_test_other_joins"></textarea>
                                                </div>
                                            </div>
                                        </div>
                           
                                </div>
                                <div class="tab-pane" id="tab_neuro">
                         
                                        <div class="box-body">
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Motor</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="neurological_motor" name="neurological_motor"></textarea>
                                                </div>
                                            </div>
                                            <div></div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Sensation</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="neurological_seasation" name="neurological_seasation"></textarea>
                                                </div>
                                            </div>
                                            <div></div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Reflexes</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="neurological_reflexes" name="neurological_reflexes"></textarea>
                                                </div>
                                            </div>
                                        </div>
              
                                </div>
                                <div class="tab-pane" id="tab_goal">
                                 
                                        <div class="box-body">
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Short Term Goal</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="short_term_goals" name="short_term_goals"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Long Term Goal</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="long_term_goals" name="long_term_goals"></textarea>
                                                </div>
                                            </div>
                                        </div>
                           
                                </div>
                                <div class="tab-pane" id="tab_physio">
                                  
                                        <div class="box-body">
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Physiotherapist's Impression</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="physiotherapist_impression" name="physiotherapist_impression"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label">Plan of Treatment</label>
                                                <div class="col-sm-8">
                                                    <textarea type="text" class="form-control" id="plan_of_treatment" name="plan_of_treatment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            </div>
                        </div>
                                 <input type="submit" class="btn btn-primary btn-md" name="submit" id="" value="SUBMIT">
                                
                        </form>
               
                        @if($detailspatient != null)
                            <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;padding-right: 20px;">
                                @csrf
                                <span>
                                    <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                    <input type="hidden" name="type_report" id="type_report" value="ortho_report">
                                    <input type="submit" name="submit" value="Print Report" class="btn btn-primary btn-md">
                                </span>
                            </form>
                            @endif
                    </div>
                </div>
            <div class="tab-pane" id="therapist-jointmovement">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form">
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addjointmovement">Add Joint Movement</button>
                            <table id="table-jointmovement" class="table table-bordered table-striped display nowrap display nowrap">
                                <thead>
                                    <tr>
                                        <th>Joint Name</th>
                                        <th>Status Joint</th>
                                        <th>Remark Joint</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( $queryjoints != null )
                                    @foreach( $queryjoints as $list )
                                    <tr>
                                        <td>{{ $list->name_joints }}</td>
                                        <td>{{ $list->status_joints }}</td>
                                        <td>{{ $list->remark_joints }}</td>
                                        <td>
                                            <center>
                                                <a href="#" data-id="{{ $list->id_movement_joint }}" class="joints-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                            </center>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
                <form method="post" action="{{URL::route('add_joint_movement')}}" id="form">
                    @csrf
                    <div class="modal fade" id="addjointmovement" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <input type="hidden" name="user_id" id="user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" 
                                    id="favoritesModalLabel"><b>Add Joint Movement</b></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Joint Name</label>
                                        <input type="text" class="form-control" name="name_joints" id="name_joints">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status Joint</label>
                                        <select class="form-control" name="status_joints" id="status_joints" >
                                            <option value="">Select</option>
                                            <option value="Passive">Passive</option>
                                            <option value="Active">Active</option>
                                            <option value="Overpressure">Overpressure</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Remark Joints</label>
                                        <textarea type="text" class="form-control" id="remark_joints" name="remark_joints"></textarea>
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
            </div>
            <div class="tab-pane" id="therapist-attendance">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addattendance">Add Attendance</button>
                        @if($detailspatient != null)
                        <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;padding-right: 20px;">
                            @csrf
                            <span>
                                <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                <input type="hidden" name="type_report" id="type_report" value="attendance_report">
                                <input type="submit" name="submit" value="Print Attendance" class="btn btn-primary btn-md">
                            </span>
                        </form>
                        @endif
                        <table id="table-attendance" class="table table-bordered table-striped display nowrap display nowrap">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                    <th>Therapist ID</th>
                                    <th>Patient Name</th>
                                    <th>Amount (RM)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $queryattendance != null )
                                    @foreach( $queryattendance as $list )
                                    <tr>
                                        <td>{{ $list->date_treatment }}</td>
                                        <td>{{ date("h:i A",strtotime($list->time_in)) }}</td>
                                        <td>{{ date("h:i A",strtotime($list->time_out)) }}</td>
                                        <td>{{ $list->treatment_therapist }}</td>
                                        <td>{{ $list->treatment_fullname }}</td>
                                        <td>{{ $list->treatment_amount }}</td>
                                        <td>
                                            <center>
                                                <a href="#" data-id="{{ $list->id_treatment }}" class="joints-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                            </center>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <form method="post" action="{{URL::route('add_attendance')}}" id="form">
                    @csrf
                    <div class="modal fade" id="addattendance" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <input type="hidden" name="user_id" id="user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" 
                                    id="favoritesModalLabel"><b>Patient Attendance</b></h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="attendance-date" id="attendance-date" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Time In</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right timepicker" name="attendance-timein" id="attendance-timein">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Time Out</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right timepicker" name="attendance-timeout" id="attendance-timeout">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Therapist ID</label>
                                        <input type="text" class="form-control" name="attendance-therapist_id" id="attendance-therapist_id">
                                    </div>
                                    <div class="form-group">
                                        <label >Patient Name</label>
                                        <input type="text" class="form-control" name="attendance-patient_id" id="attendance-patient_id" readonly="readonly" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                    </div>
                                    <div class="form-group">
                                        <label >Amount (RM)</label>
                                        <input type="text" class="form-control" name="attendance-amount" id="attendance-amount" >
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
            </div>
            <div class="tab-pane" id="therapist-soap">
                <div class="box box-primary">
                    <div class="box-body">
                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addmethod">Add Method</button>
                        @if($detailspatient != null)
                        <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;padding-right: 20px;">
                            @csrf
                            <span>
                                <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                <input type="hidden" name="type_report" id="type_report" value="method_report">
                                <input type="submit" name="submit" value="Print SOAP" class="btn btn-primary btn-md">
                            </span>
                        </form>
                        @endif
                        <table id="" class="table table-bordered table-striped display nowrap display nowrap">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>S - Method</th>
                                    <th>O - Method</th>
                                    <th>A - Method</th>
                                    <th>P - Method</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $methodlist != null )
                                @foreach( $methodlist as $list )
                                <tr>
                                    <td>{{ date("d M Y",strtotime($list->date_method)) }}</td>
                                    <td>{!! nl2br($list->s_method) !!}</td>
                                    <td>{!! nl2br($list->o_method) !!}</td>
                                    <td>{!! nl2br($list->a_method) !!}</td>
                                    <td>{!! nl2br($list->p_method) !!}</td>
                                    <td>
                                        <center>
                                            <a href="#" data-id="{{ $list->id_summary_diagnose }}" class="method-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <form method="post" action="{{URL::route('add_methodsoap')}}" id="methodform">
                    @csrf
                    <div class="modal fade" id="addmethod" tabindex="-1" role="dialog">

                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="favoritesModalLabel"><b>S-O-A-P Form</b></h4>
                                </div>
                                @if($detailspatient != null)
                                <div class="modal-body">
                                    <input type="hidden" name="method_user_id" id="method_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="datemethod" id="datemethod" readonly="readonly">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>S-Method</label>
                                        <textarea type="text" class="form-control" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="smethod" id="smethod"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label>O-Method</label>
                                        <textarea type="text" class="form-control" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="omethod" id="omethod"></textarea> 

                                    </div>
                                    <div class="form-group">
                                        <label>A-Method</label>
                                        <textarea type="text" class="form-control" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="amethod" id="amethod"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label>P-Method</label>
                                        <textarea type="text" class="form-control" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="pmethod" id="pmethod"></textarea>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                                    <span class="pull-right">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </span>
                                </div>
                                @else
                                <div class="modal-body">
                                    <h2>Please Find Patient First</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>&nbsp;
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="tab-pane" id="therapist-report">
              <div class="box box-primary">
                <div class="box-body">
                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addsimplereport">Add Simple Report</button>
                    @if($detailspatient != null)
                    <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;padding-right: 20px;">
                        @csrf
                        <span>
                            <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                            <input type="hidden" name="type_report" id="type_report" value="simple_report">
                            <input type="submit" name="submit" value="Print Report" class="btn btn-primary btn-md">
                        </span>
                    </form>
                    @endif
                    <table id="table-ortho" class="table table-bordered table-striped display nowrap display nowrap">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Summary Report</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @if( $methodlist != null )
                         @foreach( $simplereport as $list )
                         <tr>
                            <td>{{ date("d M Y",strtotime($list->report_date)) }}</td>
                            <td>{{ $list->report_description }}</td>
                            <td>
                                <center>
                                    <a href="#" data-id="{{ $list->id_report_diagnose }}" class="report-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                </center>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <form method="post" action="{{URL::route('add_simplereport')}}" id="reportform">
            @csrf
            <div class="modal fade" id="addsimplereport" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="favoritesModalLabel"><b>Simple Report</b></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="user_id" id="user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" name="reportdate" id="reportdate" readonly="readonly">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Report</label>
                                        <form>
                                            <textarea class="text" name="reportdescription" id="reportdescription" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </form>
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



@include('layouts/footer')

<div class="control-sidebar-bg"></div>
</div>
@if( session()->has('TherapistError') )
  <script>
    swal.fire({
    title: "{{ session()->get('TherapistError') }}",
    button:"Ok"
  });
</script>
@endif

