<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>@yield('title', 'Default') | Panel de Administración</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link href="{{ asset('fonts/medalla/style.css') }}" rel="stylesheet">

<!-- CSS Files -->
<link href={{ asset('estudiante_public/css/bootstrap.min.css') }} rel="stylesheet" />
<link href={{ asset('estudiante_public/css/now-ui-dashboard.css?v=1.0.1') }} rel="stylesheet" />

<!--   Core JS Files   -->
<script src={{ asset('estudiante_public/js/core/jquery.min.js') }}></script>
<script src={{ asset('estudiante_public/js/core/popper.min.js') }}></script>
<script src={{ asset('estudiante_public/js/core/bootstrap.min.js') }}></script>
<script src={{ asset('estudiante_public/js/plugins/perfect-scrollbar.jquery.min.js') }}></script>

<!-- Chart JS -->
<script src={{ asset('estudiante_public/js/plugins/chartjs.min.js') }}></script>
<!--  Notifications Plugin    -->
<script src={{ asset('estudiante_public/js/plugins/bootstrap-notify.js') }}></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src={{ asset('estudiante_public/js/now-ui-dashboard.js?v=1.0.1') }}></script>



</head>
<body class="">
    <div class="wrapper">
        @include('estudiante.template.partials.nav_lateral')
        
        <div class="main-panel">
            @include('estudiante.template.partials.nav_superior')
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>