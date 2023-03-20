
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
                                    <img src="dist/img/user2-160x160.jpg" class="img-rectangle" alt="User Image">

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
                    Nursing
                    <small>Form (EDIT RECORD)</small>
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
                            
                            <form class="form-horizontal" id="patient_form" method="post"> 
                                <div class="box-body">
                                    <div class="col-sm-6 form-group">
                                     <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                     <label class="col-sm-4 control-label">Name</label>
                                     <div class="col-sm-8">
                                        <input type="text" class="form-control" id="patient-name" name="fullname_patients" value=" @if($detailspatient != null){{$detailspatient->fullname_patients}}@endif" readonly="readonly"> 
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="col-sm-4 control-label">Age</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="patient-diagnose" readonly="readonly" value=" @if($detailspatient != null){{$detailspatient->age}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="col-sm-4 control-label">Diagnose</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="patient-diagnose" readonly="readonly" value=" @if($detailspatient != null){{$detailspatient->doctor_diagnose}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="col-sm-4 control-label">Gender</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="patient-session" value=" @if($detailspatient != null){{$detailspatient->gender}}@endif" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <!-- <li <a href="#nursing-vitalsign" data-toggle="tab">VITAL SIGN FORM</a></li>
                <li><a href="#nursing-intakeoutput" data-toggle="tab">INTAKE-OUTPUT CHART</a></li>
                <li><a href="#nursing-medication" data-toggle="tab">MEDICATION CHART</a></li>
                <li><a href="#nursing-progressnote" data-toggle="tab">PROGRESS NOTE</a></li> -->
                <li class="active"><a href="#nursing-dailyreport" data-toggle="tab">DAILY REPORT</a></li>
                <li><a href="#nursing-assessment" data-toggle="tab">NURSING ASSESSMENT FORM</a></li>
                <li><a href="#nursing-monthlyreport" data-toggle="tab">MONTHLY SUMMARY REPORT</a></li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="nursing-dailyreport">
                    <div class="box box-primary">
                        <div class="box-body">
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addmonthlyreport">Add Daily Report</button>
                            <table id="table-jointmovement" class="table table-bordered table-striped display nowrap display nowrap">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>DESCRIPTION</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( $monthlyreport != null )
                                    @foreach( $monthlyreport as $list )
                                    <tr>
                                        <td>{{ date("d M Y",strtotime($list->msr_date)) }}</td>
                                        <td>{{ $list->msr_remarks_report }}</td>
                                        <td>
                                            <a href="#" data-id="{{ $list->id_summary_report }}" class="monthlyreport-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                            @if($detailspatient != null)
                                            <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;padding-right: 20px;">
                                                @csrf
                                                <span>
                                                    <input type="hidden" name="pdf_id_diagnose" id="pdf_id_diagnose" value="{{ $list->id_summary_report }}">
                                                    <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                                    <input type="hidden" name="type_report" id="type_report" value="nursing_daily_report">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                                </span>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form method="post" action="{{URL::route('add_monthlyreport')}}" id="form">
                        @csrf
                        <div class="modal fade" id="addmonthlyreport" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" 
                                        id="favoritesModalLabel"><b>Add Monthly Report</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="msr_date_monthly_nursing" id="msr_date_monthly_nursing" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                         <!--    <label >Oral Fluids</label>
                                            <input type="text" class="form-control" id="io_oral_fluids" name="io_oral_fluids"> -->
                                            <label >Month</label>
                                            <select class="form-control" name="msr_month" id="msr_month" >
                                                <option value="">Select</option>
                                                <option value="January">January</option>
                                                <option value="February" >February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May" >May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August" >August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Remark</label>
                                            <textarea type="text" class="form-control" id="msr_remarks_report" name="msr_remarks_report"></textarea>
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
                    <form method="post" action="{{URL::route('edit_monthlyreport_process')}}" id="form">
                        @csrf
                        <div class="modal fade" id="editmonthlyreport" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" 
                                        id="favoritesModalLabel"><b>Edit Monthly Report</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" id="user_id" value="">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="msr_date" id="msr_date" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Month</label>
                                            <select class="form-control" name="msr_month" id="msr_month" >
                                                <option value="">Select</option>
                                                <option value="January">January</option>
                                                <option value="February" >February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May" >May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August" >August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Remark</label>
                                            <textarea type="text" class="form-control" id="msr_remarks_report" name="msr_remarks_report"></textarea>
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


                <div class="tab-pane" id="nursing-vitalsign">
                    <div class="box box-primary">
                        <div class="box-body">
                            <form role="form">
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addvitalsign">Add Vital Sign</button>
                                <table id="table-jointmovement" class="table table-bordered table-striped display nowrap display nowrap">
                                    <thead>
                                        <tr>
                                            <th>DATE</th>
                                            <th>TIME</th>
                                            <th>B/P</th>
                                            <th>PULSE</th>
                                            <th>RESP</th>
                                            <th>TEMP</th>
                                            <th>GM</th>
                                            <th>SIGN</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if( $vitalsign != null )
                                        @foreach( $vitalsign as $list )
                                        <tr>
                                            <td>{{ date("d M Y",strtotime($list->vital_date)) }}</td>
                                            <td>{{ date("h:i A",strtotime($list->vital_time)) }}</td>
                                            <td>{{ $list->vital_blood_pressure }}</td>
                                            <td>{{ $list->vital_pulse }}</td>
                                            <td>{{ $list->vital_resp }}</td>
                                            <td>{{ $list->vital_temp }}</td>
                                            <td>{{ $list->vital_gm }}</td>
                                            <td>{{ $list->vital_sign }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm open-editvitalsign" data-toggle="modaledit" data-target="#editvitalsign" data-userid="{{ $list->id_vital_sign }}"><i class="fa fa-edit"></i></a>
                                                <a href="#" data-id="{{ $list->id_vital_sign }}" class="vitalsign-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="btn btn-danger btn-sm fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <form method="post" action="{{URL::route('add_vital_sign')}}" id="form">
                            @csrf
                            <div class="modal fade" id="addvitalsign" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <input type="hidden" name="user_id" id="user_id" value="">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" 
                                            id="favoritesModalLabel"><b>Add Vital Sign</b></h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right datepicker" name="vs_date" id="vs_date" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Time</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right timepicker" name="vs_time" id="vs_time" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label >Blood Pressure</label>
                                                <input type="text" class="form-control" name="bp" id="bp">
                                            </div>
                                            <div class="form-group">
                                                <label >Pulse</label>
                                                <input type="text" class="form-control" id="pulse" name="pulse">
                                            </div>
                                            <div class="form-group">
                                                <label >Resp</label>
                                                <input type="text" class="form-control" id="resp" name="resp">
                                            </div>
                                            <div class="form-group">
                                                <label >Temp(Celcius)</label>
                                                <input type="text" class="form-control" id="temp" name="temp">
                                            </div>
                                            <div class="form-group">
                                                <label >GM</label>
                                                <input type="text" class="form-control" id="gm" name="gm">
                                            </div>
                                            <div class="form-group">
                                                <label >Sign</label>
                                                <input type="text" class="form-control" id="sign" name="sign">
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
                        <form method="post" action="{{URL::route('edit_vitalsign_process')}}" id="form">
                            @csrf
                            <div class="modal fade" id="editvitalsign" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" 
                                            id="favoritesModalLabel"><b>Edit Vital Sign</b></h4>
                                        </div>
                                        <div class="modal-body">
                                           <input type="hidden" name="user_id" id="user_id">
                                           <div class="form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="vs_date" id="vs_date" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Time</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right timepicker" name="vs_time" id="vs_time" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Blood Pressure</label>
                                            <input type="text" class="form-control" name="bp" id="bp">
                                        </div>
                                        <div class="form-group">
                                            <label >Pulse</label>
                                            <input type="text" class="form-control" id="pulse" name="pulse">
                                        </div>
                                        <div class="form-group">
                                            <label >Resp</label>
                                            <input type="text" class="form-control" id="resp" name="resp">
                                        </div>
                                        <div class="form-group">
                                            <label >Temp(Celcius)</label>
                                            <input type="text" class="form-control" id="temp" name="temp">
                                        </div>
                                        <div class="form-group">
                                            <label >GM</label>
                                            <input type="text" class="form-control" id="gm" name="gm">
                                        </div>
                                        <div class="form-group">
                                            <label >Sign</label>
                                            <input type="text" class="form-control" id="sign" name="sign">
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
                <div class="tab-pane" id="nursing-intakeoutput">
                    <div class="box box-primary">
                        <div class="box-body">
                            <form role="form">
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addintakeoutput">Add Intake-Output</button>
                                <table id="table-jointmovement" class="table table-bordered table-striped display nowrap display nowrap">
                                    <thead>
                                      <colgroup span="2"></colgroup>
                                      <tr style="text-align: center;">
                                        <td rowspan="2"><b>DATE</b></td>
                                        <td rowspan="2"><b>TIME</b></td>
                                        <th colspan="2" scope="colgroup" style="text-align: center;">INTAKE IN ML</th>
                                        <td rowspan="2"><b>TOTAL INTAKE</b></td>
                                        <th colspan="4" scope="colgroup" style="text-align: center;">OUTPUT IN ML</th>
                                        <td rowspan="2"><b>REMARKS</b></td>
                                        <td rowspan="2"><b>TOTAL OUTPUT</b></td>
                                        <td rowspan="2"><b>ACTION</b></td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <th style="text-align: center;" scope="col">ORAL FLUIDS</th>
                                        <th style="text-align: center;" scope="col">IV FLUIDS</th>
                                        <th style="text-align: center;" scope="col">VOMITUS</th>
                                        <th style="text-align: center;" scope="col">GASTRIC ASPIRATION</th>
                                        <th style="text-align: center;" scope="col">BOWEL OPEN</th>
                                        <th style="text-align: center;" scope="col">URINE</th>
                                    </tr>
                                </thead>
                                <body>
                                    @if( $intakeoutput != null )
                                    @foreach( $intakeoutput as $list )
                                    <tr>
                                        <td>{{ date("d M Y",strtotime($list->io_date)) }}</td>
                                        <td>{{ date("h:i A",strtotime($list->io_time)) }}</td>
                                        <td>{{ $list->io_oral_fluids }}</td>
                                        <td>{{ $list->io_iv_fluids }}</td>
                                        <td>{{ $list->io_total_intake }}</td>
                                        <td>{{ $list->io_vomitus }}</td>
                                        <td>{{ $list->io_gastric_aspiration }}</td>
                                        <td>{{ $list->io_bowel_open }}</td>
                                        <td>{{ $list->io_urine }}</td>
                                        <td>{{ $list->io_remarks }}</td>
                                        <td>{{ $list->io_total_output }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm open-editintakeoutput" data-toggle="modaledit" data-target="#editintakeoutput" 
                                            data-userid="{{ $list->id_intake_output }}"><i class="fa fa-edit"></i></a>
                                            <a href="#" data-id="{{ $list->id_intake_output }}" class="intakeoutput-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </body>

                            </table>
                        </form>
                    </div>
                </div>
                <form method="post" action="{{URL::route('add_intakeoutput')}}" id="form">
                    @csrf
                    <div class="modal fade" id="addintakeoutput" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <input type="hidden" name="user_id" id="user_id" value="">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" 
                                    id="favoritesModalLabel"><b>Add Intake-Output</b></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="io_date" id="io_date" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Time</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right timepicker" name="io_time" id="io_time" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >Oral Fluids</label>
                                        <input type="text" class="form-control" id="io_oral_fluids" name="io_oral_fluids">
                                    </div>
                                    <div class="form-group">
                                        <label >IV Fluids</label>
                                        <input type="text" class="form-control" id="io_iv_fluids" name="io_iv_fluids">
                                    </div>
                                    <div class="form-group">
                                        <label >Total Intake</label>
                                        <input type="text" class="form-control" id="io_total_intake" name="io_total_intake">
                                    </div>
                                    <div class="form-group">
                                        <label >Vomitus</label>
                                        <input type="text" class="form-control" id="io_vomitus" name="io_vomitus">
                                    </div>
                                    <div class="form-group">
                                        <label >Gastric Aspiration</label>
                                        <input type="text" class="form-control" id="io_gastric_aspiration" name="io_gastric_aspiration">
                                    </div>
                                    <div class="form-group">
                                        <label >Bowel Open</label>
                                        <input type="text" class="form-control" id="io_bowel_open" name="io_bowel_open">
                                    </div>
                                    <div class="form-group">
                                        <label >Urine</label>
                                        <input type="text" class="form-control" id="io_urine" name="io_urine">
                                    </div>
                                    <div class="form-group">
                                        <label >Remarks</label>
                                        <textarea type="text" class="form-control" id="io_remarks" name="io_remarks"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label >Total Output</label>
                                        <input type="text" class="form-control" id="io_total_output" name="io_total_output">
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
                <form method="post" action="{{URL::route('edit_intakeoutput_process')}}" id="form">
                    @csrf
                    <div class="modal fade" id="editintakeoutput" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" 
                                    id="favoritesModalLabel"><b>Edit Intake-Output</b></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="user_id" id="user_id">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="io_date" id="io_date" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Time</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right timepicker" name="io_time" id="io_time" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >Oral Fluids</label>
                                        <input type="text" class="form-control" id="io_oral_fluids" name="io_oral_fluids">
                                    </div>
                                    <div class="form-group">
                                        <label >IV Fluids</label>
                                        <input type="text" class="form-control" id="io_iv_fluids" name="io_iv_fluids">
                                    </div>
                                    <div class="form-group">
                                        <label >Total Intake</label>
                                        <input type="text" class="form-control" id="io_total_intake" name="io_total_intake">
                                    </div>
                                    <div class="form-group">
                                        <label >Vomitus</label>
                                        <input type="text" class="form-control" id="io_vomitus" name="io_vomitus">
                                    </div>
                                    <div class="form-group">
                                        <label >Gastric Aspiration</label>
                                        <input type="text" class="form-control" id="io_gastric_aspiration" name="io_gastric_aspiration">
                                    </div>
                                    <div class="form-group">
                                        <label >Bowel Open</label>
                                        <input type="text" class="form-control" id="io_bowel_open" name="io_bowel_open">
                                    </div>
                                    <div class="form-group">
                                        <label >Urine</label>
                                        <input type="text" class="form-control" id="io_urine" name="io_urine">
                                    </div>
                                    <div class="form-group">
                                        <label >Remarks</label>
                                        <textarea type="text" class="form-control" id="io_remarks" name="io_remarks"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label >Total Output</label>
                                        <input type="text" class="form-control" id="io_total_output" name="io_total_output">
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
            <div class="tab-pane " id="nursing-medication">
                <div class="box box-primary">
                    <div class="box-body">
                        <form role="form">
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addmedication">Add Medication</button>
                            <!-- <a class="btn btn-success btn-md" href="{{ url('/medication_dosage_form/') }}" data-userid="">Medication Description</a> -->
                            <table id="table-jointmovement" class="table table-bordered table-striped display nowrap display nowrap">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>DATE</th>
                                        <th>PRESCRIPTION NAME</th>
                                        <th>DOSE</th>
                                        <th>DURATION</th>
                                        <th>ROUTE</th>
                                        <th>SIGN</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr> 
                                        @if( $medication != null )
                                        @foreach( $medication as $key=> $list )
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{ date("d M Y",strtotime($list->mc_date_start)) }}</td>
                                            <td>{{ $list->mc_prescription_name }}</td>
                                            <td>{{ $list->mc_dosage }}</td>
                                            <td>{{ $list->mc_duration }}</td>
                                            <td>{{ $list->mc_route }}</td>
                                            <td>{{ $list->mc_sign }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm open-editmedication" data-toggle="modaledit" data-target="#editmedication" data-id="{{ $list->id_prescription }}"><i class="fa fa-edit"></i></a>
                                                <a href="{{ url('/medication_dosage/'.$list->id_prescription) }}" class="btn btn-success btn-sm " data-id="{{ $list->id_prescription }}"><i class="fa fa-plus-square"></i></a>
                                                <a href="#" data-id="{{ $list->id_prescription }}" class="medicationchart-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tr>

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <form method="post" action="{{URL::route('add_medication')}}" id="form">
                    @csrf
                    <div class="modal fade" id="addmedication" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" 
                                    id="favoritesModalLabel"><b>Add Medication</b></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group box-body">
                                        <label>Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="mc_date_start" id="mc_date_start" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group box-body ">
                                        <label >Description Name</label>
                                        <input type="text" class="form-control" id="mc_prescription_name" name="mc_prescription_name">
                                    </div>
                                    <div class="form-group box-body">
                                        <label >Dose</label>
                                        <input type="text" class="form-control" id="mc_dosage" name="mc_dosage">
                                    </div>
                                    <div class="form-group box-body ">
                                        <label >Duration</label>
                                        <input type="text" class="form-control" id="mc_duration" name="mc_duration">
                                    </div>
                                    <div class="form-group box-body ">
                                        <label >Route</label>
                                        <input type="text" class="form-control" id="mc_route" name="mc_route">
                                    </div>
                                    <div class="form-group box-body ">
                                        <label >Sign</label>
                                        <input type="text" class="form-control" id="mc_sign" name="mc_sign">
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
                <form method="post" action="{{URL::route('edit_medication_process')}}" id="form">
                    @csrf
                    <div class="modal fade" id="editmedication" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" 
                                    id="favoritesModalLabel"><b>Edit Medication</b></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="user_id" id="user_id" >
                                    <div class="form-group box-body">
                                        <label>Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="mc_date_start" id="mc_date_start" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group box-body ">
                                        <label >Description Name</label>
                                        <input type="text" class="form-control" id="mc_prescription_name" name="mc_prescription_name">
                                    </div>
                                    <div class="form-group box-body">
                                        <label >Dose</label>
                                        <input type="text" class="form-control" id="mc_dosage" name="mc_dosage">
                                    </div>
                                    <div class="form-group box-body ">
                                        <label >Duration</label>
                                        <input type="text" class="form-control" id="mc_duration" name="mc_duration">
                                    </div>
                                    <div class="form-group box-body ">
                                        <label >Route</label>
                                        <input type="text" class="form-control" id="mc_route" name="mc_route">
                                    </div>
                                    <div class="form-group box-body ">
                                        <label >Sign</label>
                                        <input type="text" class="form-control" id="mc_sign" name="mc_sign">
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
            <div class="tab-pane " id="nursing-progressnote">
                <div class="box box-primary">
                    <div class="box-body">
                        <form role="form">
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_progressnote">Add Progress Note</button>
                            <!-- <a class="btn btn-success btn-md" href="{{ url('/progress_form/') }}" data-userid="">Progress Form</a> -->

                            <table id="table-jointmovement" class="table table-bordered table-striped display nowrap display nowrap">
                                <thead>
                                    <tr>
                                        <th><b>DATE</b></th>
                                        <th><b>DESCRIPTION</b></th>
                                        <th><b>ACTION</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( $progressnote != null )
                                    @foreach( $progressnote as $list )
                                    <tr>
                                        <td>{{ date("d M Y",strtotime($list->pn_date)) }}</td>
                                        <td>{{ $list->pn_activity }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm open-editprogressnote" data-toggle="modaledit" data-target="#editprogressnote" data-userid="{{ $list->id_progress_note }}"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/progress_note_details/'.$list->id_progress_note) }}" data-userid="{{ $list->id_progress_note }}" class=""><button href="" type="button" class="btn btn-success btn-sm"><i class=" fa fa-plus-square"></i></button></a>
                                            <a href="#" data-id="{{ $list->id_progress_note }}"" class="progressnote-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <form method="post" action="{{URL::route('add_progressnote')}}" id="form">
                    @csrf
                    <div class="modal fade" id="add_progressnote" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <input type="hidden" name="user_id" id="user_id" value="">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" 
                                    id="favoritesModalLabel"><b>Add Progress Note</b></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="pn_date" id="pn_date" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >Description</label>
                                        <textarea type="text" class="form-control" id="pn_activity" name="pn_activity"></textarea>
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
                <form method="post" action="{{URL::route('edit_progressnote_process')}}" id="form">
                    @csrf
                    <div class="modal fade" id="editprogressnote" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" 
                                    id="favoritesModalLabel"><b>Edit Progress Note</b></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="pn_date" id="pn_date" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >Description</label>
                                        <textarea type="text" class="form-control" id="pn_activity" name="pn_activity"></textarea>
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
            <div class="tab-pane " id="nursing-assessment">
                <div class="box box-primary">
                    <div class="box-body">
                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addprogression">Add Assessment</button>
                        <table id="table-jointmovement" class="table table-bordered table-striped display nowrap display nowrap">
                            <thead>
                                <tr>
                                    <!-- <th><b>PROBLEM DISEASE</b></th> -->
                                    <th><b>REMARKS</b></th>
                                    <th><b>ACTION</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if( $progression != null )
                                    @foreach( $progression as $list )
                                    <tr>
                                        <!-- <td>{{ $list->progression_problem_disease }}</td> -->
                                        <td>{{ $list->progression_remarks }}</td>
                                        <td>

                                            <!--  <a href="#" class="btn btn-info btn-sm open-editprogression" data-toggle="modaledit" data-target="#editprogression" data-id="{{ $list->id_progression }}"><i class="fa fa-edit"></i></a> -->
                                            <a class="btn btn-warning btn-sm" href="{{ url('/nursing_monthlyreport/' .$list->id_progression) }}" data-userid="{{ $list->id_progression }}"><i class="fa fa-address-book"></i></a>
                                            <a href="#" data-id="{{ $list->id_progression }}" class="progression-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                            @if($detailspatient != null)
                                            <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;padding-right: 20px;">
                                                @csrf
                                                <span>
                                                    <input type="hidden" name="pdf_id_diagnose" id="pdf_id_diagnose" value="{{ $list->id_progression }}">
                                                    <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                                    <input type="hidden" name="type_report" id="type_report" value="nursing_asses_report">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                                </span>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form method="post" action="{{URL::route('add_progression')}}" id="form">
                        @csrf
                        <div class="modal fade" id="addprogression" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" 
                                        id="favoritesModalLabel"><b>Add Assessment</b></h4>
                                    </div>
                                    <div class="modal-body">
                                     <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                     <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker" name="date_progression" id="date_progression" readonly="readonly">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                        <!-- <div class="form-group">
                                            <label>Problem Disease</label>
                                            <input type="text" class="form-control" id="progression_problem_disease" name="progression_problem_disease" value="">
                                        </div> -->
                                        <div class="form-group">
                                            <label >Remarks</label>
                                            <textarea type="text" class="form-control" id="progression_remarks" name="progression_remarks"></textarea>
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
                    <form method="post" action="{{URL::route('edit_progression_process')}}" id="form">
                        @csrf
                        <div class="modal fade" id="editprogression" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" 
                                        id="favoritesModalLabel"><b>Add Assessment</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" id="user_id" >
                                        <div class="form-group">
                                            <label>Problem Disease</label>
                                            <input type="text" class="form-control" id="progression_problem_disease" name="progression_problem_disease" value="">
                                        </div>
                                        <div class="form-group">
                                            <label >Remark</label>
                                            <textarea type="text" class="form-control" id="progression_remarks" name="progression_remarks"></textarea>
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
            <div class="tab-pane " id="nursing-monthlyreport">
                    <div class="box box-primary">
                        <div class="box-body">
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addmonthlyreport">Add Monthly Report</button>
                            <table id="table-jointmovement" class="table table-bordered table-striped display nowrap display nowrap">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>MONTH</th>
                                        <th>DESCRIPTION</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( $monthlyreport != null )
                                    @foreach( $monthlyreport as $list )
                                    <tr>
                                        <td>{{ date("d M Y",strtotime($list->msr_date)) }}</td>
                                        <td>{{ $list->msr_month }}</td>
                                        <td>{{ $list->msr_remarks_report }}</td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-info btn-sm open-editmonthlyreport" data-toggle="modal" data-target="#editintakeoutput" data-id="{{ $list->id_summary_report }}"><i class="fa fa-edit"></i></a> -->

                                            <a href="#" data-id="{{ $list->id_summary_report }}" class="monthlyreport-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                            @if($detailspatient != null)
                                            <form method="post" action="{{URL::route('pdf_report')}}" style="display: inline-block;padding-right: 20px;">
                                                @csrf
                                                <span>
                                                    <input type="hidden" name="pdf_id_diagnose" id="pdf_id_diagnose" value="{{ $list->id_summary_report }}">
                                                    <input type="hidden" name="pdf_user_id" id="pdf_user_id" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                                    <input type="hidden" name="type_report" id="type_report" value="nursing_monthly_report">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                                </span>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form method="post" action="{{URL::route('add_monthlyreport')}}" id="form">
                        @csrf
                        <div class="modal fade" id="addmonthlyreport" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($detailspatient != null){{$detailspatient->id_diagnose}}@endif">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" 
                                        id="favoritesModalLabel"><b>Add Monthly Report</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_patients" id="id_patients" value="@if($detailspatient != null){{$detailspatient->id_patients}}@endif">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="msr_date" id="msr_date" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                         <!--    <label >Oral Fluids</label>
                                            <input type="text" class="form-control" id="io_oral_fluids" name="io_oral_fluids"> -->
                                            <label >Month</label>
                                            <select class="form-control" name="msr_month" id="msr_month" >
                                                <option value="">Select</option>
                                                <option value="January">January</option>
                                                <option value="February" >February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May" >May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August" >August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Remark</label>
                                            <textarea type="text" class="form-control" id="msr_remarks_report" name="msr_remarks_report"></textarea>
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
                    <form method="post" action="{{URL::route('edit_monthlyreport_process')}}" id="form">
                        @csrf
                        <div class="modal fade" id="editmonthlyreport" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" 
                                        id="favoritesModalLabel"><b>Edit Monthly Report</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" id="user_id" value="">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker" name="msr_date" id="msr_date" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Month</label>
                                            <select class="form-control" name="msr_month" id="msr_month" >
                                                <option value="">Select</option>
                                                <option value="January">January</option>
                                                <option value="February" >February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May" >May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August" >August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Remark</label>
                                            <textarea type="text" class="form-control" id="msr_remarks_report" name="msr_remarks_report"></textarea>
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

