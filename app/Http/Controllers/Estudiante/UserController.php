<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
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

    public function user()
    {
        
        $user = User::find(3);
        $user = User::find(Auth::User()->id);

        if($user->juegos_totales_1v1 == 0){
            $prom_goles1 = 0;
        }
        else {
            $prom_goles1 = $user->goles_totales/$user->juegos_totales_1v1;
        }

        $prom_goles = round($prom_goles1, 2);
        return view('estudiante.user')
        ->with('user', $user)
        ->with('prom_goles', $prom_goles);
    }

    public function historial()
    {   
        $user = User::find(9);
        $i = 0;
        return view('estudiante.historial')
        ->with('user', $user)
        ->with('i', $i);
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
