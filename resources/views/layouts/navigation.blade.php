

<ul class="sidebar-menu" data-widget="tree">
  <li class="header"><i class="fa fa-bars"></i> MAIN NAVIGATION</li>


  <li class="treeview">
  @if(Auth::user()->department_id == '10')
    <a href="#">
     <i class="fa fa-registered"></i>
     <span>Registiration</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ url('register_user') }}"><i class="fa fa-circle-o"></i> User</a></li>
    <!-- <li><a href="{{ url('register_patient') }}"><i class="fa fa-circle-o"></i> Patients</a></li>
    <li><a href="{{ url('register_patient_nursing') }}"><i class="fa fa-circle-o"></i> Patient's Nursing</a></li> -->

  </ul>
  @endif
</li>

<li class="treeview">
  @if(Auth::user()->department_id == '1' || Auth::user()->role_id == '1')
  <a href="#">
     <i class="fa fa-building-o "></i>
     <span>Center 2.0</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  @endif

  
  <ul class="treeview-menu">
   <li><a href="{{ url('walkin_session') }}"><i class=" fa fa-h-square"></i>Walk-In / Session</a></li>
   <li><a href="{{ url('register_patient') }}"><i class="fa fa-user-plus"></i>Patient Register</a></li>
   <li><a href="{{ url('list_stafftherapist') }}"><i class="fa fa-user-md"></i>List Staff</a></li>
   <!-- <li><a href="{{ url('list_ofpatient','0') }}"><i class="fa fa-clock-o"></i>Patient Attendance</a></li> -->

  </ul>
</li>

 <!--  <li class="treeview">
  @if(Auth::user()->department_id == '1' || Auth::user()->role_id == '1')
  <a href="#">
     <i class="fa fa-building-o "></i>
     <span>Center</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  @endif

  
  <ul class="treeview-menu">
    <li><a href="{{ url('register_user') }}"><i class="fa fa-circle-o"></i>Patients</a></li>
   <li><a href="{{ url('hq_listing') }}"><i class="fa fa-stethoscope"></i>List Diagnose</a></li>

   <li><a href="{{ url('register_patient') }}"><i class="fa fa-user-plus"></i>Patient Register</a></li>
   <li><a href="{{ url('therapist_listing') }}"><i class=" fa fa-h-square"></i>Patient Diagnose</a></li>
   <li><a href="{{ url('list_ofpatient','0') }}"><i class="fa fa-clock-o"></i>Patient Attendance</a></li>
   <li><a href="{{ url('list_stafftherapist') }}"><i class="fa fa-user-md"></i>List Staff</a></li>



  </ul>
</li> -->
  <li class="treeview">
  @if(Auth::user()->department_id == '2' || Auth::user()->role_id == '1')
  <a href="#">
    <i class="fa fa-user-md"></i>
     <!-- <i class="fa fa-building-o "></i> -->
     <span>Physiotherapist</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  @endif

  
  <ul class="treeview-menu">
 <!--    <li><a href="{{ url('register_user') }}"><i class="fa fa-circle-o"></i>Patients</a></li>
   <li><a href="{{ url('hq_listing') }}"><i class="fa fa-stethoscope"></i>List Diagnose</a></li> -->
   <li><a href="{{ url('assign_patient') }}"><i class="fa fa-user-md"></i>Assign Patient</a></li>
   <!-- <li><a href="{{ url('register_patient') }}"><i class="fa fa-user-plus"></i>Patient Register</a></li>
   <li><a href="{{ url('therapist_listing') }}"><i class=" fa fa-h-square"></i>Patient Diagnose</a></li> -->
   <li><a href="{{ url('list_ofpatient','0') }}"><i class="fa fa-clock-o"></i>Patient Attendance</a></li>
   


  </ul>
</li>

  <li class="treeview">
  @if(Auth::user()->department_id == '3' || Auth::user()->role_id == '1')
  <a href="#">
    <i class="fa fa-stethoscope"></i>

     <span>Nursing</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  @endif

  
  <ul class="treeview-menu">
 <!--    <li><a href="{{ url('register_user') }}"><i class="fa fa-circle-o"></i>Patients</a></li>
   <li><a href="{{ url('hq_listing') }}"><i class="fa fa-stethoscope"></i>List Diagnose</a></li> -->
   <li><a href="{{ url('register_patient') }}"><i class="fa fa-user-plus"></i>Patient Register</a></li>
   <li><a href="{{ url('nursing_listing') }}"><i class="fa fa-stethoscope"></i>Patient List</a></li>
   <!-- <li><a href="{{ url('register_patient') }}"><i class="fa fa-user-plus"></i>Patient Register</a></li>
   <li><a href="{{ url('therapist_listing') }}"><i class=" fa fa-h-square"></i>Patient Diagnose</a></li>
   <li><a href="{{ url('list_ofpatient','0') }}"><i class="fa fa-clock-o"></i>Patient Attendance</a></li>
   <li><a href="{{ url('assign_patient') }}"><i class="fa fa-user-md"></i>Assign Patient</a></li> -->

  </ul>

</li>

<li class="treeview">
  @if(Auth::user()->department_id == '1' || Auth::user()->role_id == '1')
  <a href="#">
     <i class="fa fa-building-o "></i>
     <span>Report</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  @endif

  
  <ul class="treeview-menu">

   <li><a href="{{ url('patientreport_daily') }}"><i class="fa fa-user-md"></i>Patient Daily Sale</a></li>
   <li><a href="{{ url('patientreport_monthly') }}"><i class="fa fa-user-md"></i>Patient Monthly Sale</a></li>
   <li><a href="{{ url('patientreport_yearly') }}"><i class="fa fa-user-md"></i>Patient Yearly Sale</a></li>
   
   <!-- <li><a href="{{ url('patientreport_daily') }}"><i class="fa fa-user-md"></i>Patient Daily Sale New</a></li> -->



  </ul>
</li>
  @if(Auth::user()->department_id == '4')
  <li><a href="{{ url('payment_listing') }}"><i class="fa fa-money"></i>Payment</a></li>
  <!-- <li><a href="#"><i class="fa fa-file"></i>Report</a></li> -->
  @endif

</ul>