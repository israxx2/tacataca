@extends('admin.template.main')

@section('title', 'Nueva Carrera') 



@section('content')


{!! Form::open(['route' => 'admin.equipo.store' , 'method' => 'POST']) !!}
    

    <div class="form-group">
    {!! Form::label('nombre', 'Equipo') !!}
    {!! Form::input('text', 'nombre', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del equipo...', 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection