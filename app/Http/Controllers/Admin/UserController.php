<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Carrera;
use App\Buzon;
use App\Equipo;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->
        orderBy('elo', 'ASC')->get();

        return view('admin.users.index')
        ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras= Carrera::orderBy('nombre', 'ASC')
        ->get();
        return view('admin.users.create')
        ->with('carreras', $carreras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->nombres = strtoupper($request->nombres);
        $user->apellidos = strtoupper($request->apellidos);
        $user->email = $request->email;
        $user->carrera_id = $request->carrera_id;
        $user->password = bcrypt($request->password);
        $user->goles_contra = 0;
        $user->torneos_ganados = 0;
        $user->save();
        
        $buzon = new Buzon();
        $buzon->user_id = $user->id;
        $buzon->save();

        return Redirect('/admin/user/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show')
        ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $carreras= Carrera::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $equipos= Equipo::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $tipo = ['estudiante' => 'estudiante', 'admin' => 'admin'];

        return view('admin.users.edit')
        ->with('user', $user)
        ->with('tipo', $tipo)
        ->with('carreras', $carreras)
        ->with('equipos', $equipos);
    }

    public function pw(Request $request)
    {
        $user = User::find($request->user_id);
        return view('admin.users.pw')
        ->with('user', $user);
    }

    public function pw_save(Request $request, $id)
    {   
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        
        return Redirect('/admin/user/'.$id);
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
        $user = User::find($id);
        $user->nombres = strtoupper($request->nombres);
        $user->apellidos = strtoupper($request->apellidos);
        $user->email = $request->email;
        $user->carrera_id = $request->carrera_id;
        $user->equipo_id = $request->equipo_id;
        $user->tipo = $request->tipo;
        $user->torneos_ganados = $request->torneos_ganados;
        $user->save();

        return Redirect('/admin/user/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $user->save(); 

        return Redirect('/admin/user');
    }

    public function activar($id)
    {
        $user = User::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect('/admin/user');
    }
}
