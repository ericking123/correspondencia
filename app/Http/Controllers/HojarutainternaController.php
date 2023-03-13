<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\hoja_ruta_model\Hojaruta; 

class HojarutainternaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:hojaruta_index')->only('index');
        $this->middleware('can:hojaruta_CEA')->only('create');
        $this->middleware('can:hojaruta_CEA')->only('edit', 'update');
    }

    /*public int $contador;

    public function __construct()
    {
        $this->contador = 0;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hojas_internas_datos = Hojaruta::where('hojarutas.estado_hoja', '=', 'GENERADO')
            ->orWhere('hojarutas.estado_hoja', '=', 'DESARCHIVADO')
            ->orWhere('hojarutas.estado_hoja', '=', 'RECIBIDO')
            ->orderBy('id', 'DESC')->get();

        return view('documentos.hojaRuta.index')->with('HI_Datos',$hojas_internas_datos);
        //return view('hojaRuta.crearNuevo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('hojaRuta.crearNuevo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $generador_cod = Helper::IDGenerator(new Hojaruta, 'generador_cod', 5, 'HR-I'); /** Generate id */
        //$año_actual = date("Y");
        $nuevaHojaRuta = new Hojaruta();
        $nuevaHojaRuta->generador_cod = $generador_cod.'/'.date("Y");

        $nuevaHojaRuta->tipo_hoja = 'I';
        $nuevaHojaRuta->asunto = $request->get('descAsunto');
        $nuevaHojaRuta->estado_hoja = 'GENERADO';
        $nuevaHojaRuta->nro_doc = 0;

        $nuevaHojaRuta->save();

        return redirect('/hojas_de_ruta')->with('info', 'HOJA DE RUTA GUARDADA');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $hojaActual = Hojaruta::find($id);
        $hojaActual->estado_hoja = 'ARCHIVADO';
        $hojaActual->motivo_archivo = $request->get('motivoArch');

        $hojaActual->save();

        return redirect('/hojas_de_ruta')->with('info', 'HOJA DE RUTA ARCHIVADA');;;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hrDatos = Hojaruta::find($id);
        return view('documentos.hojaRuta.adjuntarDoc')->with('hojaint',$hrDatos);
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

        $hojaActual->asunto = $request->get('descAsunto');

        $hojaActual->save();

        return redirect('/hojas_de_ruta')->with('info', 'HOJA DE RUTA MODIFICADA');;;
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

    public function derivar($id)
    {
        return redirect('/hojas_de_ruta')->with('info', 'La hoja de Ruta Ha sido derivada con Exito!!!');;;
    }
}
