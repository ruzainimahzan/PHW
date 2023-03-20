
@extends('layouts.default')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Registration
          <small>Patient</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li class="active"><i class="fa fa-user-plus"></i> Patient's Registration</li>
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
                    <th>fullname</th>
                    <th>IC Number</th>
                    <th>Phone Number</th>
                    <th>Date</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($listpatient as $key=> $lp)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{ $lp->fullname_patients }}</td>
                    <td>{{ $lp->ic_patients }}</td>
                    <td>{{ $lp->phone_number }}</td>
                    <td>{{ date('d-m-Y', strtotime($lp->created_at)) }}</td>
                    <td>
                      <center>
                       <a href="#" class="btn btn-info btn-sm open-editpatient" data-toggle="modaledit" data-userid="{{ $lp->id_patients }}">Edit Patient</a>
                       <a class="btn btn-primary btn-sm open-addrelative" data-toggle="modaledit" data-userid="{{ $lp->id_patients }}">
                        Add Relative</a>
                        <a class="btn btn-warning btn-sm" href="{{ url('/relative/' . $lp->id_patients) }}" data-userid="{{ $lp->id_patients }}">
                        View Relative</a>
                       <a href="#" hidden="true" data-userid="{{ $lp->id_patients }}" class="patient-remove"><button href="" type="button" class="btn btn-danger btn-sm">Delete Patient</button></a>
                      
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
  <form method="post" action="{{URL::route('add_patient')}}" id="form">
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
            <label for="exampleInputEmail1">Fullname</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter First Name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">IC Number</label>
            <input type="text" class="form-control" name="icnum" id="icnum" onchange="calculateAge(this.value)" placeholder="Enter IC Number">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Age</label>
            <input type="text" class="form-control" name="age" id="age"  placeholder="Enter Age" readonly="readonly">
          </div>
          <div class="form-group">
            <label >Gender</label>
              <select class="form-control" name="gender" id="genderCreate" >
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

          <div class="form-group">
            <label >Register At</label>
              <select class="form-control" name="registerat" id="registerat" >
                  <option value="">Select</option>
                  <option value="center">Center</option>
                  <option value="outside" >Outside</option>
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

<form method="post" action="{{URL::route('edit_patient_process')}}" id="form">
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

          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Last name</label>
            <input type="hidden" class="form-control" name="lastname" id="lastname"  placeholder="Enter Last Name">
          </div> -->

          <div class="form-group">
            <label for="exampleInputEmail1">IC Number</label>
            <input type="text" class="form-control" name="icnum" id="icnum" onchange="calculateAge(this.value)" placeholder="Enter IC Number">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Age</label>
            <input type="text" class="form-control" name="age" id="age"  placeholder="Enter Age" readonly="readonly">
          </div>
          <div class="form-group">
            <label >Gender</label>
              <select class="form-control" name="gender" id="genderCreate" >
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

 <form method="post" action="{{URL::route('add_patient_relative')}}" id="form">
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


<script>
  function calculateAge(icnumber)
  {
    var ic1 = icnumber
    var dob = ic1.toString().substr(0, 6);
    var icno = ic1.toString().substr(8,4);

    var first = dob.substr(0, 2);
    var second = dob.substr(2, 2);
    var third = dob.substr(4,4);
  
  


    var dateraw = first+'-'+second+'-'+third;
  
    var daterawnew = moment(dateraw,"YY-MM-D").format("YYYY-MM-D");
 

    if(daterawnew > new Date().getFullYear().toString()){
        var yearshort = daterawnew.substr(0,2);
        var totalyear = yearshort - 1;
       
        daterawnew = totalyear+first+'-'+second+'-'+third;
     
      }
    else{
      daterawnew = daterawnew;
    }
    var date_convert_age = moment().diff(daterawnew, 'years'); 


    document.getElementById("age").value = date_convert_age;
    var gender = '';
    if (icno % 2 == 0)
    {
      gender = 'Female';
    }
    else{
      gender = 'Male';
    }

    

    var x = document.getElementById("genderCreate").options;
      for(var i=0;i<x.length;i++)
      {
        if(x[i].text==gender)
          {
            x[i].selected=true;
            break;
          }
      }
  }
</script>


@if( session()->has('RegistrationError') )s
<script>

Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: '{{ session()->get('RegistrationError') }}',

})

 
</script>
@endif
@stop