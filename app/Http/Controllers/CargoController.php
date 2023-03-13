<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Regional;
use App\Models\Organigrama;
use App\Models\Cargo; 

class CargoController extends Controller
{
    //Para verificar que un usuario sea identificado
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:cargos_index')->only('index');
        $this->middleware('can:cargos_crud')->only('create', 'edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargo_datos = Cargo::join('organigramas', 'organigramas.id', '=', 'cargos.organigrama_id')
            ->selectRaw('
                cargos.id,
                cargos.nombre_cargo,
                cargos.identificador,
                cargos.estado,
                cargos.organigrama_id,
                
                organigramas.id as id_organigrama,
                organigramas.nombre_unidad,
                organigramas.desg_teleg
            ')->get();

        return view('sistema.estructuraInstitucional.cargo.index')->with('cargoDatos',$cargo_datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.estructuraInstitucional.cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $identificadorxxx = Organigrama::select('organigramas.desg_teleg')->find($request->get('unidad'));
        $identificador = substr($identificadorxxx, -6, 4);

        $nuevoCargo = new Cargo();
        $nuevoCargo->identificador = $identificador;
        $nuevoCargo->nombre_cargo = $request->get('nomCargo');
        $nuevoCargo->estado = 'ACEFALO';
        $nuevoCargo->organigrama_id = $request->get('unidad');

        $nuevoCargo->save();

        return redirect('/cargos')->with('info', 'CREAR CARGO');
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
        $cargo_datos = Cargo::join('organigramas', 'organigramas.id', '=', 'cargos.organigrama_id')
            ->selectRaw('
                cargos.id,
                cargos.nombre_cargo,
                cargos.identificador,
                cargos.estado,
                cargos.organigrama_id,

                organigramas.id as id_organigrama,
                organigramas.nombre_unidad,
                organigramas.desg_teleg

            ')->find($id);

        return view('sistema.estructuraInstitucional.cargo.edit')->with('cargoDatos',$cargo_datos);
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
        $identificadorxxx = Organigrama::select('organigramas.desg_teleg')->find($request->get('unidad'));
        $identificador = substr($identificadorxxx, -6, 4);

        $nuevoCargo = Cargo::find($id);

        $nuevoCargo->identificador = $identificador;
        $nuevoCargo->nombre_cargo = $request->get('nomCargo');
        //$nuevoCargo->estado = $request->get('selectorEstado');
        $nuevoCargo->organigrama_id = $request->get('unidad');

        $nuevoCargo->save();

        return redirect('/cargos')->with('info', 'MODIFICADO');
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
