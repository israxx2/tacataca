<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Evento;
use App\Partido;
use App\User;

class PartidoSingleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Evento::orderBy('id', 'ASC')
        ->where('tipo', '1v1')
        ->pluck('nombre', 'id');

        $users = User::orderBy('id', 'ASC')
        ->where('tipo','estudiante')
        ->get();

        return view('admin.partidos_s.create')
        ->with('eventos', $eventos)
        ->with('users', $users);

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

        $jugador_1 = User::find($request->user_id_1);
        $jugador_2 = User::find($request->user_id_2);

        $Qa = ($jugador_2->elo - $jugador_1->elo)/400;
        $Ea = 1 / (1+ pow(10, $Qa));

        $Qb = ($jugador_1->elo - $jugador_2->elo)/400;
        $Eb = 1 / (1+ pow(10, $Qb));

        $jugador_1->goles_totales = $jugador_1->goles_totales + $request->goles_1;
        $jugador_2->goles_totales = $jugador_2->goles_totales + $request->goles_2;
        
        if($request->goles_1 > $request->goles_2){
            if($jugador_1->elo < 2100){
                $K = 64;
            } elseif($jugador_1->elo < 2400){
                $K = 32;
            }else{
                $K = 24;
            }

            $partido->users()->attach($request->user_id_1, [ 
                'goles' => $request->goles_1, 
                'resultado' => 'victoria',
                'elo' => $K * $Eb
                ]);
            $partido->users()->attach($request->user_id_2, [ 
                'goles' => $request->goles_2, 
                'resultado' => 'derrota',
                'elo' => -$K * $Eb
                ]);

            if($evento->modalidad_id == 2){
                $jugador_1->elo = $jugador_1->elo + $K * $Eb;
                $jugador_1->v_torneos_1v1 = $jugador_1->v_torneos_1v1 + 1;
                           
                
                $jugador_2->elo = $jugador_2->elo + -$K * $Eb;
                 
            }

            if($evento->modalidad_id == 1){
                $jugador_1->elo = $jugador_1->elo + $K * $Eb;
                $jugador_1->v_duelos_1v1 = $jugador_1->v_duelos_1v1 + 1;         
                
                $jugador_2->elo = $jugador_2->elo + -$K * $Eb; 
            } 
            $jugador_1->juegos_totales_1v1 = $jugador_1->juegos_totales_1v1 + 1; 
            $jugador_2->juegos_totales_1v1 = $jugador_2->juegos_totales_1v1 + 1;
            $jugador_1->save();
            $jugador_2->save();          
        }
        elseif($request->goles_1 < $request->goles_2){
            if($jugador_2->elo < 2100){
                $K = 64;
            } elseif($jugador_2->elo < 2400){
                $K = 32;
            }else{
                $K = 24;
            }
            $partido->users()->attach($request->user_id_1, [
                'goles' => $request->goles_1, 
                'resultado' => 'derrota',
                'elo' => -$K * $Ea
                ]);
            $partido->users()->attach($request->user_id_2, [
                'goles' => $request->goles_2, 
                'resultado' => 'victoria',
                'elo' => $K * $Ea
                ]);

            if($evento->modalidad_id == 2){
                $jugador_2->elo = $jugador_2->elo + $K * $Ea;
                $jugador_2->v_torneos_1v1 = $jugador_2->v_torneos_1v1 + 1;
                            
                
                $jugador_1->elo = $jugador_1->elo + -$K * $Ea;
                 
            }

            if($evento->modalidad_id == 1){
                $jugador_2->elo = $jugador_2->elo + $K * $Ea;
                $jugador_2->v_duelos_1v1 = $jugador_2->v_duelos_1v1 + 1;          
                
                $jugador_1->elo = $jugador_1->elo + -$K * $Ea; 
            } 
            $jugador_2->juegos_totales_1v1 = $jugador_2->juegos_totales_1v1 + 1;
            $jugador_1->juegos_totales_1v1 = $jugador_1->juegos_totales_1v1 + 1;
            $jugador_2->save();
            $jugador_1->save();
        }
        else{

            $partido->users()->attach($request->user_id_1, [
                'goles' => $request->goles_1, 
                'resultado' => 'empate',
                'elo' => 0
                ]);
            $partido->users()->attach($request->user_id_2, [
                'goles' => $request->goles_2, 
                'resultado' => 'empate',
                'elo' => 0
                ]);
                
            $jugador_2->juegos_totales_1v1 = $jugador_2->juegos_totales_1v1 + 1;
            $jugador_1->juegos_totales_1v1 = $jugador_1->juegos_totales_1v1 + 1;
            $jugador_2->save();
            $jugador_1->save();
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
        foreach($partido->users as $user){
            $user->elo = $user->elo - $user->pivot->elo;
            $user->juegos_totales_1v1 = $user->juegos_totales_1v1 - 1;
            $user->goles_totales = $user->goles_totales - $user->pivot->goles;

            if($user->pivot->resultado == 'victoria'){
                if($partido->evento->modalidad_id == 1){
                    $user->v_duelos_1v1 = $user->v_duelos_1v1 - 1;
                }
                if($partido->evento->modalidad_id == 2){
                    $user->v_torneos_1v1 = $user->v_torneos_1v1 - 1;
                }
            }


            $user->save();

        }


        $partido->forceDelete();

        return back()->withInput();
    }
}
