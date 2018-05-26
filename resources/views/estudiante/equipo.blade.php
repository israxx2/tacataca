@extends('estudiante.template.main')

@section('title', 'Equipo') 
@section('equipo', 'active') 
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
                    <h5 class="title">Equipo</h5>
                </div>
                <div class="card-body">
                        <h6>Datos del equipo</h6>
                        <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nombre</th>
                                        <td>{{ $equipo->nombre }}</td>
                                    </tr>
                                    @foreach($equipo->users as $user)
                                        <tr>
                                            <th scope="row">Jugador(a)</th>
                                            <td>{{ $user->nombres.' '.$user->apellidos }}</td>                                   
                                        </tr>
                                    @endforeach

                                </tbody>
                              </table>
                              <hr>
                              <br>
                        <h6>Datos de juego</h6>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Medallas</th>
                                    <td>{{ $equipo->elo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Partidos jugados</th>
                                <td>{{ $equipo->juegos_totales_2v2 }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Partidos Duelos Ganados</th>
                                    <td>{{ $equipo->v_duelos_2v2 }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Partidos Torneos Ganados</th>
                                    <td>{{ $equipo->v_torneos_2v2 }}</td>
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

@endsection