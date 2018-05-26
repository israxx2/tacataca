<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Evento;
use App\User;
use App\Equipo;
use App\Partido;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estudiante.ranking.index');
    }

    public function ranking()
    {
        $users = User::orderBy('elo', 'ASC')
        ->get();

        return view('estudiante.ranking.index');
    }

    public function perfil()
    {
        $user = User::find(Auth::User()->id);

        if($user->juegos_totales_1v1 == 0){
            $prom_goles1 = 0;
        }
        else {
            $prom_goles1 = $user->goles_totales/$user->juegos_totales_1v1;
        }

        $prom_goles = round($prom_goles1, 2);
        return view('estudiante.perfil')
        ->with('user', $user)
        ->with('prom_goles', $prom_goles);
    }

    public function equipo()
    {
        $user = User::find(Auth::User()->id);
        $equipo = Equipo::find($user->equipo_id);

        if($equipo->juegos_totales_1v1 == 0){
            $prom_goles1 = 0;
        }
        else {
            $prom_goles1 = $user->goles_totales/$user->juegos_totales_1v1;
        }

        $prom_goles = round($prom_goles1, 2);

        return view('estudiante.equipo')
        ->with('equipo', $equipo)
        ->with('prom_goles', $prom_goles);
    }

    public function posicion(Request $request)
    {
        $user = User::find(Auth::User()->id);
        $user->posicion = $request->posicion;
        $user->save();

        flash('Tu posicion se ha cambiado a '.$request->posicion.' con éxito!')->success();

        return Redirect(route('estudiante.perfil'));
    }

    public function password(Request $request)
    {
        $user = User::find(Auth::User()->id);
        $hashedPassword = $user->password;
        if (Hash::check($request->password, $hashedPassword))
            {
                if($request->new_password1 == $request->new_password2){
                    $user->password = bcrypt($request->new_password);
                    $user->save();
                    flash('Se ha modificado la contraseña')->success();
                }else{
                    flash('Las contraseñas no coinciden')->warning();
                }
            }else{
                flash('Contraseña incorrecta')->error();
            }
            
        return Redirect(route('estudiante.perfil'));
    }

    public function historial()
    {   
        $user = User::find(Auth::user()->id);
        $i = 0;
        $lim = 0;

        $equipo = Equipo::find($user->equipo_id);

        return view('estudiante.historial')
        ->with('user', $user)
        ->with('equipo', $equipo)
        ->with('i', $i)
        ->with('lim', $lim);
    }

    public function eventos()
    {   
        $eventos = Evento::orderBy('id', 'DESC')
        ->get();

        return view('estudiante.eventos')
        ->with('eventos', $eventos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
