<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Equipo;
use App\User;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos= Equipo::withTrashed()
        ->orderBy('id', 'ASC')
        ->get();
        return view('admin.equipos.index')
        ->with('equipos', $equipos);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('id', 'ASC')
        ->where('tipo','estudiante')
        ->get();
        return view('admin.equipos.create')
        ->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipo = new Equipo();
        $equipo->nombre = strtoupper($request->nombre);
        $equipo->save();

        $jugador_1 = User::find($request->user_id_1);
        $jugador_1->equipo_id = $equipo->id;
        $jugador_1->save();

        $jugador_2 = User::find($request->user_id_2);
        $jugador_2->equipo_id = $equipo->id;
        $jugador_2->save();

        return Redirect('/admin/equipo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);
        return view('admin.equipos.show')
        ->with('equipo', $equipo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::find($id);

        return view('admin.equipos.edit')
        ->with('equipo', $equipo);
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
        $equipo = Equipo::find($id);
        $equipo->nombre = strtoupper($request->nombre);
        $equipo->torneos_ganados = $request->torneos_ganados;
        $equipo->save();

        return Redirect('/admin/equipo/'.$equipo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();
        $equipo->save(); 

        return Redirect('/admin/equipo');
    }

    public function activar($id)
    {
        $equipo = Equipo::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect('/admin/equipo');
    }
}
