@extends('layouts.headerpdf')

@section('container')

<center><u><b>ORTHOPAEDIC FORM (Joint Movement)</b></u></center>
<br><br>
<table class="table">
 <tbody>
   <tr>
     <td width="5%" class="noBorderTop">Name:</td>
     <td width="20%" class="noBorderTop borderBtmBlack">{{ $userdiagnose->fullname_patients }}</td>
     <td width="5%" class="noBorderTop">Age:</td>
     <td width="10%" class="noBorderTop borderBtmBlack">{{ $userdiagnose->age }}</td>
     <td width="5%" class="noBorderTop">Sex:</td>
     <td width="5%" class="noBorderTop">{{ $userdiagnose->gender }}</td>
     <td width="5%" class="noBorderTop">R/N</td>
     <td width="5%" class="noBorderTop borderBtmBlack"></td>
     <td width="5%" class="noBorderTop">Date:</td>
     <td width="20%" class="noBorderTop borderBtmBlack">{{ date('d-m-Y', strtotime(now()))  }}</td>
   </tr>
 </tbody>
</table>

<table class="table table-bordered" style="padding-top: 80px;">
 <tr>
   <td colspan="4" class="noBorderBottom">MOVEMENT</td>
 </tr>
 <tr>
   <td width="25%" class="">JOINT</td>
   <td width="25%" class="">ACTIVE</td>
   <td width="25%" class="">PASSIVE</td>
   <td width="25%" class="">OVERPRESSURE</td>
 </tr>
 @if( $data != null )
@foreach( $data as $list )
 <tr>
   <td class="">{{ $list->name_joints }}</td>
   <td class="">@if( $list->status_joints == 'Active' ){!! nl2br($list->remark_joints) !!}@endif</td>
   <td class="">@if( $list->status_joints == 'Passive' ){!! nl2br($list->remark_joints) !!}@endif</td>
   <td class="">@if( $list->status_joints == 'Overpressure' ){!! nl2br($list->remark_joints) !!}@endif</td>
 </tr>
 @endforeach
 @else
 <tr>
   <td rowspan="4" class="noBorderTop noBorderRight"></td>
   <td rowspan="4" class="noBorderTop noBorderRight noBorderLeft"></td>
   <td rowspan="4" class="noBorderTop noBorderRight noBorderLeft"></td>
   <td rowspan="4" class="noBorderTop noBorderLeft"></td>
 </tr>
 @endif
</table>

@endsection