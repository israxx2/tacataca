@extends('estudiante.template.main')

@section('title', 'Información') 
@section('informacion', 'active') 
@section('content')

    <div class="card card-chart">
        <div class="card-header bg-light">
                <h5 class="card-category"></h5>
                <center><h4 class="card-title"><i class="fas fa-futbol"></i>TACA-TACA UCM 2018 </h4></center>
        </div>
    <div class="card-body " >
                <center><p class= "text-muted">Este proyecto corresponde a la segunda edición de la Liga Taca – Taca UCM 2017, en donde quisimos llevar el juego a otro nivel, por lo que hemos creado el sistema de TACA-TACA UCM 2018.</p></center>
                <center><p class= "text-muted">A continuación explicaremos de manera resumida cómo funciona el sistema</p></center>
                <!-- FINALIDAD -->
                <a class="btn btn-info btn-lg btn-block" data-toggle="collapse" href="#collapseFinalidad" role="button" aria-expanded="false" aria-controls="collapseExample">
                        FINALIDAD
                </a>
                <div class="collapse" id="collapseFinalidad">
                        <p> Como aficionados de este "deporte" queremos llegar a cada compañero de la universidad para generar una instancia diferente y nueva, para distraernos, entretenernos, y por qué no, producir motivación que tanta falta nos hace a veces.</p>
                        <p>No importa si eres bueno o malo, lo importante es divertirse, competir y querer superarse. Los límites están en tu cabeza <i class="now-ui-icons ui-2_like"></i> . </p>
                </div>
                <!-- SISTEMA DE ELO -->
                <a class="btn btn-info btn-lg btn-block" data-toggle="collapse" href="#collapseElo" role="button" aria-expanded="false" aria-controls="collapseExample">
                        SISTEMA DE ELO
                </a>
                <div class="collapse" id="collapseElo">
                        <p>El sistema de puntuación Elo es un método matemático, basado en un cálculo estadístico, para calcular la habilidad relativa de los jugadores en algunos deportes.</p>
                        <p>Para simplificar el concepto, lo que se hace es calcular la probabilidad de victoria y de derrota, de los jugadores o equipos que se enfrentarán, a traves del elo (medallas) que poseen. Así, dependiendo del resultado, las medallas circulan entre todos los jugadores de manera justa. (ejemplo en el video)</p>
                </div>
                <a class="btn btn-info btn-lg btn-block" data-toggle="collapse" href="#collapseCampeonatos" role="button" aria-expanded="false" aria-controls="collapseExample">
                        CAMPEONATOS
                </a>
                <div class="collapse" id="collapseCampeonatos">
                        <p>Los campeonatos son juegos exclusivos que se realizan una vez al mes, en donde cada jugador o equipo debe jugar primeramente en una pre-fase. Luego, se seleccionan a los 8 mejores para pasar a la fase final.</p>
                        <p>En la pre-fase los participantes deberán jugar 3 partidos, en donde clasificarán los que más partidos ganen. Si más de 8 jugadores o equipos ganan los tres partidos correspondientes a la pre-fase, se recurrirá a ver la mejor diferencia de goles.</p>
                        <p>Los jugadores o equipos que ganen serán premiados con un diploma en conjunto de un trofeo virtual, el cual podrá ser visualizado en el ranking y en el perfil de los jugadores o equipos.</p>
                </div>

                <a class="btn btn-info btn-lg btn-block" data-toggle="collapse" href="#collapseDuelos" role="button" aria-expanded="false" aria-controls="collapseExample">
                        DUELOS
                </a>
                <div class="collapse" id="collapseDuelos">
                        <p>(Próximamente)</p>
                </div>
                <a class="btn btn-info btn-lg btn-block" data-toggle="collapse" href="#collapsePremiaciones" role="button" aria-expanded="false" aria-controls="collapseExample">
                        PREMIACIONES
                </a>
                <div class="collapse" id="collapsePremiaciones">
                        <p>En el mes de Noviembre se realizará el último campeonato, en el cual participarán los 8 mejores jugadores y equipos que dicten en la tabla de ranking a la fecha. Se finalizará con una choripanada en la Universidad, momento en donde se realizarán las premiaciones al primer, segundo y tercer lugar (con trofeos para los ganadores y medallas para los segundos y tercer lugar). También se premiarán por otras categorias.</p>
                </div>

                

                <hr>
                <center>
                
                <div class="embed-container">
                        <iframe width="300" height="169" src="https://www.youtube.com/embed/VngKT7-UDys" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                        </center>
        </div>
    </div>

@endsection