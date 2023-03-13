<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organigrama;
use App\Models\Regional; 

class OrganigramaController extends Controller
{
    //Para verificar que un usuario sea identificado
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:organigramas_index')->only('index');
        $this->middleware('can:organigramas_crud')->only('create', 'edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regional_datos = Regional::all();

        $organigrama_datos = Organigrama::all();

        return view('sistema.estructuraInstitucional.organigrama.index', compact('regional_datos'))->with('organigramaDatos',$organigrama_datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regional_datos = Regional::all();
        return view('sistema.estructuraInstitucional.organigrama.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevaUnidad = new Organigrama();
        $nuevaUnidad->desg_teleg = $request->get('codigo');
        $nuevaUnidad->nombre_unidad = $request->get('nomReg');
        $nuevaUnidad->dependencia = $request->get('unidad');

        $nuevaUnidad->save();

        return redirect('/organigramas')->with('info', 'CREAR ORGANIGRAMA');
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
        //$regional_datos = Regional::all();
        $organigrama_datos = Organigrama::all()->find($id);

        return view('sistema.estructuraInstitucional.organigrama.edit')->with('datoUnidad',$organigrama_datos);
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
        $nuevaUnidad = Organigrama::find($id);
        $nuevaUnidad->desg_teleg = $request->get('codigo');
        $nuevaUnidad->nombre_unidad = $request->get('nomReg');
        $nuevaUnidad->dependencia = $request->get('unidad');

        $nuevaUnidad->save();

        return redirect('/organigramas')->with('info', 'MODIFICAR ORGANIGRAMA');;
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
