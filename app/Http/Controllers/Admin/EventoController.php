<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Evento;
use App\Modalidad;
use App\Partido;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos= Evento::withTrashed()
        ->orderBy('id', 'DESC')
        ->paginate(15);

        return view('admin.eventos.index')
        ->with('eventos', $eventos);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalidades = Modalidad::orderBy('id', 'ASC')
        ->pluck('nombre', 'id');

        return view('admin.eventos.create')
        ->with('modalidades', $modalidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->nombre = strtoupper($request->nombre);
        $evento->user_id = Auth::User()->id;
        $evento->modalidad_id = $request->modalidad_id;
        $evento->tipo = $request->tipo;
        $evento->fecha = '2018-'.$request->mes.'-'.$request->dia;
        $evento->hora = $request->hora.':'.$request->min;
        $evento->descripcion = $request->descripcion;
        $evento->save();

        return Redirect('/admin/evento');

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

    public function partidos($id)
    {
        $evento = Evento::find($id);
        
        $partidos = Partido::orderBy('id', 'DESC')
            ->where('evento_id', $id)
            ->get();

        //SI SON 1V1 RETORNA LA SIGUIENTE VISTA             
        if($evento->tipo == '1v1'){
            return view('admin.eventos.partidos_s')
            ->with('partidos', $partidos);    
        }
        //SI SON 2V2 RETORNA LA SIGUIENTE VISTA
        else{
            return view('admin.eventos.partidos_d')
            ->with('partidos', $partidos);
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);
        $modalidades = Modalidad::orderBy('id', 'ASC')
        ->pluck('nombre', 'id');
        $fecha = explode('-', $evento->fecha);
        $hora = explode(':', $evento->hora);
        return view('admin.eventos.edit')
        ->with('evento', $evento)
        ->with('fecha', $fecha)
        ->with('hora', $hora)
        ->with('evento', $evento)
        ->with('modalidades', $modalidades);
    
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
        $evento = Evento::find($id);
        $evento->nombre = strtoupper($request->nombre);
        $evento->modalidad_id = $request->modalidad_id;
        $evento->fecha = '2018-'.$request->mes.'-'.$request->dia;
        $evento->hora = $request->hora.':'.$request->min;
        $evento->descripcion = $request->descripcion;
        $evento->save();

        return Redirect('/admin/evento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();
        $evento->save(); 

        return Redirect('/admin/evento');
    }

    public function activar($id)
    {
        $evento = Evento::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect('/admin/evento');
    }

}
