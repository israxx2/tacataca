@extends('estudiante.template.main')

@section('title', 'Eventos') 
@section('eventos', 'active') 
@section('content')

    @foreach($eventos as $evento)
        <div class="card card-chart">
            <div class="card-header bg-light">
                    <h5 class="card-category">{{ $evento->modalidad->nombre }}</h5>
                <h4 class="card-title">{{ $evento->nombre }}</h4>
            </div>
        <div class="card-body " >
                    @if(empty($evento->descripcion))
                        <p class= "text-muted">Sin descripción</p>
                    @else
                        <p class= "text-muted">{{ $evento->descripcion }}</p>
                    @endif
            </div>
        </div>
    @endforeach

@endsection