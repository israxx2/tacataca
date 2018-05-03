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
                                        <td>{{ $user->posicion }}</td>
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
                </div>


            </div>
        </div>
    </div>
</div>
@endsection