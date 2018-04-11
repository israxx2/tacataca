@extends('admin.template.main')

@section('title', 'Modalidades') 

@section('content')

<br>	
<hr>
<div class="table-responsive">
	<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Modalidad</th>
		<th>Descripción</th>
		<th>Estado</th>
		<th>Editar</th>		
		<th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($modalidades as $modalidad)
        <tr>
          <td>{{ $modalidad->id }}</td>
          <td>{{ $modalidad->nombre }}</td>
          <td>{{ $modalidad->descripcion }}</td>
          <td>
          	@if($modalidad->deleted_at == null)
          		<p href="#" class="btn btn-success">
					Activo
				</p>
          	@else
				<p href="#" class="btn btn-danger" data-toggle="modal" data-target="#activar{{ $modalidad->id }}">
					inactivo
				</p>
          	@endif
          </td>
			<td>
				<a href="{{ '/admin/modalidad/'.$modalidad->id.'/edit' }}" class="btn btn-info">
					<i class="fas fa-book"></i>
				</a>
			</td>
			<td>
			@if($modalidad->deleted_at == null)
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $modalidad->id }}">
	        		<i class="fas fa-trash-alt"></i>
				</button>
	      	@else
	      		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy{{ $modalidad->id }}" disabled>
	        		<i class="fas fa-trash-alt"></i>
				</button>
	      	@endif
				
			</td>
        </tr>
			
				<!-- Modal Delete-->
				<div class="modal" tabindex="-1" role="dialog" id = "destroy{{ $modalidad->id }}" style="top:20%;">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Borrar modalidad {{ $modalidad->id }}</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p>¿Estás seguro de borrar la modalidad?</p>
				      </div>
				      <div class="modal-footer">
				      	{!! Form::open(['route' => ['admin.modalidad.destroy', $modalidad->id] , 'method' => 'DELETE']) !!}
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
				<div class="modal" tabindex="-1" role="dialog" id = "activar{{ $modalidad->id }}" style="top:20%;">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">Activar modalidad {{ $modalidad->id }}</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p>¿Estás seguro de volver a activar la modalidad?</p>
				      </div>
				      <div class="modal-footer">
				      	{!! Form::open(['route' => ['admin.modalidad.activar', $modalidad->id] , 'method' => 'POST']) !!}
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
{{ $modalidades->links() }}
</center>
</div>


@endsection
