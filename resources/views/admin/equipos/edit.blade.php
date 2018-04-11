@extends('admin.template.main')

@section('title', 'Nuevo Jugador') 



@section('content')

{!! Form::open(['route' => ['admin.modalidad.update', $modalidad->id] , 'method' => 'PUT']) !!}

    <div class="form-group">
    {!! Form::label('nombre', 'Modalidad') !!}
    {!! Form::input('text', 'nombre', $modalidad->nombre, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la modalidad...', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('descripcion', 'Descripción') !!}
    {!! Form::input('text', 'descripcion', $modalidad->descripcion, ['class' => 'form-control', 'placeholder' => 'Escriba una breve descripción de la modalidad...', 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection