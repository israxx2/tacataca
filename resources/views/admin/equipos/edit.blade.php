@extends('admin.template.main')

@section('title', 'Editar Equipo') 



@section('content')

{!! Form::open(['route' => ['admin.equipo.update', $equipo->id] , 'method' => 'PUT']) !!}

    <div class="form-group">
      {!! Form::label('nombre', 'Nombre Equipo') !!}
      {!! Form::input('text', 'nombre', $equipo->nombre, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la modalidad...', 'required']) !!}
    </div>


    <div class="form-group">
      {!! Form::label('torneos_ganados', 'Torneos ganados') !!}
      {!! Form::input('number', 'torneos_ganados', $equipo->torneos_ganados, ['class' => 'form-control', 'min' => 00, 'max' => 59, 'required']) !!}
    </div>
    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection