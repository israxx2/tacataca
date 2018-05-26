@extends('estudiante.template.main')

@section('title', 'Perfil') 
@section('perfil', 'active') 
@section('content')

<div class="content">
        <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('img/pelota-futbol.jpg') }}" alt="...">
                </div>
    <div class="row">

        
        <div class="col-md-12">
                <br>
                @include('flash::message')

            <div class="card">
                <div class="card-header">
                    <h5 class="title">  Perfil</h5>
                </div>
                <div class="card-body">
                        <h6>Datos personales</h6>
                        <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nombre</th>
                                        <td>{{ $user->nombres.' '.$user->apellidos }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Carrera</th>
                                        <td>{{ $user->carrera->nombre }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Equipo</th>
                                        @if($user->equipo_id == null)
                                            <td>Sin equipo</td>
                                        @else
                                            <td>{{ $user->equipo->nombre }}</td>
                                        @endif
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">Posición</th>
                                        <td>
                                            {{ $user->posicion }}
                                            <button type="button" class="btn btn-round btn-sm btn-simple btn-icon no-caret float-right" data-toggle="modal" data-target="#posicion">
                                                    <i class="now-ui-icons ui-1_settings-gear-63"></i>
                                            </button>  
                                        </td>
                                        
                                    </tr>

                                    </tbody>
                              </table>
                              <hr>
                              <br>
                        <h6>Datos de juego</h6>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Medallas</th>
                                    <td>{{ $user->elo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Partidos jugados</th>
                                <td>{{ $user->juegos_totales_1v1 }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Partidos Duelos Ganados</th>
                                    <td>{{ $user->v_duelos_1v1 }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Partidos Torneos Ganados</th>
                                    <td>{{ $user->v_torneos_1v1 }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Promedio Goles</th>
                                <td>{{ $prom_goles }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <br>
                    <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#password">Cambiar contraseña</button>
                </div>        
            </div>
        </div>
    </div>
</div>

<!-- Modal Posicion-->
<div class="modal" tabindex="-1" role="dialog" id = "posicion" style="top:20%;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cambiar posición</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!! Form::open(['route' => 'estudiante.posicion' , 'method' => 'POST']) !!}
            <div class="modal-body">
                <p class="text-muted">Selecciona tu posición favorita</p>
                <div class="checkbox">
                    <label for="delantero"><input type="radio" id="posicion" name="posicion" value="DELANTERO" required>Delantero</label>
                </div>
                <div class="checkbox">
                    <label for="ambidiestro"><input type="radio" id="posicion" name="posicion"value="AMBIDIESTRO">Ambidiestro</label>
                </div>
                <div class="checkbox">
                        <label for="defensa"><input type="radio" id="posicion" name="posicion"value="DEFENSA">Defensa</label>
                </div>
            </div>
            <div class="modal-footer">
                  <button type="submit" class="btn btn-simple btn-round btn-success btn-icon no-caret">
                    <i class="fas fa-check" aria-hidden="true"></i>
                  </button> 
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>


    <!-- Modal Password-->
<div class="modal" tabindex="-1" role="dialog" id = "password" style="top:20%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cambiar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => 'estudiante.password' , 'method' => 'POST']) !!}
            <div class="modal-body">
                <div class="form-group">
                    <label id=password>Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
                </div>
                
                <div class="form-group">
                        <label id="new_password1" name="new_password1">Nueva contraseña</label>
                        <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="Nueva contraseña">
                </div>
                <div class="form-group">
                    <label id="new_password2" name="new_password2">Repetir contraseña</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Repetir contraseña">
                </div>
                </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-simple btn-round btn-success btn-icon no-caret">
                    <i class="fas fa-check" aria-hidden="true"></i>
                    </button> 
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection