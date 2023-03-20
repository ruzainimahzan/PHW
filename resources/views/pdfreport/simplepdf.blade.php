@extends('layouts.headerpdf')

@section('container')
@if( $data != null )
@php($i = 1)
@foreach( $data as $list )
{{ date("d M Y",strtotime($list->report_date)).' ('.$i++.'/'.count($data).')' }} 
<p style="font-weight: 700">Simple Report</p>
<div style="margin-bottom:60px;">{{ $list->report_description }}</div>
@endforeach
@endif
@endsection