<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Funcionario;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsRolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:asignarRole_index')->only('index');
        $this->middleware('can:asignarRole_index')->only('create');
        $this->middleware('can:asignarRole_crud')->only('edit', 'update');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
    }


    public function create()
    {
        $listpermisos = Permission::all();
        $listroles = Role::all();

        return view('sistema.personal.permisosroles.create', compact('listpermisos', 'listroles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $role = Role::create( $request->all() );
        $role->permissions()->sync($request->permissions);


        $listpermisos = Permission::all();
        $listroles = Role::all();

        return view('sistema.personal.permisosroles.create', compact('listpermisos', 'listroles'))->with('info', 'ROL REGISTRADO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $rolesDatos = Role::all(); //Todos los datos de la tabla roles
        $usuarioDato = User::find($id);

        return view('sistema.personal.permisosroles.edit', compact('usuarioDato', 'rolesDatos'));
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

        $userDato = User::find($id);
        $userDato->roles()->sync($request->roles);
        $userDato->es_funcionario = true;
        
        $userDato->save();

        //DATOS PARA COMPLETAR FUNCIONARIO(INGRESAR REGISTRO TABLA FUNCIONARIO)
        $funcionarioDa = new Funcionario();
        $funcionarioDa->estado = $request->get('selectorEstado');
        $funcionarioDa->usuario_id = $id;
        $funcionarioDa->save();

        return redirect('/funcionarios')->with('info', 'Se asigno los roles correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato = Role::find($id);
        $dato->delete();


        $listpermisos = Permission::all();
        $listroles = Role::all();

        return view('sistema.personal.permisosroles.create', compact('listpermisos', 'listroles'))->with('info', 'ROL ELIMINADO');
    }
}
