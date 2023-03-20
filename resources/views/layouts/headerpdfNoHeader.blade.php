<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<link rel="stylesheet" href="{{ public_path('bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
	
	<style>
		.borderless tbody td,.borderless tbody tr{
			border: 0 !important;
		}

		hr.style1{
			border-top: 1px solid #8c8b8b;
		}

	</style>
</head>
<body>
	
	@yield('container')
</body>
</html>