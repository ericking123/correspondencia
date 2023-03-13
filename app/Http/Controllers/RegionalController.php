<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regional;

class RegionalController extends Controller
{
    //Para verificar que un usuario sea identificado
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('can:regionales_index')->only('index');
        //$this->middleware('can:regionales_crud')->only('create', 'edit', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regionalesDat = Regional::orderBy('id', 'DESC')->get();
        return view('sistema.estructuraInstitucional.regional.index')->with('regionales', $regionalesDat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.estructuraInstitucional.regional.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regionales = new Regional();
        $regionales->desg_telegrafico = $request->get('codigo');
        $regionales->nom_regional = $request->get('nomReg');
        $regionales->aeropuerto = $request->get('aeropuerto');
        $regionales->telefono = $request->get('fono');
        $regionales->direccion = $request->get('direccion');

        $regionales->save();

        return redirect('/regionales')->with('info', 'El registro se ha Creado con Éxito');
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
        $regionalDato = Regional::find($id);
        return view('sistema.estructuraInstitucional.regional.edit')->with('regional',$regionalDato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizaRegional(Request $request, $id)
    {
        $regional = Regional::find($id);

        $regional->nom_regional = $request->get('nomReg');
        $regional->aeropuerto = $request->get('aeropuerto');
        $regional->telefono = $request->get('fono');
        $regional->direccion = $request->get('direccion');

        $regional->save();

        return redirect('/organigramas')->with('info', 'ACTULIZAR INFORMACION');
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
