@extends('admin.template.main')

@section('title', 'Editar Evento') 



@section('content')

{!! Form::open(['route' => ['admin.evento.update', $evento->id] , 'method' => 'PUT']) !!}

    <div class="form-group">
    {!! Form::label('nombre', 'Nombre del Evento') !!}
    {!! Form::input('text', 'nombre', $evento->nombre, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del evento...', 'required']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('modalidad_id', 'Modalidad') !!}
      {!! Form::select('modalidad_id', $modalidades, $evento->modalidad_id, ['class' => 'form-control', 'placeholder' => 'Modalidad', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('descripcion', 'Descripción del Evento') !!}
    {!! Form::input('text', 'descripcion', $evento->descripcion, ['class' => 'form-control', 'placeholder' => 'Escriba una breve descripción del evento...']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('fecha', 'Fecha del Evento:') !!}
    </div>
    <div class="form-group">
    {!! Form::label('mes', 'Mes') !!}
    {!! Form::input('text', 'mes', $fecha[1], ['class' => 'form-control', 'placeholder' => 'ej: 05']) !!}
    </div>
    
    <div class="form-group">
    {!! Form::label('dia', 'Dia') !!}
    {!! Form::input('text', 'dia', $fecha[2], ['class' => 'form-control', 'placeholder' => 'ej: 28']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('fecha', 'Fecha del Evento:') !!}
    </div>

    <div class="form-group">
    {!! Form::label('hora', 'Hora') !!}
    {!! Form::input('number', 'hora', $hora[0], ['class' => 'form-control', 'placeholder' => 'ej: 14', 'min' => 00, 'max' => 23, 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('min', 'Minuto') !!}
    {!! Form::input('number', 'min', $hora[1], ['class' => 'form-control', 'placeholder' => 'ej: 35', 'min' => 00, 'max' => 59, 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection