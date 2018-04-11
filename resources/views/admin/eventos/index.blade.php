@extends('admin.template.main')

@section('title', 'eventos') 

@section('content')

<br>	
<hr>
<div class="table-responsive">
	<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombres</th>
		<th>Descripción</th>
		<th>Fecha</th>
		<th>Hora</th>
		<th>Creador</th>
		<th>Estado</th>
		<th>Partidos</th>
		<th>Editar</th>
		<th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($eventos as $evento)
        <tr>
          <td>{{ $evento->id }}</td>
          <td>{{ $evento->nombre }}</td>
          <td>{{ $evento->descripcion }}</td>
          <td>{{ $evento->fecha }}</td>
          <td>{{ $evento->hora }}</td>
          <td>{{ $evento->user->nombres.' '.$evento->user->apellidos }}</td>
          <td>
          	@if($evento->deleted_at == null)
          		<p href="#" class="btn btn-success">
					Activo
				</p>
          	@else
				<p href="#" class="btn btn-danger" data-toggle="modal" data-target="#activar{{ $evento->id }}">
					inactivo
				</p>
          	@endif
          </td>

          <td>
				<a href="{{ '/admin/evento/partidos/'.$evento->id }}" class="btn btn-info">
					<i class="fas fa-book"></i>
				</a>
			</td>

			<td>
				<a href="{{ '/admin/evento/'.$evento->id.'/edit' }}" class="btn btn-warning">
					<i class="fas fa-edit"></i>
				</a>
			</td>
			
			<td>
			@if($evento->deleted_at == null)
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $evento->id }}">
	        		<i class="fas fa-trash-alt"></i>
				</button>
	      	@else
	      		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $evento->id }}" disabled>
	        		<i class="fas fa-trash-alt"></i>
				</button>
	      	@endif
				
			</td>
        </tr>
			
				<!-- Modal Delete-->
				<div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $evento->id }}" style="top:20%;">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Borrar evento {{ $evento->id }}</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p>¿Estás seguro de borrar el evento?</p>
				      </div>
				      <div class="modal-footer">
				      	{!! Form::open(['route' => ['admin.evento.destroy', $evento->id] , 'method' => 'DELETE']) !!}
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
				<div class="modal" tabindex="-1" role="dialog" id = "activar{{ $evento->id }}" style="top:20%;">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Activar evento {{ $evento->id }}</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p>¿Estás seguro de volver a activar la evento?</p>
				      </div>
				      <div class="modal-footer">
				      	{!! Form::open(['route' => ['admin.evento.activar', $evento->id] , 'method' => 'POST']) !!}
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
<center>
{{ $eventos->links() }}
</center>
</div>


@endsection
