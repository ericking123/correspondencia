<?php

namespace App\Http\Controllers\Hojas;

use Illuminate\Http\Request;
use App\Models\hoja_ruta_model\Documento;
use App\Models\Cargo; 
use App\Models\Cargo_has_documento; 
use App\Http\Controllers\Controller;

class DocumentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:documento_index')->only('index');
        $this->middleware('can:documento_crud')->only('create', 'edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc_Datos = Documento::all();

        $car_Datos = Cargo::all();


        return view('sistema.documentos.index', compact('doc_Datos', 'car_Datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargosDatos = Cargo::orderBy('nombre_cargo', 'ASC')->get();
        return view('sistema.documentos.create', compact('cargosDatos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->get('cargos'));
        
        $documento = new Documento();
        $documento->prefijo = $request->get('pref');
        $documento->tipo_documento = $request->get('descDoc');

        $documento->save();

        foreach($request->cargos as $key => $id){
            $rel_DocCar = new Cargo_has_documento();
            $rel_DocCar->documento_id = $documento->id;
            $rel_DocCar->cargo_id = $request->cargos[$key];

            $rel_DocCar->save();
        }

        return redirect('documentos')->with('info', 'DOCUMENTO CREADO');
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
        $documentoDato = Documento::find($id);
        $cargosDatos = Cargo::orderBy('nombre_cargo', 'ASC')->get();
        return view('sistema.documentos.edit', compact('cargosDatos'))->with('documento', $documentoDato);
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
        $documento = Documento::find($id);
        $documento->prefijo = $request->get('prefijo');
        $documento->tipo_documento = $request->get('tipo_documento');

        $documento->save();

        return redirect('documentos')->with('info', 'DOCUMENTO MODIFICADO');
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
