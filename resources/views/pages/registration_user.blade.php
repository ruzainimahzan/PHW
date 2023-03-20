
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
          <small>User</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Register User</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row" class="">
          <!-- Left col -->
          <div class="col-md-12">
            <div class="col-md-3 ">
              <button 
               type="button" 
               class="btn btn-primary btn-lg" 
               data-toggle="modal" 
               data-target="#addstaff">
               Add Staff
              </button>
            </div>
         
         <section class="col-lg-12 connectedSortable">
           <br/>
           <br/>
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Staff</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <br>
              <table id="example1" class="table table-bordered table-striped display nowrap display nowrap">
                <thead>
                  <tr>
                    <th>Staff No</th>
                    <th>Full Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($liststaff as $lststaff)
                  <tr>
                    <td>{{$lststaff->staff_no}}</td>
                    <td>
                      {{$lststaff->fullname}}
                    </td>
                    <td>{{$lststaff->lastname}}</td>
                    <td>{{$lststaff->email}}</td>
                    <td>{{$lststaff->name_role}}</td>
                    <td>{{$lststaff->name_department}}</td>
                    <td>
                      <center>
                       <a href="#" class="btn btn-info btn-sm open-editUser" data-toggle="modaledit" data-userid="{{ $lststaff->id }}">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="#" data-id="{{$lststaff->id}}" class="staff-remove"><button href="" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>

                    </center>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Staff No</th>
                  <th>Full Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Department</th>
                  <th>Action</th>
                </tr>
              </tfoot>
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
  <div class="modal fade" id="addstaff" 
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
        id="favoritesModalLabel">Staff Registration</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name Depan</label>
          <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter First Name">
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Last name</label>
          <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Lat Name">
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

<form method="post" action="{{URL::route('edit_staff_process')}}" id="form">
  @csrf
  <div class="modal fade" id="editRegisterForm" 
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
        id="favoritesModalLabel">Edit Staff</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="user_id" id="user_id" value>
        <div class="form-group">
          <label for="exampleInputEmail1">Staff No</label>
          <input type="text" class="form-control" name="staff_no" id="staff_no"  placeholder="Enter Staff No">
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">First name</label>
          <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter First Name">
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Last name</label>
          <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Lat Name">
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <label>Role</label>
          <select class="form-control" name="role" id="role">

            <option value="0">Please Choose</option>
            @foreach($role as $rol)
            <option value="{{ $rol->id_role}}">{{$rol->name_role}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Department</label>
          <select class="form-control" name="department" id="department">
            <option value="0">Please Choose</option>
            @foreach($department as $dep)
            <option value="{{ $dep->id_department}}">{{$dep->name_department}}</option>
            @endforeach
          </select>
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

@if( session()->has('RegistrationSuccess') )
  <script>
    swal.fire({
    title: "{{ session()->get('RegistrationSuccess') }}",
    button:"Ok"
  });
</script>
@endif

@if( session()->has('RegistrationError') )s
  <script>
    type: 'error',
    title: 'Oops...',
    text: '{{ session()->get('RegistrationError') }}',
  });
</script>
@endif

