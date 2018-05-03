@extends('estudiante.template.main')

@section('title', 'Historial') 
@section('historial', 'active') 
@section('content')

<div class="content">
        <div class="row">
            <div class="col-md-12">

                @foreach($user->partidos as $partido)
                    <div class="card">
                        <div class="card-header">
                            @if($partido->pivot->resultado == 'derrota')
                                <h5 class="card-category text-primary">{{ $partido->pivot->resultado }}</h5>
                            @else
                                <h5 class="card-category text-info">{{ $partido->pivot->resultado }}</h5>
                                
                            @endif
                            <div class="d-flex justify-content-center">
                                       
                                        @foreach($partido->users as $jugadores)
                                            <h5> 
                                                {{ $jugadores->pivot->goles }}
                                            </h5>
                                            @if($i==0)
                                            <h5> 
                                                -
                                            </h5>
                                            @endif
                                            <!-- {{ $i++ }} -->
                                        @endforeach
                                        <!-- {{ $i=0 }} -->
                                    
                            </div>
                            
                            <h4 class="card-title"> Simple Table</h4>
                        </div>
                    </div>
                @endforeach()
                
            </div>
        </div>
</div>
@endsection