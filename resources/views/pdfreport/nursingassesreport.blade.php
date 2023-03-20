@extends('layouts.headerpdf')

@section('container')

<center><u><b>ASSESSMENT FORM</b></u></center>
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
<p></p>
<div style="margin-left: 200px;margin-right: 200px;padding: 10px;text-align: center;font-weight: 700;">Nursing Assessment/Progression Form</div>
<div style="text-align: center;padding-top: 50px">
	<center>
		<img style="height: 8cm;width: 8cm;margin-top: 10px;" src="{{ public_path('images/body.jpg') }}" />
	</center>
</div>
</br>
<table class="table">
	<tr>
		<td width="70%">
			<p style="text-decoration: underline;font-weight: 700;">Remark</p>
			<p>{{ $list->remarks }}</p>
		</td>
		<td width="30%">
			<p style="font-weight: 700;">Nurse Incharge</p>
			<p style="padding-bottom: 30px;">Name&Signature</p>
		</td>
	</tr>
</table>

@endforeach
@endif
@endsection