@extends('admin.template.main')

@section('title', 'Nueva Carrera') 



@section('content')


{!! Form::open(['route' => 'admin.evento.store' , 'method' => 'POST']) !!}
    

    <div class="form-group">
    {!! Form::label('nombre', 'Nombre del Evento') !!}
    {!! Form::input('text', 'nombre', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del evento...', 'required']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('modalidad_id', 'Modalidad') !!}
      {!! Form::select('modalidad_id', $modalidades, null, ['class' => 'form-control', 'placeholder' => 'Modalidad', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('descripcion', 'Descripción del Evento') !!}
    {!! Form::input('text', 'descripcion', null, ['class' => 'form-control', 'placeholder' => 'Escriba una breve descripción del evento...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tipo', 'Tipo:') !!}
        <select class="form-control" name="tipo">
            <option value="1v1">1 VS 1</option>
            <option value="2v2">2 VS 2</option> 
        </select>
    </div>

    <div class="form-group">
    {!! Form::label('fecha', 'Fecha del Evento:') !!}
    </div>

    

    <div class="form-group">
        <div class="d-flex justify-content-center">
            <div class="container-fluid">
              <div class="row">
                <div class="col-4">
                  <select class="form-control" name="dia">
                    <option value="01">1</option>
                    <option value="02">2</option> 
                    <option value="03">3</option>
                    <option value="04">4</option> 
                    <option value="05">5</option>
                    <option value="06">6</option> 
                    <option value="07">7</option>
                    <option value="08">8</option> 
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option> 
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select>
                </div>
                <div class="col-2">
                <center>/</center>
                  
                </div>
                <div class="col-6">
                  <select class="form-control" name="mes">
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option> 
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option> 
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option> 
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option> 
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option> 
                    <option value="12">Diciembre</option>
                  </select>
                </div>
              </div>
            </div>
        </div>
    </div>

    <div class="form-group">
    {!! Form::label('hora', 'Hora del Evento') !!}
    </div>

    <div class="form-group">
        <div class="d-flex justify-content-center">
            <div class="container-fluid">
              <div class="row">
                <div class="col-5">
                  <select class="form-control" name="hora">
                    <option value="08">08</option> 
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option> 
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                  </select>
                </div>
                <div class="col-2">
                <center>:</center>
                  
                </div>
                <div class="col-5">
                  <select class="form-control" name="min">
                    <option value="00">00</option> 
                    <option value="05">05</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                  </select>
                </div>
              </div>
            </div>
        </div>
    </div>

    <center>
      <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
      </div>
    </center>
    <br>



{!! Form::close() !!}

@endsection