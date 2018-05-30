@extends('admin.template.main')

@section('title', 'Usuarios') 



@section('content')

<br>
<hr>

<div class="container">
	
	<ul class="list-group list-group-flush">
	  <li class="list-group-item list-group-item-dark">
		<div class="d-flex justify-content-between">
			<h4>DATOS DEL EQUIPO:</h4>
			<a href="{{ '/admin/equipo/'.$equipo->id.'/edit' }}" class="btn btn-warning">
				<i class="far fa-edit"></i>
			</a>
		</div>  	
	  </li>
	  <li class="list-group-item"><b>ID: </b>#{{ $equipo->id }}</li>
	  <li class="list-group-item"><b>NOMBRE: </b>{{ $equipo->nombre }}</li>
	  <li class="list-group-item"><b>ELO: </b>{{ $equipo->elo }}</li>
	  
	  @foreach($equipo->users as $user)
	  	<li class="list-group-item"><b>JUGADOR(A): </b>
	  		<a class="btn btn-link" href="{{ '/admin/user/'.$user->id }}">{{ $user->nombres.' '.$user->apellidos }}</a>
	  	
		</li>
	  @endforeach
	  
	  <li class="list-group-item list-group-item-dark"><h4>DATOS DE JUEGO:</h1></li>
	  <li class="list-group-item"><b>VICTORIA(S) DUELO(S): </b>{{ $equipo->v_duelos_2v2 }}</li>
	  <li class="list-group-item"><b>VICTORIA(S) TORNEO(S): </b>{{ $equipo->v_torneos_2v2 }}</li>
		<li class="list-group-item"><b>JUEGOS TOTALES: </b>{{ $equipo->juegos_totales_2v2 }}</li>
		<li class="list-group-item"><b>TORNEOS GANADOS: </b>{{ $equipo->torneos_ganados }}</li>
	</ul>
</div>

@endsection
