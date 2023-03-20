@extends('layouts.headerpdf')

@section('container')

<center><u><b>Nursing Daily Report</b></u></center>
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
    @php
    $date = '';
    $date = strtotime($list->date_daily_report);
    @endphp
    @if( $date != '' )
<div style="margin-bottom:60px;">{!! $list->remarks !!}</div>


@endif
@endforeach
@endif
@endsection