@extends('admin.template.main')

@section('title', 'equipos') 

@section('content')

<br>	
<hr>
<div class="table-responsive">
	<table class="table table-striped display compact table-condensed" id="table_equipo">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre del Equipo</th>
		<th>Elo</th>
		<th>Juegos2v2</th>
		<th>Estado</th>
		<th>Detalles</th>		
		<th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($equipos as $equipo)
        <tr>
          <td>{{ $equipo->id }}</td>
          <td>{{ $equipo->nombre }}</td>
          <td>{{ $equipo->elo }}</td>
          <td>{{ $equipo->juegos_totales_2v2 }}</td>
          <td>
          	@if($equipo->deleted_at == null)
          		<p href="#" class="btn btn-success">
					Activo
				</p>
          	@else
				<p href="#" class="btn btn-danger" data-toggle="modal" data-target="#activar{{ $equipo->id }}">
					inactivo
				</p>
          	@endif
          </td>
			<td>
				<a href="{{ '/admin/equipo/'.$equipo->id  }}" class="btn btn-info">
					<i class="fas fa-book"></i>
				</a>
			</td>
			<td>
			@if($equipo->deleted_at == null)
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $equipo->id }}">
	        		<i class="fas fa-trash-alt"></i>
				</button>
	      	@else
	      		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $equipo->id }}" disabled>
	        		<i class="fas fa-trash-alt"></i>
				</button>
	      	@endif
				
			</td>
        </tr>
			
				<!-- Modal Delete-->
				<div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $equipo->id }}" style="top:20%;">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Borrar equipo {{ $equipo->id }}</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p>¿Estás seguro de borrar el equipo?</p>
				      </div>
				      <div class="modal-footer">
				      	{!! Form::open(['route' => ['admin.equipo.destroy', $equipo->id] , 'method' => 'DELETE']) !!}
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

				<!-- Modal Activar-->
				<div class="modal" tabindex="-1" role="dialog" id = "activar{{ $equipo->id }}" style="top:20%;">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Activar equipo {{ $equipo->id }}</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p>¿Estás seguro de volver a activar la equipo?</p>
				      </div>
				      <div class="modal-footer">
				      	{!! Form::open(['route' => ['admin.equipo.activar', $equipo->id] , 'method' => 'POST']) !!}
				        	<button type="submit" class="btn btn-success">
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
    	$('#table_equipo').DataTable({
    		"language":{
    			"url":"{{ asset('Spanish.json') }}"
    		}
    	});
	} );
</script>

@endsection
