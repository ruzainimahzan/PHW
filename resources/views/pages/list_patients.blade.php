
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
          Diagnose
          <small>Patient</small>
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
            <a href="{{ url('therapist_form') }}" class="btn btn-primary btn-lg">
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
                    <th>Last Name</th>
                    <th>IC Number</th>
                    <th>Phone Number</th>
                    <th>Diagnose</th>
                    <th>Total Session</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($therapistlisting as $key=> $tl)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{ $tl->fullname_patients }}</td>
                    <td>{{ $tl->lastname_patients }}</td>
                    <td>{{ $tl->ic_patients }}</td>
                    <td>{{ $tl->phone_number }}</td>
                    <td>{{ $tl->doctor_diagnose }}</td>
                    <td>0</td>
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
 

@include('layouts/footer')

<div class="control-sidebar-bg"></div>
</div>

