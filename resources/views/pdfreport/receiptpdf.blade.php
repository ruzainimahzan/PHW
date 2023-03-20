@extends('layouts.headerpdfNoHeader')

@section('container')
@if( $data != null )
@php
$i = 1;
@endphp
<div style="border: 1px solid black;">
	<div style="padding: 30px;">
		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-2">
					<img style="height: 4cm;width: 3cm;margin-top:-40px;" src="{{ public_path('images/passionate.jpg') }}" />
				</div>
				<div class="col-xs-8">
			
					<p style="font-weight: 800;text-align: center;">PASSIONATE HOME PHYSIOTHERAPY SERVICE (JM 0747631-D)</p>
					<p style="font-weight: 800;text-align: center;margin-left:15px;">22-01 Jalan Setia Tropika 1/1, Taman Setia Tropika, 81200 Johor Bahru, Johor</p>
					<p  style="font-weight: 800;text-align: center;"><strong>Tel</strong>: 07-2441227&nbsp;&nbsp;&nbsp;<strong>Email</strong>: passionatehealthandwellcare@gmail.com</p>
			
				</div>
				<div class="col-xs-2">
					<p style="font-weight: 800;text-align: center;background: #000;color: white;">CASH SALE</p>
					<p>No. {{ $data{0}->reference_no }}</p>
				</div>
			</div>
		</div>
		<table class="table borderless" style="margin-bottom: 20px;">
			<tbody>
				<tr>
					<td width="10%">M/S:</td>
					<td width="40%">{{ $user->fullname_patients }}</td>
					<td width="10%">No Tel:</td>
					<td width="25%">{{ $user->phone_number }}</td>
					<td width="5%">Date:</td>
					<td width="10%">{{ date("d.m.Y") }}</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered" style="border-left: 0;border-bottom: 0;">
			<thead>
				<tr>
					<th width="5%" style="text-align: center;background: #000;color: white;">No.</th>
					<th width="55%" style="text-align: center;background: #000;color: white;">Services</th>
					<th width="20%" style="text-align: center;background: #000;color: white;">Diagnose</th>
					<th width="20%" style="text-align: center;background: #000;color: white;">Amount RM</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $sl)
				@php
				$showdiagnose = true;
				@endphp
				@if(count($service))
				@foreach($service as $key => $val)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $val }}</td>
					<td>
						@if($showdiagnose)
						{{ $sl->doctor_diagnose }}
						@php
						$showdiagnose = false;
						@endphp
						@endif
					</td>
					<td>{{-- $sl->payment_paid --}}</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td>{{ $i++ }}</td>
					<td></td>
					<td>
						@if($showdiagnose)
						{{ $sl->doctor_diagnose }}
						@php
						$showdiagnose = false;
						@endphp
						@endif
					</td>
					<td>{{-- $sl->payment_paid --}}</td>
				</tr>
				@endif
				<tr>
					<td colspan="2" style="border: 0;"></td>
					<td style="border: 0;">Total</td>
					<td>{{ $sl->total_payment }}</td>
				</tr>
				<tr>
					<td colspan="2" style="border: 0;"></td>
					<td style="border: 0;">Deposit</td>
					<td>{{ $sl->payment_paid }}</td>
				</tr>
				<tr>
					<td colspan="2" style="border: 0;"></td>
					<td style="border: 0;">Balance</td>
					<td>{{ $sl->balance_payment }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<table class="table borderless">
			<tbody>
				<tr>
					<td width="30%">........................................</td>
					<td width="30%">........................................</td>
					<td width="20%" style="text-align: right;">THANK YOU!</td>
				</tr>
				<tr>
					<td>Issue By</td>
					<td>Received By</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@php
$i = 1;
@endphp
<div style="border: 1px solid black;margin-top: 50px;">
	<div style="padding: 30px;">
		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-2">
					<img style="height: 4cm;width: 3cm;margin-top:-40px;" src="{{ public_path('images/passionate.jpg') }}" />
				</div>
				<div class="col-xs-8">
			
					<p style="font-weight: 800;text-align: center;">PASSIONATE HOME PHYSIOTHERAPY SERVICE (JM 0747631-D)</p>
					<p style="font-weight: 800;text-align: center;margin-left:15px;">22-01 Jalan Setia Tropika 1/1, Taman Setia Tropika, 81200 Johor Bahru, Johor</p>
					<p  style="font-weight: 800;text-align: center;"><strong>Tel</strong>: 07-2441227&nbsp;&nbsp;&nbsp;<strong>Email</strong>: passionatehealthandwellcare@gmail.com</p>
			
				</div>
				<div class="col-xs-2">
					<p style="font-weight: 800;text-align: center;background: #000;color: white;">CASH SALE</p>
					<p>No. {{ $data{0}->reference_no }}</p>
				</div>
			</div>
		</div>
		<table class="table borderless" style="margin-bottom: 20px;">
			<tbody>
				<tr>
					<td width="10%">M/S:</td>
					<td width="40%">{{ $user->fullname_patients }}</td>
					<td width="10%">No Tel:</td>
					<td width="25%">{{ $user->phone_number }}</td>
					<td width="5%">Date:</td>
					<td width="10%">{{ date("d.m.Y") }}</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered" style="border-left: 0;border-bottom: 0;">
			<thead>
				<tr>
					<th width="5%" style="text-align: center;background: #000;color: white;">No.</th>
					<th width="55%" style="text-align: center;background: #000;color: white;">Services</th>
					<th width="20%" style="text-align: center;background: #000;color: white;">Diagnose</th>
					<th width="20%" style="text-align: center;background: #000;color: white;">Amount RM</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $sl)
				@php
				$showdiagnose = true;
				@endphp
				@if(count($service))
				@foreach($service as $key => $val)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $val }}</td>
					<td>
						@if($showdiagnose)
						{{ $sl->doctor_diagnose }}
						@php
						$showdiagnose = false;
						@endphp
						@endif
					</td>
					<td>{{-- $sl->payment_paid --}}</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td>{{ $i++ }}</td>
					<td></td>
					<td>
						@if($showdiagnose)
						{{ $sl->doctor_diagnose }}
						@php
						$showdiagnose = false;
						@endphp
						@endif
					</td>
					<td>{{-- $sl->payment_paid --}}</td>
				</tr>
				@endif
				<tr>
					<td colspan="2" style="border: 0;"></td>
					<td style="border: 0;">Total</td>
					<td>{{ $sl->total_payment }}</td>
				</tr>
				<tr>
					<td colspan="2" style="border: 0;"></td>
					<td style="border: 0;">Deposit</td>
					<td>{{ $sl->payment_paid }}</td>
				</tr>
				<tr>
					<td colspan="2" style="border: 0;"></td>
					<td style="border: 0;">Balance</td>
					<td>{{ $sl->balance_payment }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<table class="table borderless">
			<tbody>
				<tr>
					<td width="30%">........................................</td>
					<td width="30%">........................................</td>
					<td width="20%" style="text-align: right;">THANK YOU!</td>
				</tr>
				<tr>
					<td>Issue By</td>
					<td>Received By</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@endif
@endsection