@extends('estudiante.template.main')

@section('title', 'Ranking') 
@section('ranking', 'active') 
@section('content')

<div class="content">
    <br><br>
    <a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#collapseSingles" role="button" aria-expanded="false" aria-controls="collapseExample">
            SINGLES
    </a>

    <div class="collapse" id="collapseSingles">    
        <div class="card">
            <div class="card-header">
                <h5 class="card-category">TOP 10</h5>
                <h4 class="card-title"> Ranking singles</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th >
                            #
                            </th>
                            <th >
                            Nombre
                            </th>
                            <th >
                            <span class="icon-award"></span>
                            </th>
                        </thead>
                        <tbody>
                            <!-- {{ $i=1 }} -->
                            @foreach($users as $user)
                                <tr >
                                    <td >{{ $i }}</td>
                                    <td  >{{ $user->nombres.' '.$user->apellidos }}@for ($j = 0; $j < $user->torneos_ganados; $j++)
                                        <i class="now-ui-icons sport_trophy"></i>
                                    @endfor
                                    </td>
                                    <td class="text-right" >{{ $user->elo }}</td>
                                </tr>
                            <!-- {{ $i++ }} -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#collapseDobles" role="button" aria-expanded="false" aria-controls="collapseExample">
            DOBLES
    </a>

    <div class="collapse" id="collapseDobles">    
        <div class="card">
            <div class="card-header">
                <h5 class="card-category">TOP 10</h5>
                <h4 class="card-title"> Ranking dobles</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th >
                            #
                            </th>
                            <th >
                            Nombre
                            </th>
                            <th >
                            <span class="icon-award"></span>
                            </th>
                        </thead>
                        <tbody>
                            <!-- {{ $i=1 }} -->
                            @foreach($equipos as $equipo)
                                <tr >
                                    <td >{{ $i }}</td>
                                    <td >{{ $equipo->nombre }}@for ($j = 0; $j < $equipo->torneos_ganados; $j++)
                                        <i class="now-ui-icons sport_trophy"></i>
                                    @endfor</td>
                                    <td class="text-right" >{{ $equipo->elo }}</td>
                                </tr>
                            <!-- {{ $i++ }} -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection