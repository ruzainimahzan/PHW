@extends('layouts.headerpdf')

@section('container')
@php
$i = 1;
@endphp
@if( $data != null )
<h1 style="text-align: center;">Yearly Report : ({{  $datepicer_year_start }})  @if($datepicer_year_end != "") - ({{ $datepicer_year_end }}) @endif</h1>
<br>
<br>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>IC</th>
      <th>Phone Number</th>
      <th>Diagnose</th>
      <th>Treatment</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
  <?php $treatment_amount = 0 ?>
    <?php $total_payment = 0 ?>
    @foreach($data as $list)
    <tr>
      <td>{{ $i++ }}</td>
      <td>{{ $list->fullname_patients }}</td>
      <td>{{ $list->ic_patients }}</td>
      <td>{{ $list->phone_number }}</td>
      <td>{{ $list->doctor_diagnose }}</td>
      <td>
      <?php
        $idsessiontypejson = json_decode($list->id_type_session, true);
 
        $data1 = \App\Models\Type_Session::whereIn('id_type_sessions',$idsessiontypejson)->get();
        $lol = "";
        foreach($data1 as $dt){
          echo $dt->name_type_sessions.'<br>';
        }
      ?>
      </td>
      <td>@if($list->treatment_amount == null) {{ $list->total_payment }} @else  {{ $list->treatment_amount }} @endif</td>
    </tr>
    <?php $treatment_amount += $list->treatment_amount; ?>
    <?php $total_payment += $list->total_payment; ?>
    @endforeach
    <tr>
    <td colspan="7" style="text-align:right;">Total Walkin : <b>RM @if($list->treatment_amount == null) {{ $total_payment }} @else  {{ $treatment_amount }} @endif </b></td>
    </tr>
  </tbody>
</table>
@endif
@endsection