@extends('layouts.headerpdf')

@section('container')

<center><u><b>MONTHLY SUMMARY REPORT</b></u></center>
<br><br>
<table class="table">
 <tbody>
   <tr>
     <td width="5%" class="noBorderTop">Name:</td>
     <td width="20%" class="noBorderTop borderBtmBlack">{{ $user->fullname_patients}}</td>
     <td width="5%" class="noBorderTop">Age:</td>
     <td width="10%" class="noBorderTop borderBtmBlack">{{ $user->age }}</td>
     <td width="5%" class="noBorderTop">Sex:</td>
     <td width="5%" class="noBorderTop">{{ $user->gender }}</td>
     <td width="5%" class="noBorderTop">R/N</td>
     <td width="5%" class="noBorderTop borderBtmBlack">{{ $user->reference_no }}</td>
     <td width="5%" class="noBorderTop">Date:</td>
     <td width="20%" class="noBorderTop borderBtmBlack">{{ date('d-m-Y', strtotime(now()))  }}</td>
   </tr>
 </tbody>
</table>


@if( $data != null )
@foreach( $data as $list )
<table class="table">
	<tr>
    <td>
		<!-- <p class="text-center" style="font-weight: 700;">MONTHLY SUMMARY REPORT</p> -->
      <div>
        <p><span>MONTH</span>  : {{ $list->month }}</p>
        <!-- <p><span>DATE</span>   : {{ $list->date_monthly_report }}</p> -->
        <p style="padding-top: 40px;border-bottom: 1px solid black;">
          {!! $list->remarks !!}
        </p>
      <div>
      <div style="width: 40%;float: right;padding-top: 30px;">
        <p style="font-weight: 700;">NURSE INCHARGE</p>
        <p style="padding-top: 40px;">( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</p>
      </div>
      </div>
    </td>
  </tr>

</table>
@endforeach
@endif
@endsection