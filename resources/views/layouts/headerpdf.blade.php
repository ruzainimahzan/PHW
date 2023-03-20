<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<link rel="stylesheet" href="{{ public_path('bootstrap/css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">

		<style>
			.borderless tbody td,.borderless tbody tr{
				border: 5 !important;
			}

			hr.style1{
	border-top: 1px solid #8c8b8b;
}

		</style>
	</head>
	<body>
		<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-4">
				<img style="height: 8cm;width: 6cm;margin-top:-40px;" src="{{ public_path('images/passionate.jpg') }}" />
			</div>
			<div class="col-md-8">
			<br>
			<br>
				<table border=0>
				<tr>
					<td colspan=2>
					<h1><b>"Trust us we are Passionate"</b></h1>
					<td>
				</tr>
				<tr>
					<td width="350px">
						22-01, Jalan Setia Tropika 1/1, Setia Tropika,<br>
						81200 Johor Bahru, Johor Darul Ta'zim
					</td>
					<td>
						<b>TEL :</b> 07-2441227 <br>
						<b>NO H/P :</b> 018-2987901
					</td>
				</tr>
				<tr>
					<td colspan=2>
						<b>EMAIL :</b>passionatehealthandwellcare@gmail.com
					<td>
				</tr>
				</table>
			</div>
		</div>
	
		</div>
		@yield('container')
	</body>
	</html>