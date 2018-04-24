@extends('admin.template.main')

@section('title', 'partidos') 

@section('content')

<br>	
<hr>
<div class="table-responsive">
	<table class=class="table table-striped display compact table-condensed" id="table_partidoSingle">
    <thead>
      <tr>
        <th>ID</th>
		<th>Jugador1</th>
		<th>Jugador2</th>
		<th>Arbitro</th>
		<th>Detalles</th>
		<th>Eliminar</th>
      </tr>
    </thead>
    <tbody>

      @foreach($partidos as $partido)
        <tr>
    		<td>{{ $partido->id }}</td>

	    	@foreach($partido->users as $user)
	    		<td>{{ $user->nombres.' '.$user->apellidos }}</td>
	    	@endforeach

				<td>{{ $partido->albitro->nombres.' '.$partido->albitro->apellidos }}</td>

			<td>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#detalles{{ $partido->id }}">
	        		<i class="fas fa-book"></i>
				</button>
			</td>

			<td>
	      		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $partido->id }}">
	        		<i class="fas fa-book"></i>
				</button>					
			</td>
        </tr>
			
				<!-- Modal Detalles-->
				<div class="modal" tabindex="-1" role="dialog" id = "detalles{{ $partido->id }}" style="top:20%;">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Detalles del Partido</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	@foreach($partido->users as $detallePartido)
				      		<ul class="list-group list-group-flush">
							  <li class="list-group-item list-group-item-primary">{{ $detallePartido->nombres.' '.$detallePartido->apellidos }}</li>
							  <li class="list-group-item">Goles: {{ $detallePartido->pivot->goles }}</li>
							  <li class="list-group-item">Resultado: {{ $detallePartido->pivot->resultado }}</li>
							  <li class="list-group-item">Medallas: {{ $detallePartido->pivot->elo }}</li>
							</ul>
				      	@endforeach    
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">
				        	<i class="fas fa-times" aria-hidden="true"></i>
				        </button>
				      </div>
				    </div>
				  </div>
				</div>

				<!-- Modal Activar-->
				<div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $partido->id }}" style="top:20%;">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Borrar partido {{ $partido->id }}</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">				        
				        <p>Los jugadores retornarán sus medallas correspondientes.</p>
				        <p>¿Está seguro de borrar el partido?</p>
				      </div>
				      <div class="modal-footer">
				      	{!! Form::open(['route' => ['admin.partidoSingle.destroy', $partido->id] , 'method' => 'DELETE']) !!}
				        	<button type="submit" class="btn btn-danger">
	                          <i class="fas fa-check" aria-hidden="true"></i>
	                        </button>
				        {!! Form::close() !!}
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">
				        	<i class="fas fa-times" aria-hidden="true"></i>
				        </button>
				      </div>
				    </div>
				  </div>
				</div>
      @endforeach
    </tbody>
  </table>

</div>
<script>
		$(document).ready( function () {
				$('#table_partidoSingle').DataTable({
					"language":{
						"url":"{{ asset('Spanish.json') }}"
					}
				});
		} );
	</script>

@endsection
