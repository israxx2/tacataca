@extends('estudiante.template.main')

@section('title', 'Historial') 
@section('historial', 'active') 
@section('content')

    <div class="col-md-12">
            <br><br>
        <a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#collapseSingles" role="button" aria-expanded="false" aria-controls="collapseExample">
            SINGLES
        </a>
        <div class="collapse" id="collapseSingles">
            <div class="card card-body">
                @if(empty($user->partidos))
                    <h5 class="card-category text-muted">No se han registrado partidos</h5>
                @else
                    @foreach($user->partidos->reverse() as $partido)
                    <div class="card">
                        <div class="card-header">
                            @if($partido->pivot->resultado == 'derrota')
                                <h5 class="card-category text-primary">{{ $partido->pivot->resultado }}</h5>
                            @else
                                <h5 class="card-category text-info">{{ $partido->pivot->resultado }}</h5>
                                
                            @endif
                            <div class="d-flex justify-content-center">
                                        
                                        @foreach($partido->users as $jugadores)
                                            <h5>{{ $jugadores->pivot->goles }}</h5>
                                            @if($i==0)
                                            <h5>-</h5>
                                            @endif
                                            <!-- {{ $i++ }} -->
                                        @endforeach
                                        <!-- {{ $i=0 }} -->
                                    
                            </div>
                                <div class="row">
                                @foreach($partido->users as $jugadores)
                                    
                                        <div class="col-5">
                                            <h6 class="card-title">
                                                {{ $jugadores->nombres.' '.$jugadores->apellidos }}
                                            </h6>
                                            <div class="table-full-width table-responsive">
                                                <table class ="table">
                                                    <tbody>
                                                        @if($i==0)
                                                            @if($jugadores->pivot->elo_anterior != null)
                                                                <tr>
                                                                    <td align="left"><span class="icon-award"></span>{{ ' '.$jugadores->pivot->elo_anterior }}</td>
                                                                </tr>
                                                            @endif 
                                                            <tr>
                                                                <td align="left"><span class="icon-award"></span>{{ ' '.$jugadores->pivot->elo }}</td>
                                                            </tr>
                                                            <!-- {{ $j=false }} -->
                                                        @endif
                                                    </tbody>
                                                        @if($j==true)
                                                            @if($jugadores->pivot->elo_anterior != null)
                                                                <tr>
                                                                    <td align="right">{{ ' '.$jugadores->pivot->elo_anterior }}<span class="icon-award"></span></td>
                                                                </tr>
                                                            @endif 
                                                            <tr>
                                                                <td align="right">{{ ' '.$jugadores->pivot->elo }}<span class="icon-award"></span></td>
                                                            </tr>
                                                        @endif
                                                        <!-- {{ $j=true }} -->
                                                </table>
                                            </div>
                                        </div>
                                    
                                    @if($i==0)
                                        <div class="col-2">
                                            <center>
                                                <h5> vs </h5>
                                            </center>
                                                
                                        </div>    
                                    @endif
                                    <!-- {{ $i++ }} -->
                                @endforeach
                            </div>
                                <!-- {{ $i=0 }} -->
                            
                        </div>
                    </div>
                        <!-- {!! $lim++ !!} -->

                        @if($lim == 10)
                            @break
                        @endif
                    @endforeach()
                @endif

            </div>
        </div>
        
        
    </div>

    <div class="col-md-12">
            
            <a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#collapseDobles" role="button" aria-expanded="false" aria-controls="collapseExample">
                DOBLES
            </a>

            <div class="collapse" id="collapseDobles">
                    <div class="card card-body">
                        <!-- {!! $lim = 0 !!} -->
                        @if(empty($equipo->partidos))
                            <h5 class="card-category text-muted">No se han registrado partidos</h5>
                        @else
                            @foreach($equipo->partidos->reverse() as $partido_d)
                            <div class="card">
                                <div class="card-header">
                                    @if($partido_d->pivot->resultado == 'derrota')
                                        <h5 class="card-category text-primary">{{ $partido_d->pivot->resultado }}</h5>
                                    @else
                                        <h5 class="card-category text-info">{{ $partido_d->pivot->resultado }}</h5>
                                    @endif
                                    <div class="d-flex justify-content-center">
                                                
                                                @foreach($partido_d->equipos as $equipos)
                                                    <h5>{{ $equipos->pivot->goles }}</h5>
                                                    @if($i==0)
                                                    <h5>-</h5>
                                                    @endif
                                                    <!-- {{ $i++ }} -->
                                                @endforeach
                                                <!-- {{ $i=0 }} -->
                                            
                                    </div>
                                    <div class="">
                                        <div class="row">
                                        @foreach($partido_d->equipos as $equipos)
                                            
                                                <div class="col-5">
                                                    <h6 class="card-title">{{ $equipos->nombre }}</h6>
                                                    <div class="table-full-width table-responsive">
                                                        <table class ="table">
                                                            <tbody>
                                                                @if($i==0)
                                                                    @if($equipos->pivot->elo_anterior != null)
                                                                        <tr>
                                                                            <td align="left"><span class="icon-award"></span>{{ ' '.$equipos->pivot->elo_anterior }}</td>
                                                                        </tr>
                                                                    @endif
                                                                    <tr>
                                                                        <td align="left"><span class="icon-award"></span>{{ ' '.$equipos->pivot->elo }}</td>
                                                                    </tr>
                                                                    <!-- {{ $j=false }} -->
                                                                @endif
                                                            </tbody>
                                                                @if($j==true)
                                                                    @if($equipos->pivot->elo_anterior != null)
                                                                        <tr>
                                                                            <td align="right">{{ ' '.$equipos->pivot->elo_anterior }}<span class="icon-award"></span></td>
                                                                        </tr>
                                                                    @endif
                                                                        <tr>
                                                                            <td align="right">{{ ' '.$equipos->pivot->elo }}<span class="icon-award"></span></td>
                                                                        </tr
                                                                @endif
                                                                <!-- {{ $j=true }} -->
                                                        </table>
                                                    </div>
                                                </div>
                                            
                                            @if($i==0)
                                                <div class="col-2">
                                                    <center>
                                                        <h5>vs</h5>
                                                    </center>
                                                        
                                                </div>    
                                            @endif
                                            <!-- {{ $i++ }} -->
                                        @endforeach
                                    </div>
                                        <!-- {{ $i=0 }} -->
                                    </div>
                                    
                                </div>
                            </div>
                                <!-- {!! $lim++ !!} -->
            
                                @if($lim == 10)
                                    @break
                                @endif
                            @endforeach()
                        @endif
        
                    </div>
                </div>
            
           
    </div>  
@endsection