@extends('admin.template.main')

@section('title', 'Nuevo Jugador') 



@section('content')

{!! Form::open(['route' => ['admin.carrera.update', $carrera->id] , 'method' => 'PUT']) !!}

    <div class="form-group">
    {!! Form::label('nombre', 'Nombre Carrera') !!}
    {!! Form::input('text', 'nombre', $carrera->nombre, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la carrera...', 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection