<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Evento;
use App\Partido;
use App\User;
use App\Equipo;


class PartidoDobleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Evento::orderBy('id', 'ASC')
        ->where('tipo', '2v2')
        ->pluck('nombre', 'id');

        $equipos = Equipo::orderBy('id', 'ASC')
        ->get();

        return view('admin.partidos_d.create')
        ->with('eventos', $eventos)
        ->with('equipos', $equipos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partido = new Partido();
        $evento = Evento::find($request->evento_id);
        $partido->evento_id = $request->evento_id;
        $partido->albitro_id = Auth::User()->id;

        $partido->save();

        $equipo_1 = Equipo::find($request->equipo_id_1);
        $equipo_2 = Equipo::find($request->equipo_id_2);

        $equipo_1->goles_totales = $equipo_1->goles_totales + $request->goles_1;
        $equipo_2->goles_totales = $equipo_2->goles_totales + $request->goles_2;

        $Qa = ($equipo_2->elo - $equipo_1->elo)/400;
        $Ea = 1 / (1+ pow(10, $Qa));

        $Qb = ($equipo_1->elo - $equipo_2->elo)/400;
        $Eb = 1 / (1+ pow(10, $Qb));

        if($request->goles_1 > $request->goles_2){
            if($equipo_1->elo < 2100){
                $K = 64;
            } elseif($equipo_1->elo < 2400){
                $K = 32;
            }else{
                $K = 24;
            }
            $partido->equipos()->attach($request->equipo_id_1, [ 
                'goles' => $request->goles_1, 
                'resultado' => 'victoria',
                'elo' => $K * $Eb,
                'elo_anterior' => $equipo_1->elo
                ]);
            $partido->equipos()->attach($request->equipo_id_2, [ 
                'goles' => $request->goles_2, 
                'resultado' => 'derrota',
                'elo' => -$K * $Eb,
                'elo_anterior' => $equipo_2->elo
                ]);

            if($evento->modalidad_id == 2){
                $equipo_1->elo = $equipo_1->elo + $K * $Eb;
                $equipo_1->v_torneos_2v2 = $equipo_1->v_torneos_2v2 + 1;
                $equipo_1->juegos_totales_2v2 = $equipo_1->juegos_totales_2v2 + 1;            
                
                $equipo_2->elo = $equipo_2->elo + -$K * $Eb;
                $equipo_2->juegos_totales_2v2 = $equipo_2->juegos_totales_2v2 + 1; 
            }

            if($evento->modalidad_id == 1){
                $equipo_1->elo = $equipo_1->elo + $K * $Eb;
                $equipo_1->v_duelos_2v2 = $equipo_1->v_duelos_2v2 + 1;
                $equipo_1->juegos_totales_2v2 = $equipo_1->juegos_totales_2v2 + 1;            
                
                $equipo_2->elo = $equipo_2->elo + -$K * $Eb;
                $equipo_2->juegos_totales_2v2 = $equipo_2->juegos_totales_2v2 + 1; 
            }

            $equipo_1->save();
            $equipo_2->save();

        }elseif($request->goles_1 < $request->goles_2){
            if($equipo_2->elo < 2100){
                $K = 64;
            } elseif($equipo_2->elo < 2400){
                $K = 32;
            }else{
                $K = 24;
            }
            $partido->equipos()->attach($request->equipo_id_1, [
                'goles' => $request->goles_1, 
                'resultado' => 'derrota',
                'elo' => -$K * $Ea,
                'elo_anterior' => $equipo_1->elo
                ]);
            $partido->equipos()->attach($request->equipo_id_2, [
                'goles' => $request->goles_2, 
                'resultado' => 'victoria',
                'elo' => $K * $Ea,
                'elo_anterior' => $equipo_2->elo
                ]);

            if($evento->modalidad_id == 2){
                $equipo_2->v_torneos_2v2 = $equipo_2->v_torneos_2v2 + 1;
                $equipo_2->juegos_totales_2v2 = $equipo_2->juegos_totales_2v2 + 1;            
                
                $equipo_1->juegos_totales_2v2 = $equipo_1->juegos_totales_2v2 + 1; 
            }

            if($evento->modalidad_id == 1){
                $equipo_2->v_duelos_2v2 = $equipo_2->v_duelos_2v2 + 1;
                $equipo_2->juegos_totales_2v2 = $equipo_2->juegos_totales_2v2 + 1;            
                
                $equipo_1->juegos_totales_2v2 = $equipo_1->juegos_totales_2v2 + 1; 
            }

            $equipo_2->elo = $equipo_2->elo + $K * $Ea;
            $equipo_1->elo = $equipo_1->elo + -$K * $Ea;
            $equipo_2->save();
            $equipo_1->save();
        
        }else{
            $partido->equipos()->attach($request->equipo_id_1, [
                'goles' => $request->goles_1, 
                'resultado' => 'empate',
                'elo' => 0,
                'elo_anterior' => $equipo_1->elo
                ]);
            $partido->equipos()->attach($request->equipo_id_2, [
                'goles' => $request->goles_2, 
                'resultado' => 'empate',
                'elo' => 0,
                'elo_anterior' => $equipo_2->elo
                ]);
                
            $equipo_2->juegos_totales_2v2 = $equipo_2->juegos_totales_2v2 + 1;
            $equipo_1->juegos_totales_2v2 = $equipo_1->juegos_totales_2v2 + 1;
            $equipo_2->save();
            $equipo_1->save();
        }

        return Redirect('/admin/partido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partido = Partido::find($id);
        
        foreach($partido->equipos as $equipo){
            $equipo->elo = $equipo->elo - $equipo->pivot->elo;
            $equipo->juegos_totales_2v2 = $equipo->juegos_totales_2v2 - 1;
            $equipo->goles_totales = $equipo->goles_totales - $equipo->pivot->goles;
            
            if($equipo->pivot->resultado == 'victoria'){
                if($partido->evento->modalidad_id == 1){
                    $equipo->v_duelos_2v2 = $equipo->v_duelos_2v2 - 1;
                }
                if($partido->evento->modalidad_id == 2){
                    $equipo->v_torneos_2v2 = $equipo->v_torneos_2v2 - 1;
                }
            }

            $equipo->save();
        }

        $partido->forceDelete();

        return back()->withInput();
    }
}
