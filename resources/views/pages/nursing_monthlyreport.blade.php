
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
                    Nursing
                    <small>Form (NEW RECORD)</small>
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
                      <form class="form-horizontal" id="patient_form" method="post" action=""> 
                        @csrf
                        <div class="box-body">
                            <input type="hidden" name="id_patients" id="id_patients" >
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
                                    <option value="1">January</option>
                                    <option value="2" >February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5" >May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8" >August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Remark</label>
                                <textarea type="text" class="form-control" id="msr_remarks_report" name="msr_remarks_report"></textarea>
                            </div>
                        </div>
                        <div style="margin-left: 265px">
                            <input type="submit" class="btn btn-primary btn-md" name="submit" value="SUBMIT">
                        </div>
                        
                    </form>
                    
                </section>
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

