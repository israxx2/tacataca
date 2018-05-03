<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Taca-Taca UCM</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Video responsive -->
  <link rel="stylesheet" type="text/css"  href="{{ asset('css/video.css') }}">

  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css"  href="{{ asset('css/bootstrap.css') }}">
  <script defer src="{{ asset('svg-with-js/js/fontawesome-all.js') }}"></script>

  <!-- Stylesheet
      ================================================== -->
  <link rel="stylesheet" type="text/css"  href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/nivo-lightbox/nivo-lightbox.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/nivo-lightbox/default.css') }}">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
@if(!Auth::check())
  <nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand page-scroll" href="#page-top"><i class="fas fa-futbol" style="color: #cfdaf1;"></i> Taca-taca UCM</a> </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ route('login') }}" class="page-scroll">Iniciar sesion</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container-fluid --> 
  </nav>
@else
  <nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top"><i class="fas fa-futbol" style="color: #cfdaf1;"></i> Taca-taca UCM</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/logout') }}" class="page-scroll" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Salir</a></li>
      </ul>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
@endif

<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="container">
      <div class="row">
        <div class="intro-text">
          <h2><font color="#54d0dd">2° EDICIÓN LIGA TACA-TACA UCM 2018</font></h2>
          <p>Las expectativas no son nada. La voluntad y las ganas de participar lo es todo</p>
          <a href="#about" class="btn btn-custom btn-lg page-scroll">Leer más</a> </div>
      </div>
    </div>
  </div>
</header>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="section-title text-center center">
      <h2>Sobre nosotros</h2>
      <hr>
    </div>
        <div class="about-text">
          <p>Proyecto correspondiente a la segunda edición de la Liga Taca – Taca UCM 2018, en el cual se describe el modo de juego de Singles y Dobles, en ambos torneos se utilizarán el mismo formato de juego, utilizando sistema de ELO en función de hacer el torneo más justo, los puntos serán reemplazados por medallas ganadas, estas reflejarán la habilidad de cada jugador, todos los jugadores iniciaran con un puntaje base de 800 medallas. Además existirá un espacio en donde los jugadores podrán competir en duelos para disputar medallas.</p>
          <p>Como novedad en los partidos existirá la posibilidad de ir a penales y empates.
          Los torneos se llamaran mundialitos, su inscripción será voluntaria al comienzo y en el transcurso de la Liga. Se debe entender que tanto jugadores como equipos deben buscar todos los puntos posibles en cada partido, para buscar como objetivo principal entrar en los 8 mejores de la clasificación en la fase regular. Los puntos lo podrán ir a buscar en cada mundialitos o duelos.
          </p>
          <p>Los 8 mejores competidores jugaran la fase final, llamada play off, tanto jugadores como equipos llegaran en condiciones iguales, con las mismas probabilidades de ganar, pues ya no se considerarán los puntos ganados en la primera fase.
          </p>
          <center>
          <div class="embed-container">
            <iframe width="854" height="480" src="https://www.youtube.com/embed/VngKT7-UDys" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
          </center>
          
  </div>
</div>

<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>