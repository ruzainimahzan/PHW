
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
          Registration
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

            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addpatient">
             Add Patient
           </button>
         </div>
         
         <section class="col-lg-12 connectedSortable">
           <br/>
           <br/>
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Patient's List</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped display nowrap display nowrap display nowrap">
       
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>IC Number</th>
                    <th>Phone Number</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($listpatient as $key=> $lp)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{ $lp->fullname_patients }}</td>
                    <td>{{ $lp->lastname_patients }}</td>
                    <td>{{ $lp->ic_patients }}</td>
                    <td>{{ $lp->phone_number }}</td>
                    <td>
                      <center>
                       <a href="#" class="btn btn-info btn-sm open-editpatient_nursing" data-toggle="modaledit" data-userid="{{ $lp->id_patients }}"><i class="fa fa-edit"></i></a>
                       <a class="btn btn-primary btn-sm open-addrelative" data-toggle="modaledit" data-userid="{{ $lp->id_patients }}">
                        <i class="fa fa-address-book"></i></a>
                        <a class="btn btn-warning btn-sm" href="{{ url('/relative_nursing/' . $lp->id_patients) }}" data-userid="{{ $lp->id_patients }}">
                        <i class="fa fa-address-book"></i></a>
                       <a href="#" data-userid="{{ $lp->id_patients }}" class="patientnursing-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
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
  <form method="post" action="{{URL::route('add_patient_nursing')}}" id="form">
    @csrf
    <div class="modal fade" id="addpatient" 
    tabindex="-1" role="dialog" 
    aria-labelledby="addstaffLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" 
          id="favoritesModalLabel"><b>Add Patient's Information</b></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="user_id" id="user_id" value>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter First Name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Last name</label>
            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">IC Number</label>
            <input type="text" class="form-control" name="icnum" id="icnum"  placeholder="Enter IC Number">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Age</label>
            <input type="text" class="form-control" name="age" id="age"  placeholder="Enter Age">
          </div>
          <div class="form-group">
            <label >Gender</label>
              <select class="form-control" name="gender" id="gender" >
                  <option value="">Select</option>
                  <option value="Male">Male</option>
                  <option value="Female" >Female</option>
              </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" class="form-control" name="phonenum" id="phonenum"  placeholder="Enter Phone Number">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <textarea type="text" class="form-control" name="address" id="address"  placeholder="Enter address"></textarea>
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

<form method="post" action="{{URL::route('edit_patient_nursing_process')}}" id="form">
    @csrf
    <div class="modal fade" id="editpatient" 
    tabindex="-1" role="dialog" 
    aria-labelledby="addstaffLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" 
          id="favoritesModalLabel"><b>Edit Patient's Information</b></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="user_id" id="user_id">
          <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter First Name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Last name</label>
            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Last Name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">IC Number</label>
            <input type="text" class="form-control" name="icnum" id="icnum"  placeholder="Enter IC Number">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Age</label>
            <input type="text" class="form-control" name="age" id="age"  placeholder="Enter Age">
          </div>
          <div class="form-group">
            <label >Gender</label>
              <select class="form-control" name="gender" id="gender" >
                  <option value="">Select</option>
                  <option value="Male">Male</option>
                  <option value="Female" >Female</option>
              </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" class="form-control" name="phonenum" id="phonenum"  placeholder="Enter Phone Number">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <textarea type="text" class="form-control" name="address" id="address"  placeholder="Enter address"></textarea>
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

 <form method="post" action="{{URL::route('add_patient_nursing_relative')}}" id="form">
    @csrf
    <div class="modal fade" id="addrelative" tabindex="-1" role="dialog" aria-labelledby="addrelativeLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" 
          id="favoritesModalLabel"><b>Add Patient's Relative</b></h4>
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

