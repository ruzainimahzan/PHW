
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
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">

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
          Relative
          <small>Patience (NURSING)</small>
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
                      <a href="#" class="btn btn-info btn-sm open-editrelativenursing" data-toggle="modaledit" data-userid="{{ $lp->id_rel_patients }}"><i class="fa fa-edit"></i></a>
                       <a href="#" data-id="{{$lp->id_rel_patients}}" class="relative_nursing-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
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
  <form method="post" action="{{URL::route('edit_patient_nursing_relative_process')}}" id="form">
    @csrf
    <div class="modal fade" id="editrelativenursing" tabindex="-1" role="dialog" aria-labelledby="addrelativeLabel">
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
  
@include('layouts/footer')

<div class="control-sidebar-bg"></div>
</div>

