<?php

namespace App\Http\Controllers\Hojas;

use Illuminate\Http\Request;
use App\Models\hoja_ruta_model\Hojaruta; 
use App\Http\Controllers\Controller;

class HojarutaarchivadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:hojarutaarchivadas_index')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hojas_internas_datos = Hojaruta::where('hojarutas.estado_hoja', '=', 'ARCHIVADO')
            ->orderBy('id', 'DESC')->get();

        return view('consultas.archivados.index')->with('HI_Datos',$hojas_internas_datos);
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
    public function show(Request $request, $id)
    {

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
        $hojaActual = Hojaruta::find($id);

        //$regional->desg_telegrafico = $request->get('codigo');
        $hojaActual->estado_hoja = 'DESARCHIVADO';
        $hojaActual->motivo_reactivado = $request->get('motivoReact');
        //$hojaActual->telefono = $request->get('fono');
        //$hojaActual->direccion = $request->get('direccion');

        $hojaActual->save();

        return redirect('/hojas_de_ruta')->with('info', 'La Hoja de Ruta ha sido Desarchivada');
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
