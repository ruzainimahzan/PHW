@extends('layouts.headerpdf')

@section('container')
<center><u><b>PATIENT'S ATTENDANCE</b></u></center>
<br><br>
<table class="table borderless">
  <tbody>
    <tr>
      <td valign="top" width="10%">NAME:</td>
      <td valign="top" width="40%">{{$userdiagnose->fullname_patients }}</td>
      <td valign="top" width="10%">DIAGNOSE:</td>
      <td valign="top" width="40%">{{ $userdiagnose->doctor_diagnose }}</td>
    </tr>
    <tr>
      <td valign="top" width="10%">IC NO:</td>
      <td valign="top" width="40%">{{ $userdiagnose->ic_patients }}</td>
      <td valign="top" width="10%">TOTAL SESSIONS:</td>
      <td valign="top" width="40%">{{ count($data) }}</td>
    </tr>
    <tr>
      <td valign="top" width="10%">PHONE NO:</td>
      <td valign="top" width="40%">{{ $userdiagnose->phone_number }}</td>
      <td valign="top" width="10%">ADDRESS:</td>
      <td valign="top" width="40%">{{ $userdiagnose->address_patients }}</td>
    </tr>
  </tbody>
</table>
<table id="" class="table table-bordered table-striped display nowrap display nowrap">
  <thead>
    <tr>
      <th>BIL</th>
      <th>Date</th>
      <th>TIME IN</th>
      <th>TIME OUT</th>
      <th>THERAPIST SIGN</th>
      <th>PT SIGN</th>
      <th>AMOUNT</th>
    </tr>
  </thead>
  <tbody>
    @if( $data != null )
    @php( $i = 1 )
    @foreach( $data as $list )
    <tr>
      <td>{{ $i++ }}</td>
      <td>{{ $list->date_treatment }}</td>
      <td>{{ $list->time_in }}</td>
      <td>{{ $list->time_out }}</td>
      <td>{{ $list->treatment_therapist }}</td>
      <td>{{ $list->id_patients }}</td>
      <td>{{ number_format((float)$list->treatment_amount, 2, '.', '') }}</td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
@endsection