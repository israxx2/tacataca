@extends('admin.template.main')

@section('title', 'partidos') 

@section('content')

<br>	
<hr>
<br>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    <center>PARTIDOS UCM 2018</center>
  </a>
  <a href="{{ route('admin.partidoSingle.create') }}" class="list-group-item list-group-item-action">Registrar partido SINGLES</a>
  <a href="{{ route('admin.partidoDoble.create') }}" class="list-group-item list-group-item-action">Registrar partido DOBLES</a>
</div>


@endsection
