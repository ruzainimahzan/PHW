@extends('layouts.default')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Center
      <small>walk-in / session / house-call</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="active">center</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#walkintype" data-toggle="tab">Walk-In</a></li>
            <li class=""><a href="#sessiontype" data-toggle="tab">Session</a></li>
            <li class=""><a href="#housecalltype" data-toggle="tab">House-Call</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="walkintype">
              <div class="box box-primary">
                <div class="box-body">
                  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addwalkinpatient">New Walk-In</button>
                  <br/>
                  <br/>
                  <table id="example1" class="table table-bordered table-striped display nowrap display nowrap">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>IC</th>
                        <th>Phone No</th>
                        <th>Diagnosis</th>
                        <th>Payment Mode</th>
                        <th>Handle By</th>
                        <th>Remarks</th>
                        <th>Status Verified</th>
                        <th>Price</th>
                        <th>ID_diagnose</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($listpatientwalkin as $key=> $listpatientwalking)
                      <tr>
                        <td>{{ date('d-m-Y', strtotime($listpatientwalking->date_treatment)) }}</td>
                        <td>{{ $listpatientwalking->fullname_patients. ' '. $listpatientwalking->lastname_patients }}</td>
                        <td>{{ $listpatientwalking->ic_patients }}</td>
                        <td>{{ $listpatientwalking->phone_number }}</td>
                        <td>{{ $listpatientwalking->doctor_diagnose }}</td>
                        <td>{{ $listpatientwalking->payment_mode }}</td>
                        <td>{{ $listpatientwalking->fullname.' '.$listpatientwalking->lastname.' ('.$listpatientwalking->staff_no.')' }}</td>
                        <td>{{ $listpatientwalking->summary_treatment }}</td>
                        <td>{{  $listpatientwalking->status_verified }}</td>
                        <td>{{ $listpatientwalking->treatment_amount }}</td>
                        <td>{{  $listpatientwalking->id_diagnose }}</td>
                        <td>
                          <a href="#" class="btn btn-info btn-sm open-editwalkin" data-toggle="modaledit" data-userid="{{ $listpatientwalking->id_diagnose }}">Edit</a>
                          <a href="#" class="btn btn-info btn-sm open-edithousecall" data-toggle="modaledit" data-userid="{{ $listpatientwalking->id_diagnose }}">Edit</a>
                          <!-- <a href="{{ route('nursing_edit', $listpatientwalking->id_diagnose) }}" class="btn btn-info btn-sm"><i>EDIT</i></a> -->
                          @if(Auth::user()->role_id == '1')
                            @if($listpatientwalking->status_verified != "Verified")
                            <a href="#" class="btn btn-info btn-sm open-UpdateVerified" data-paymentid="{{ $listpatientwalking->id_payment }}">VERIFIED</a>
                            @endif
                          @endif
                          @if($listpatientwalking->status_verified == "Verified")
                          <a href="#" class="btn btn-info btn-sm open-UpdatePriceWalkin" data-toggle="modaledit" data-paymentid="{{ $listpatientwalking->id_payment }}" data-treatmentid="{{ $listpatientwalking->id_treatment}}">UPDATE PRICE</a>
                          <form action="{{URL::route('printreceipt')}}" style="display: inline-block;" target=""  method="POST">
                            @csrf
                            <input type="hidden" name="id_payment" value="{{ $listpatientwalking->id_payment }}">
                            <button class="btn btn-info btn-sm PrintReceipt">Print Receipt</button>
                          </form>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <form method="post" action="{{URL::route('add_walkin_patient')}}" id="form">
                @csrf
                <div class="modal fade" id="addwalkinpatient" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" 
                          id="favoritesModalLabel"><b>Add Attendance</b></h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Search (IC)</label>
                          <input type="text" class="form-control" name="search_ic" id="search_ic">
                        </div>
                        <div id="detailsPa">
                        </div>
                        <div id="detailsPa">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="id_session_category" id="id_session_category" value="1">
                          <label class="">Type of treatment</label><br>
                          <!-- <select class="form-control" name="id_type_session" id="id_type_session" > -->
                          <!-- <option value="">Select Treatment Type</option> -->
                          @foreach($list_session as $lst)
                          <input class="col-md-4" type="checkbox" name="id_type_session[]" value="{{ $lst->id_type_sessions }}"> {{ $lst->name_type_sessions }} &nbsp;
                          @endforeach
                          <!-- </select> -->
                        </div>
                        <div class="form-group">
                          <label>Diagnose</label>
                          <input type="text" class="form-control" name="name_diagnose" id="name_diagnose" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>Remark</label>
                          <textarea class="form-control" name="summary_treatment" id="summary_treatment"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Price(RM)</label>
                          <input type="text" class="form-control" name="price_value_treatment" id="price_value_treatment" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Payment Mode</label>
                          <select class="form-control" name="payment_mode" id="payment_mode" >
                            <option value="">Select Payment Mode</option>
                            <option value="Cash">Cash</option>
                            <option value="Card">Card</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class=" control-label">Therapist Name</label>
                          <select class="form-control" name="staff_id" id="staff_id">
                            @foreach($therapistlist as $staff)
                            @if($staff->department_id != 4 )
                            <option value="{{ $staff->staff_no}}">{{$staff->staff_no. ' - ' .$staff->fullname}}</option>
                            @endif
                            @endforeach
                          </select>
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
              <form method="post" action="{{URL::route('edit_walkin_patient_process')}}" id="form">
                @csrf
                <div class="modal fade" id="editwalkinpatient" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" 
                          id="favoritesModalLabel"><b>Edit Attendance</b></h4>
                      </div>
                      <!-- <input type="text" name="userid" id="userid" value="@if($listpatientwalking != null){{$listpatientwalking->id_diagnose}}@endif">
                      <input type="hidden" name="id_patients" id="id_patients" value="@if($listpatientwalking != null){{$listpatientwalking->id_patients}}@endif"> -->
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Patient Name</label>
                          <input type="text" class="form-control" name="pt_name" id="pt_name" autocomplete="off" readonly="true">
                        </div>
                        <div class="form-group">
                          <label>IC Number</label>
                          <input type="text" class="form-control" name="ic_no" id="ic_no" autocomplete="off" readonly="true">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="id_session_category" id="id_session_category" value="1">
                          <label class="">Type of treatment</label><br>
                          <!-- <select class="form-control" name="id_type_session" id="id_type_session" > -->
                          <!-- <option value="">Select Treatment Type</option> -->
                          @foreach($list_session as $lst)
                          <input class="col-md-4 walkinidtypesession{{ $lst->id_type_sessions }}" type="checkbox" name="id_type_session[]" id="id_type_session" value="{{ $lst->id_type_sessions }}"> {{ $lst->name_type_sessions }} &nbsp;
                          @endforeach
                          <!-- </select> -->
                        </div>
                        <div class="form-group">
                          <label>Diagnose</label>
                          <input type="text" class="form-control" name="name_diagnose" id="name_diagnose" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>Remark</label>
                          <textarea class="form-control" name="summary_treatment" id="summary_treatment"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Price(RM)</label>
                          <input type="text" class="form-control" name="price_value_treatment" id="price_value_treatment" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Payment Mode</label>
                          <select class="form-control" name="payment_mode" id="payment_mode" >
                            <option value="">Select Payment Mode</option>
                            <option value="Cash">Cash</option>
                            <option value="Card">Card</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class=" control-label">Therapist Name</label>
                          <select class="form-control" name="staff_id" id="staff_id">
                            @foreach($therapistlist as $staff)
                            @if($staff->department_id != 4 )
                            <option value="{{ $staff->staff_no}}">{{$staff->staff_no. ' - ' .$staff->fullname}}</option>
                            @endif
                            @endforeach
                          </select>
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
              <form method="post" action="{{URL::route('update_price_walkin')}}" id="form">
                @csrf
                <div class="modal fade" id="centerUpdatePricewalkin" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="favoritesModalLabel"><b>Update Price</b></h4>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" id="paymentid" name="paymentid">
                        <input type="hidden" id="treatmentid" name="treatmentid">
                        <div class="form-group">
                          <label>Price</label>
                          <input type="text" class="form-control" name="price_walkin" id="price_walkin"></input>
                        </div>
                        <div class="form-group">
                          <label>Payment Mode</label>
                          <label class="control-label">Payment Mode</label>
                          <select class="form-control" name="payment_mode" id="payment_mode" >
                            <option value="">Select Payment Mode</option>
                            <option value="Cash">Cash</option>
                            <option value="Card">Card</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Submit">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane" id="housecalltype">
              <div class="box box-primary">
                <div class="box-body">
                  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addhousecall">New House-Call</button>
                  <br/>
                  <br/>
                  <table id="example1" class="table table-bordered table-striped display nowrap display nowrap">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Session Start</th>
                        <th>Session End</th>
                        <th>Name</th>
                        <th>IC</th>
                        <th>Treatment</th>
                        <th>Handle By</th>
                        <th>Remarks</th>
                        <th>Treatment Amount</th>
                        <th>Status Verified</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($listpatienthousec as $key=> $listpatienthousecall)
                      <tr>
                        <td>{{ date('d-m-Y', strtotime($listpatienthousecall->date_treatment)) }}</td>
                        <td>{{ date("h:i A",strtotime($listpatienthousecall->time_in)) }}</td>
                        <td>{{ date("h:i A",strtotime($listpatienthousecall->time_out)) }}</td>
                        <td>{{ $listpatienthousecall->fullname_patients. ' '. $listpatienthousecall->lastname_patients }}</td>
                        <td>{{ $listpatienthousecall->ic_patients }}</td>
                        <td>{{ $listpatienthousecall->doctor_diagnose }}</td>
                        <td>{{ $listpatienthousecall->fullname.' '.$listpatienthousecall->lastname.' ('.$listpatienthousecall->staff_no.')' }}</td>
                        <td>{{ $listpatienthousecall->summary_treatment }}</td>
                        <td>{{ $listpatienthousecall->treatment_amount }}</td>
                        <td>{{  $listpatienthousecall->status_verified }}</td>
                        <td>
                          <a href="#" class="btn btn-info btn-sm open-edithousecall" data-toggle="modaledit" data-userid="{{ $listpatienthousecall->id_diagnose }}">Edit</a>
                          <a href="#" class="btn btn-info btn-sm open-addtransaction" data-toggle="modaledit" data-userid="{{ $listpatienthousecall->id_diagnose }}">Add Transfer</a>
                          
                          <!-- <a href="#" class="btn btn-info btn-sm open-UpdateVerified" data-paymentid="{{ $listpatienthousecall->id_payment }}">VERIFIED</a> -->
                          @if(Auth::user()->role_id == '1')
                            @if($listpatientwalking->status_verified != "Verified")
                            <a href="#" class="btn btn-info btn-sm open-UpdateVerified" data-paymentid="{{ $listpatienthousecall->id_payment }}">VERIFIED</a>
                            @endif
                          @endif
                          @if($listpatienthousecall->status_verified == "Verified")
                          <a href="#" class="btn btn-info btn-sm open-UpdatePriceWalkin" data-toggle="modaledit" data-paymentid="{{ $listpatienthousecall->id_payment }}" data-treatmentid="{{ $listpatienthousecall->id_treatment}}">UPDATE PRICE</a>
                          <form action="{{URL::route('printreceipt')}}" style="display: inline-block;" target=""  method="POST">
                            @csrf
                            <input type="hidden" name="id_payment" value="{{ $listpatienthousecall->id_payment }}">
                            <button class="btn btn-info btn-sm PrintReceipt">Print Receipt</button>
                          </form>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- ///// -->
                <form method="post" action="{{URL::route('add_transaction_patient')}}" id="form">
                    @csrf
                    <div class="modal fade" id="addpatienttransfer" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="favoritesModalLabel"><b>Add Transfer Detail</b></h4>
                                <input type="hidden" name="id_diagnose" id="id_diagnose" value=" @if($listpatienthousecall != null){{$listpatienthousecall->id_diagnose}}@endif">
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker_report" name="transaction_date" id="transaction_date" readonly="readonly"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="">Transfer Type</label><br>
                                    <select class="form-control" name="payment_mode" id="payment_mode" >
                                        <option value="" disable="true">--Select--</option>
                                        <option value="Cash">Instant Transfer</option>
                                        <option value="Card">Card</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Reference ID</label>
                                    <input type="text" class="form-control" name="reference_id" id="reference_id" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Recipient Name</label>
                                    <input class="form-control" name="receipient_name" id="receipient_name" autocomplete="off"></input>
                                </div>
                                <div class="form-group">
                                    <label>Recipient Account Number</label>
                                    <input type="text" class="form-control" name="receipient_acc_no" id="receipient_acc_no" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label >Recipient Reference</label>
                                    <input type="text" class="form-control" name="receipient_reference" id="receipient_reference" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" class="form-control" name="transfer_amount" id="transfer_amount" autocomplete="off">
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
<!-- /// -->
                <form method="post" action="{{URL::route('add_house_call')}}" id="form">
                  @csrf
                  <div class="modal fade" id="addhousecall" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" 
                            id="favoritesModalLabel"><b>Add House Call</b></h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Search (IC / Phone) </label>
                            <input type="text" class="form-control" name="housec_search_ic" id="housec_search_ic">
                          </div>
                          <div id="housec_detailsPa">
                          </div>
                          <div id="housec_detailsPa">
                          </div>
                          <div class="form-group">
                            <input type="hidden" class="form-control" name="id_session_category" id="id_session_category" value="3">
                            <label class="">Type of treatment</label><br>
                            <!-- <select class="form-control" name="id_type_session" id="id_type_session" > -->
                            <!-- <option value="">Select Treatment Type</option> -->
                            @foreach($list_session as $lst)
                            <input class="col-md-4"  type="checkbox"  name="id_type_session[]" value="{{ $lst->id_type_sessions }}"> {{ $lst->name_type_sessions }} &nbsp;
                            @endforeach
                            <!-- </select> -->
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Session Start</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right timepicker" name="attendance-timein" id="attendance-timein">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Session End</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right timepicker" name="attendance-timeout" id="attendance-timeout">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Diagnose</label>
                            <input type="text" class="form-control" name="housec_name_diagnose" id="housec_name_diagnose" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label>Remark</label>
                            <textarea class="form-control" name="housec_summary_treatment" id="housec_summary_treatment"></textarea>
                          </div>
                          <div class="form-group">
                            <label>Price(RM)</label>
                            <input type="text" class="form-control" name="housec_price_value_treatment" id="housec_price_value_treatment" autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Payment Mode</label>
                            <select class="form-control" name="housec_payment_mode" id="housec_payment_mode" >
                              <option value="">Select Payment Mode</option>
                              <option value="Cash">Cash</option>
                              <option value="Card">Card</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Therapist Name</label>
                            <select class="form-control" name="housec_staff_id" id="housec_staff_id">
                              @foreach($therapistlist as $staff)
                              <option value="{{ $staff->staff_no}}">{{$staff->staff_no. ' - ' .$staff->fullname}}</option>
                              @endforeach
                            </select>
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
                <form method="post" action="{{URL::route('edit_housecall_patient_process')}}" id="form">
                  @csrf
                  <div class="modal fade" id="edithousecallpatient" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" 
                            id="favoritesModalLabel"><b>Edit House Call</b></h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Patient Name</label>
                            <input type="text" class="form-control" name="pt_name" id="pt_name" autocomplete="off" readonly="true">
                          </div>
                          <div class="form-group">
                            <label>IC Number</label>
                            <input type="text" class="form-control" name="ic_no" id="ic_no" autocomplete="off" readonly="true">
                          </div>
                          <div class="form-group">
                            <input type="hidden" class="form-control" name="id_session_category" id="id_session_category" value="3">
                            <label class="">Type of treatment</label><br>
                            @foreach($list_session as $lst)
                            <input class="col-md-4 houseidtypesession{{ $lst->id_type_sessions }}" type="checkbox" name="id_type_session[]" value="{{ $lst->id_type_sessions }}"> {{ $lst->name_type_sessions }} &nbsp;
                            @endforeach
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Session Start</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right timepicker" name="attendance-timein" id="attendance-timein">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Session End</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right timepicker" name="attendance-timeout" id="attendance-timeout">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Diagnose</label>
                            <input type="text" class="form-control" name="housec_name_diagnose" id="housec_name_diagnose" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <label>Remark</label>
                            <textarea class="form-control" name="housec_summary_treatment" id="housec_summary_treatment"></textarea>
                          </div>
                          <div class="form-group">
                            <label>Price(RM)</label>
                            <input type="text" class="form-control" name="housec_price_value_treatment" id="housec_price_value_treatment" autocomplete="off">
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Payment Mode</label>
                            <select class="form-control" name="housec_payment_mode" id="housec_payment_mode" >
                              <option value="">Select Payment Mode</option>
                              <option value="Cash">Cash</option>
                              <option value="Card">Card</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Therapist Name</label>
                            <select class="form-control" name="housec_staff_id" id="housec_staff_id">
                              @foreach($therapistlist as $staff)
                              <option value="{{ $staff->staff_no}}">{{$staff->staff_no. ' - ' .$staff->fullname}}</option>
                              @endforeach
                            </select>
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
            <div class="tab-pane" id="sessiontype">
                <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addsessionpatient">New Session</button>
                    <br/>
                    <br/>
                    <table id="example1" class="table table-bordered table-striped display nowrap display nowrap">
                    <tr>
                        <th>ID Patient</th>
                        <th>Patient Name</th>
                        <th>IC Patient</th>
                        <th>Diagnose</th>
                        <th>Current Session</th>
                        <th>Total Session</th>
                        <th>Total Amount</th>
                        <th>Balance Payment</th>
                        <th>Diagnose ID</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($sessionlisting as $key=> $tl)
                        <tr class="accordion-toggle" data-toggle="collapse" data-target="#{{ $tl->id_diagnose }}-attend">
                        <td>{{ $tl->mrn_no }}</td>
                        <td>{{ $tl->fullname_patients. ' '. $tl->lastname_patients }}</td>
                        <td>{{ $tl->ic_patients }}</td>
                        <td>{{ $tl->doctor_diagnose }}</td>
                        <td>@if($tl->current_session == NULL) {{ '0' }} @else {{ $tl->current_session }} @endif</td>
                        <td>{{ $tl->total_session }}</td>
                        <td>{{ $tl->price_session }}</td>
                        <td>{{ $tl->balance_amount }}</td>
                        <td>{{ $tl->id_diagnose }}</td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm open-editsession" data-toggle="modaledit" data-userid="{{ $tl->id_diagnose }}">Edit</a>
                            <!-- <a href="{{ route('therapist_edit', $tl->id_diagnose) }}" class="btn btn-info btn-sm">Edit</a> -->
                            <a class="btn btn-info btn-sm open-ViewSessionInfo"  data-toggle="modal" data-userid="{{ $tl->id_diagnose }}">Add Attendance</a>
                            <a href="" class="btn btn-info btn-sm">Transfer</a>
                        </td>
                        </tr>
                        <tr>
                        <td class="accordion-body collapse" id="{{ $tl->id_diagnose }}-attend">
                            <table  class="table">
                            <thead>
                                <th>Date</th>
                                <th>Price(RM)</th>
                                <th>Status Paid</th>
                                <th>Handle By</th>
                                <th>Summary Report</th>
                            </thead>
                            <tbody>
                                <?php
                                $allattendance1 = \App\Models\Diagnose::select('*','treatment.id_treatment AS idtr')
                                ->leftjoin('treatment', 'treatment.id_diagnose', '=', 'diagnose.id_diagnose')
                                ->leftjoin('assigned','assigned.id_treatment','=','treatment.id_treatment')
                                ->leftjoin('users','users.staff_no','=','assigned.id_staff')
                                ->where('diagnose.id_diagnose',$tl->id_diagnose )
                                ->orderby("treatment.date_treatment","DESC")
                                ->get();
                                
                                
                                // dd($allattendance1->count());
                                // ->toSql();
                                // dd($allattendance1);
                                ?>
                                @foreach($allattendance1 as  $ka)
                                <?php
                                $paymentstbl = \App\Models\Payments::where('id_diagnose','=',$ka->id_diagnose)->where('id_treatment_ref',$ka->idtr)->get();
                                ?>
                                <tr>
                                <td>{{ date('d-m-Y', strtotime($ka->date_treatment)) }}</td>
                                <!-- <td>@if($paymentstbl->count() > 0) {{ $paymentstbl[0]->payment_date}} @endif</td> -->
                                <td>@if($paymentstbl->count() > 0){{  $paymentstbl[0]->payment_paid }}@endif</td>
                                <td>
                                    @if($paymentstbl->count() > 0)
                                    @if(  $paymentstbl[0]->status_verified == "Not Verified" )
                                    Not Verified
                                    @else
                                    Verified
                                    @endif
                                    @endif
                                </td>
                                <td>{{ $ka->fullname.' '.$ka->lastname.' ('.$ka->staff_no.')' }}</td>
                                <td>
                                    <!-- <input type="text" id="user_id" name="user_id" value="{{ $ka->idtr }}"> -->
                                    <a href="#" class="btn btn-info btn-sm open-ViewSummaryReportSession" data-toggle="modaledit" data-userid="{{ $ka->idtr }}">VIEW</a>
                                    <a href="#" class="btn btn-info btn-sm open-UpdatePrice" data-toggle="modaledit" data-userid="{{ $ka->idtr }}">UPDATE PRICE</a>
                                    <a href="#" class="btn btn-info btn-sm open-UpdateStatus" data-toggle="modaledit" data-userid="{{ $ka->idtr }}">STATUS</a>
                                    @if(Auth::user()->role_id == '1')
                                      @if($listpatientwalking->status_verified != "Verified")
                                      <a href="#" class="btn btn-info btn-sm open-UpdateVerified" data-paymentid="@if($paymentstbl->count() > 0){{ $paymentstbl[0]->id_payment }}@endif">VERIFIED</a>
                                      @endif
                                    @endif
                                    <!-- <a href="#" class="btn btn-info btn-sm open-UpdateVerified" data-paymentid="@if($paymentstbl->count() > 0){{ $paymentstbl[0]->id_payment }}@endif">VERIFIED</a> -->
                                    <form action="{{URL::route('printreceipt')}}" style="display: inline-block;" target=""  method="POST">
                                    @csrf
                                    <input type="hidden" name="id_payment" value="@if($paymentstbl->count() > 0){{  $paymentstbl[0]->id_payment }} @endif">
                                    <button class="btn btn-info btn-sm PrintReceipt">Print Receipt</button>
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <form method="post" action="{{URL::route('add_session_patient')}}" id="form">
                    @csrf
                    <div class="modal fade" id="addsessionpatient" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" 
                                id="favoritesModalLabel"><b>Add Session</b></h4>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">
                                <label>Search (IC / Phone) </label>
                                <input type="text" class="form-control" name="search_ic" id="search_ic_session">
                            </div>
                            <div id="detailsPatt">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_session_category" id="id_session_category" value="2">
                                <label class="">Type of treatment</label><br>
                                <!-- <select class="form-control" name="id_type_session" id="id_type_session" > -->
                                <!-- <option value="">Select Treatment Type</option> -->
                                @foreach($list_session as $lst)
                                <input class="col-md-4" type="checkbox" name="id_type_session[]" value="{{ $lst->id_type_sessions }}"> {{ $lst->name_type_sessions }}
                                @endforeach
                                <!-- </select> -->
                            </div>
                            <div class="form-group">
                                <label>Diagnose</label>
                                <input type="text" class="form-control" name="name_diagnose" id="name_diagnose" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Total Session</label>
                                <input type="text" class="form-control" name="total_session" id="total_session" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Price(RM)</label>
                                <input type="text" class="form-control" name="price_value_treatment" id="price_value_treatment" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Payment Mode</label>
                                <select class="form-control" name="payment_mode" id="payment_mode" >
                                <option value="">Select Payment Mode</option>
                                <option value="Cash">Cash</option>
                                <option value="Card">Card</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Therapist Name</label>
                                <select class="form-control" name="staff_id" id="staff_id">
                                @foreach($therapistlist as $staff)
                                @if($staff->department_id != 4 )
                                <option value="{{ $staff->staff_no}}">{{$staff->staff_no. ' - ' .$staff->fullname}}</option>
                                @endif
                                @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">Remark Joints</label>
                                <textarea type="text" class="form-control" id="remark_joints" name="remark_joints"></textarea>
                                </div> -->
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
                    <form method="post" action="{{URL::route('edit_session_patient_process')}}" id="form">
                    @csrf
                    <div class="modal fade" id="editsessionpatient" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" 
                                id="favoritesModalLabel"><b>Edit Session</b></h4>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">
                            <label>Patient Name</label>
                            <input type="text" class="form-control" name="pt_session_name" id="pt_session_name" autocomplete="off" readonly="true">
                          </div>
                          <div class="form-group">
                            <label>IC Number</label>
                            <input type="text" class="form-control" name="ic_no" id="ic_no" autocomplete="off" readonly="true">
                          </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_session_category" id="id_session_category" value="2">
                                <label class="">Type of treatment</label><br>
                                @foreach($list_session as $lst)
                                <input class="col-md-4 sessionidtypesession{{ $lst->id_type_sessions }}" type="checkbox" name="id_type_session[]" id="id_type_session" value="{{ $lst->id_type_sessions }}"> {{ $lst->name_type_sessions }} &nbsp;
                         
                                <!-- <input class="col-md-4" type="checkbox" name="id_type_session[]" value="{{ $lst->id_type_sessions }}"> {{ $lst->name_type_sessions }} -->
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label>Diagnose</label>
                                <input type="text" class="form-control" name="name_diagnose" id="name_diagnose" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Total Session</label>
                                <input type="text" class="form-control" name="total_session" id="total_session" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Price(RM)</label>
                                <input type="text" class="form-control" name="price_value_treatment" id="price_value_treatment" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Payment Mode</label>
                                <select class="form-control" name="payment_mode" id="payment_mode" >
                                <option value="">Select Payment Mode</option>
                                <option value="Cash">Cash</option>
                                <option value="Card">Card</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-sm-4 control-label">Therapist Name</label>
                                <select class="form-control" name="staff_id" id="staff_id">
                                @foreach($therapistlist as $staff)
                                @if($staff->department_id != 4 )
                                <option value="{{ $staff->staff_no}}">{{$staff->staff_no. ' - ' .$staff->fullname}}</option>
                                @endif
                                @endforeach
                                </select>
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">Remark Joints</label>
                                <textarea type="text" class="form-control" id="remark_joints" name="remark_joints"></textarea>
                                </div> -->
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
                    <form method="post" action="{{URL::route('add_session_attendant_patient')}}" id="form">
                    @csrf
                    <div class="modal fade" id="addsessionattendantpatient" tabindex="-1" role="dialog" aria-labelledby="addstaffLabel">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" 
                                id="favoritesModalLabel"><b>Add Attendance</b></h4>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" name="id_diagnose" id="id_diagnose">
                            <input type="hidden" name="id_patients" id="id_patients">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right datepicker" name="attendance-date" id="attendance-date" readonly="readonly" value="{{ date('d-m-Y', strtotime(now())) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Patient Name</label>
                                <input type="text" class="form-control" name="patient_name" readonly="readonly" id="patient_name">
                                <input type="hidden" name="user_id" id="user_id">
                            </div>
                            <div class="form-group">
                                <label>Patient No</label>
                                <input type="text" class="form-control" name="ic_patients" id="ic_patients" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label>Price(RM)</label>
                                <input type="text" class="form-control" name="price_value_treatment" id="price_value_treatment" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Payment Mode</label>
                                <select class="form-control" name="payment_mode" id="payment_mode" >
                                <option value="">Select Payment Mode</option>
                                <option value="Cash">Cash</option>
                                <option value="Card">Card</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Therapist Name</label>
                                <select class="form-control" name="staff_id" id="staff_id">
                                @foreach($therapistlist as $staff)
                                @if($staff->department_id != 4 )
                                <option value="{{ $staff->staff_no}}">{{$staff->staff_no. ' - ' .$staff->fullname}}</option>
                                @endif
                                @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">Remark Joints</label>
                                <textarea type="text" class="form-control" id="remark_joints" name="remark_joints"></textarea>
                                </div> -->
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
                    <form method="post" id="methodform">
                    @csrf
                    <div class="modal fade" id="showsoapreport" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="favoritesModalLabel"><b>Summary Report</b></h4>
                            </div>
                            <div class="modal-body">
                            <!--     <input type="text" id="user_id" name="user_id"> -->
                            <div class="form-group">
                                <label>S-Method</label>
                                <textarea type="text" class="form-control" disabled="true" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="smethod" id="smethod"></textarea>
                            </div>
                            <div class="form-group">
                                <label>O-Method</label>
                                <textarea type="text" class="form-control" disabled="true" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="omethod" id="omethod"></textarea> 
                            </div>
                            <div class="form-group">
                                <label>A-Method</label>
                                <textarea type="text" class="form-control" disabled="true" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="amethod" id="amethod"></textarea>
                            </div>
                            <div class="form-group">
                                <label>P-Method</label>
                                <textarea type="text" class="form-control" disabled="true" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="pmethod" id="pmethod"></textarea>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </form>
                    <form method="post" action="{{URL::route('update_price')}}" id="form">
                    @csrf
                    <div class="modal fade" id="centerUpdatePrice" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="favoritesModalLabel"><b>Update Price</b></h4>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" id="price_user_id" name="price_user_id">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="att_price" id="att_price"></input>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                        </div>
                    </div>
                    </form>
                    <form method="post" action="{{URL::route('update_status')}}" id="form">
                    @csrf
                    <div class="modal fade" id="update_status_payment" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="favoritesModalLabel"><b>Update Payment Status</b></h4>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" id="status_user_id" name="status_user_id">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Status</label>
                                <select class="form-control" name="paid_status" id="paid_status" >
                                <option value="0">Pending</option>
                                <option value="1">Paid</option>
                                </select>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>
@if( session()->has('TherapistError') )
<script>
  swal.fire({
      title: "{{ session()->get('TherapistError') }}",
      button:"Ok"
  });
  
  $(document).ready(function(){
  $('#id_type_session').select2();
  });
</script>
@endif
@if( session()->has('RegistrationSuccess') )
<script>
  swal.fire({
      title: "{{ session()->get('RegistrationSuccess') }}",
      button:"Ok"
  });
</script>
@endif
@if( session()->has('RegistrationError') )
<script>
  swal.fire({
      type: 'error',
      title: 'Oops...',
      text: '{{ session()->get('RegistrationError') }}',
  });
</script>
@endif
@if(session()->has('WalkInSuccess'))
<script>
  swal.fire({
      title: "{{ session()->get('WalkInSuccess') }}",
      button:"Ok"
  });
</script>
@endif
@if(session()->has('walkinPaymentUpdate'))
<script>
  swal.fire({
      title: "{{ session()->get('walkinPaymentUpdate') }}",
      button:"Ok"
  });
</script>
@endif
@stop