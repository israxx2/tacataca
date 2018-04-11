<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Crear Partido | Panel de Administración</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css"  href="{{ asset('css/battle_img.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css"  href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<!-- select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<script type="text/javascript" src="{{ asset('js/jquery.1.11.1.js') }}"></script> 
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.js') }}"></script> 
<script defer src="{{ asset('svg-with-js/js/fontawesome-all.js') }}"></script>
<script defer src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</head>
<body>

@include('admin.template.partials.nav')
<br>
<hr>
<div class="container-fluid" id="id_div">
    {!! Form::open(['route' => 'admin.equipo.store' , 'method' => 'POST']) !!}
          <div class="form-group">
          {!! Form::label('nombre', 'Nombre del Equipo') !!}
          {!! Form::input('text', 'nombre', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del equipo...', 'required']) !!}
          </div>

          <div class="form-group">
            {!! Form::label('user_id_1', 'Jugador 1') !!}
            <select class="form-control" id="user_id_1" name="user_id_1" required style="width: 100%">
              <option></option>
              @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->id.'- '.$user->nombres.' '.$user->apellidos }}</option>
              @endforeach         
            </select> 
          </div>

          <div class="form-group">
            {!! Form::label('user_id_2', 'Jugador 2') !!}
            <select class="form-control" id="user_id_2" name="user_id_2" required style="width: 100%">
              <option></option>
              @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->id.'- '.$user->nombres.' '.$user->apellidos }}</option>
              @endforeach         
            </select> 
          </div>

        <center>
          <div class="form-group">
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary', 'id' => 'submit_all']) !!}
          </div>
        </center>
        <br>


    {!! Form::close() !!}

    <script>

        $('#user_id_1,#user_id_2').select2({
          placeholder: 'Seleccione una opcion'
        });

    </script>

</div>

</body>

</html>
