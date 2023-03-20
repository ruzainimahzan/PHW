@extends('layouts.headerpdf')

@section('container')

@if( $data != null )
<center><u><b>S-O-A-P METHOD FORM</b></u></center>
<br><br>
<p>Name: {{ $userdiagnose->fullname_patients }} </p>
@php( $i = 1 )
@foreach( $data as $list )
<div style="page-break-inside: avoid;">
{{ date("d-m-Y",strtotime($list->date_method)).' ('.$i++.'/'.count($data).')' }}

<table class="table table-bordered">
  <tbody>
    <tr>
      <td width="5%">S</td>
      <td width="95%">{!! nl2br($list->s_method) !!}</td>
    </tr>
    <tr>
      <td>O</td>
      <td>{!! nl2br($list->o_method) !!}</td>
    </tr>
    <tr>
      <td>A</td>
      <td>{!! nl2br($list->a_method) !!}</td>
    </tr>
    <tr>
      <td>P</td>
      <td>{!! nl2br($list->p_method) !!}</td>
    </tr>
  </tbody>
</table>
</div>
@endforeach
@endif
@endsection