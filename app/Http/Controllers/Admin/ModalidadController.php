<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modalidad;

class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidades= Modalidad::withTrashed()
        ->orderBy('id', 'ASC')
        ->paginate(15);
        
        return view('admin.modalidades.index')
        ->with('modalidades', $modalidades);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modalidades.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modalidad = new Modalidad();
        $modalidad->nombre = strtoupper($request->nombre);
        $modalidad->descripcion = $request->descripcion;
        $modalidad->save();

        return Redirect('/admin/modalidad');
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
        $modalidad = Modalidad::find($id);

        return view('admin.modalidades.edit')
        ->with('modalidad', $modalidad);
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
        $modalidad = Modalidad::find($id);
        $modalidad->nombre = strtoupper($request->nombre);
        $modalidad->descripcion = $request->descripcion;
        $modalidad->save();

        return Redirect('/admin/modalidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modalidad = Modalidad::find($id);
        $modalidad->delete();
        $modalidad->save(); 

        return Redirect('/admin/modalidad');
    }

    public function activar($id)
    {
        $modalidad = Modalidad::withTrashed()
        ->where('id', '=', $id)
        ->restore();

        return Redirect('/admin/modalidad');
    }
}
