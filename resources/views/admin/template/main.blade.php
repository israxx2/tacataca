<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'Default') | Panel de Administración</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css"  href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<script type="text/javascript" src="{{ asset('js/jquery.1.11.1.js') }}"></script> 
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.js') }}"></script> 
<script defer src="{{ asset('svg-with-js/js/fontawesome-all.js') }}"></script>
<script defer src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


</head>
<body>

@include('admin.template.partials.nav')

<div class="container-fluid">
@yield('content')

</div>

</body>

</html>