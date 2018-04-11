@extends('admin.template.main')

@section('title', 'Nueva Carrera') 



@section('content')


{!! Form::open(['route' => 'admin.modalidad.store' , 'method' => 'POST']) !!}
    

    <div class="form-group">
    {!! Form::label('nombre', 'Modalidad') !!}
    {!! Form::input('text', 'nombre', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del modalidad...', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('descripcion', 'Descripción') !!}
    {!! Form::input('text', 'descripcion', null, ['class' => 'form-control', 'placeholder' => 'Escriba una breve descripción del modalidad...']) !!}
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection