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

<!-- <img src="{{ asset('img/battle2.jpg') }}" id="id_img_fondo" /> -->
@include('admin.template.partials.nav')

<div class="container-fluid" id="id_div">
    {!! Form::open(['route' => 'admin.partidoSingle.store' , 'method' => 'POST']) !!}
        
        <div class="form-group">
          {!! Form::label('evento_id', 'Evento') !!}
          {!! Form::select('evento_id', $eventos, null, ['class' => 'form-control', 'placeholder' => 'Evento', 'required']) !!}
        </div>

        <div class="row">

            <div class="col">

                <div class="form-group">
                  {!! Form::label('user_id_1', 'ID Jugador(a) 1') !!}
                  <select class="form-control" id="user_id_1" name="user_id_1" required style="width: 100%">
                    <option></option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{$user->id.'- '.$user->nombres.' '.$user->apellidos}}</option>
                    @endforeach         
                  </select> 
                </div>

                <div class="form-group">

                {!! Form::label('goles_1', 'Goles Jugador(a) 1') !!}
                {!! Form::input('number', 'goles_1', null, ['class' => 'form-control', 'placeholder' => 'Goles hechos por el jugador 1', 'required']) !!}

                </div>

            </div>

            <div class="col">                

                <div class="form-group">
                  {!! Form::label('user_id_2', 'ID Jugador(a) 2') !!}
                  <select class="form-control" id="user_id_2" name="user_id_2" required style="width: 100%">
                    <option></option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{$user->id.'- '.$user->nombres.' '.$user->apellidos}}</option>
                    @endforeach         
                  </select> 
                </div>

                <div class="form-group">

                {!! Form::label('goles_2', 'Goles Jugador(a) 2') !!}
                {!! Form::input('number', 'goles_2', null, ['class' => 'form-control', 'placeholder' => 'Goles hechos por el jugador 2', 'required']) !!}

                </div>

            </div>
            
            

        </div>

        <div class="form-group">
        {!! Form::label('user_id_2', 'Victoria Jugador 1') !!}
        {!! Form::radio('ganador', 1, true, ['class' => 'checkbox-inline']) !!}

        {!! Form::label('user_id_2', 'Victoria Jugador 2') !!}
        {!! Form::radio('ganador', 2, true, ['class' => 'checkbox-inline']) !!}
        </div>

        

        


        <center>
          <div class="form-group">
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary', 'id' => 'submit_all', 'disabled']) !!}
          </div>
        </center>
        <br>


    {!! Form::close() !!}

    <script>

        $('#user_id_1,#user_id_2').select2({
          placeholder: 'Seleccione una opcion'
        });

        $('#user_id_1,#user_id_2').on('change',function(){
            if($('#user_id_1').val()==$('#user_id_2').val() || !$('#user_id_1').val() || !$('#user_id_2').val()){
                $('#submit_all').attr('disabled', 'disabled');
            }else{
                $('#submit_all').removeAttr('disabled');
            }
        });


    </script>

</div>

</body>

</html>
