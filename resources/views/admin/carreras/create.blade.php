@extends('admin.template.main')

@section('title', 'Nueva Carrera') 



@section('content')


{!! Form::open(['route' => 'admin.carrera.store' , 'method' => 'POST']) !!}
    

    <div class="form-group">
    {!! Form::label('nombre', 'Nombre Carrera') !!}
    {!! Form::input('text', 'nombre', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la carrera...', 'required']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection