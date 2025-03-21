@inject('Helpers','App\Helpers\Helper')               
            <!-- Logo -->
            <a href="http://passionatewellcare.com/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>P</b>HW</span> 
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
                                <img src="{{URL::asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->fullname }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{URL::asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">

                                    <p>
                                        <small>
                                        {{ Auth::user()->fullname }}<br>
                                        {{ Auth::user()->email }}
                                        {{ Auth::user()->department_id}}
                                        Department : {!! $Helpers->departmentName(Auth::user()->department_id) !!}
                                        </small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('forgot_password') }}" class="btn btn-default btn-flat">Forgot Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>

  