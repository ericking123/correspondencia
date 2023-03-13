<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Funcionario;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Team;
use App\Models\Regional;
use App\Models\Asignacion;
use App\Models\Cargo;
use App\Models\AsignacionPerfil;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FuncionarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:funcionario_index')->only('index');
        $this->middleware('can:funcionario_crud')->only('create', 'edit', 'update');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionario_datos = Funcionario::join('users', 'users.id', '=', 'funcionarios.usuario_id')
                        ->join('model_has_roles','model_has_roles.model_id','=','users.id')
                        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                        ->join('asignacions', 'asignacions.funcionario_id', '=', 'funcionarios.id')
                        ->join('cargos', 'cargos.id', '=', 'asignacions.cargo_id')
                        
                        ->selectRaw('
                            users.id,
                            users.name,
                            
                            users.email,
                            
                            funcionarios.estado,
                            funcionarios.imagen_user,

                            roles.name as nombre_rol,
                            roles.description,

                            cargos.identificador,
                            cargos.nombre_cargo

                        ')->get();

            return view('sistema.personal.funcionario.index')->with('funcionarioda', $funcionario_datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listpermisos = Permission::all();
        $rolesDatos = Role::all();
        $asigPerfiles = [];
        return view('sistema.personal.funcionario.create', compact('listpermisos', 'rolesDatos', 'asigPerfiles'));
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
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:1024' //antes de hacer cualquier cosa... se valida la informacion de la imagen (tipo de imagen)
        ]);

        $datoRegional = Regional::find(1); //dato del designador telegrafico(desg_telegrafico)
        //var_dump($datoRegional->desg_telegrafico);

        $nuevoUsuario = new User();
        $nuevoUsuario->name = $request->get('name');
        $nuevoUsuario->cod_reg = $datoRegional->desg_telegrafico;
        $nuevoUsuario->email = $request->get('email');
        $nuevoUsuario->es_funcionario = true;
        $nuevoUsuario->password = Hash::make($request->get('password'));
        $nuevoUsuario->current_team_id = 1;
        $nuevoUsuario->save();

        $nuevoUsuario->assignRole($request->get('roles'));

        $funcionario = new Funcionario();
        $funcionario->estado = 'ACTIVO';
        $funcionario->usuario_id = $nuevoUsuario->id;

        //IMAGEN
        $ruta_publica = 'storage/imagenes_de_perfiles/';
        $nombre_imagen = 'funcionario_'.$nuevoUsuario->id.'.'.$request->image->getClientOriginalExtension();

        $funcionario->imagen_user = $nombre_imagen;

        //$request->image->storeAs('imagenes_de_perfiles', $nombre_imagen);
        $request->image->move($ruta_publica, $nombre_imagen);
        //FIN DE IMAGEN

        $funcionario->save();

        $nuevaAsignacion = new Asignacion();
        $nuevaAsignacion->cargo_id = $request->get('cargo_ident');
        $nuevaAsignacion->funcionario_id = $funcionario->id;
        $nuevaAsignacion->save();

        //ASIGNACION DE PERFILES EXTRAS
        $arrayPerfiles = $request->get('info_perfiles');
        $id_perfiles = explode(',', $arrayPerfiles); //esto tambien es un array
        for ($i = 0; $i < sizeof($id_perfiles); $i++) {
            if($id_perfiles[$i] == '')
                break;
            else{
                $nuevaAsignacionPerfil = new AsignacionPerfil();
                $nuevaAsignacionPerfil->funcionario_id = $funcionario->id;
                $nuevaAsignacionPerfil->cargo_id = $id_perfiles[$i];
                $nuevaAsignacionPerfil->save();
            }
        }
        

        $actualizarCargo = Cargo::find($request->get('cargo_ident'));
        $actualizarCargo->estado = 'OCUPADO';
        $actualizarCargo->save();

        return redirect('/funcionarios')->with('info', 'GUARDADO');
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
        $funcionario_datos = Funcionario::join('users', 'users.id', '=', 'funcionarios.usuario_id')
                        ->join('model_has_roles','model_has_roles.model_id','=','users.id')
                        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                        ->join('asignacions', 'asignacions.funcionario_id', '=', 'funcionarios.id')
                        ->join('cargos', 'cargos.id', '=', 'asignacions.cargo_id')

                        ->selectRaw('
                            users.id,
                            users.name,
                            
                            users.email,
                            
                            users.password,
                            
                            funcionarios.estado,
                            funcionarios.imagen_user,

                            roles.id as rolesid,
                            roles.name as nombre_rol,
                            roles.description,

                            cargos.id as cargo_ident,
                            cargos.nombre_cargo,

                            asignacions.id as id_asignacion

                        ')->find($id);


        $roles_asignados = DB::table('model_has_roles')
            ->where('model_has_roles.model_id','=', $id)
            ->select(DB::raw('rol_id, model_id'));


        $rolesDatos = Role::all();

        $asigPerfiles = AsignacionPerfil::where('asignacion_perfils.funcionario_id', '=', $id)
            ->join('cargos', 'cargos.id', '=', 'asignacion_perfils.cargo_id')
            ->selectRaw('
                
                asignacion_perfils.cargo_id,
                
                cargos.id as cargo_ident,
                cargos.nombre_cargo

            ')->get();



        return view('sistema.personal.funcionario.edit', compact('rolesDatos', 'roles_asignados', 'asigPerfiles'))->with('funcionarioda', $funcionario_datos);
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
        $usr = User::find($id);
        $usr->name = $request->get('name');
        $usr->email = $request->get('email');
        if($request->get('pass') != null)
        {
            $usr->password = Hash::make($request->get('pass'));
        }
        $usr->save();

        if($request->get('roles') != null){
            $usr->roles()->detach(); //Borra la informacion de los roles         
            $usr->assignRole($request->get('roles')); //le asigna los nuevo roles si existieran algun tipo de modificiacion
        }

        
        $funcionario = Funcionario::find($id);
        
        $cargoActual = $request->get('cargo_actual');

        //MODIFICANDO UN CARGO
        if($request->get('cargo_ident') != null) //SI EXISTE UN NUEVO CARGO A REMPLAZAR AL ACTUAL
        {
            $actAsignacion = Asignacion::find($request->get('id_asignacion_actual'));
            $actAsignacion->cargo_id = $request->get('cargo_ident');
            $actAsignacion->funcionario_id = $funcionario->id;
            $actAsignacion->save();

            if($request->get('estado') == 'ACEFALO')
            {
                $funcionario->estado = 'ACTIVO';

                $CargoAct = Cargo::find($cargoActual);
                $CargoAct->estado = 'ACEFALO';
                $CargoAct->save();

                $CargoNvo = Cargo::find($request->get('cargo_ident'));
                $CargoNvo->estado = 'OCUPADO';
                $CargoNvo->save();

            }   
            if($request->get('estado') == 'DESHABILITADO')
            {
                $funcionario->estado = 'DESHABILITADO';

                $actualizarCargo = Cargo::find($cargoActual);
                $actualizarCargo->estado = 'ACEFALO';
                $actualizarCargo->save();
            }
            if($request->get('estado') == 'SUSPENDIDO')
            {
                $funcionario->estado = 'SUSPENDIDO';

                $actualizarCargo = Cargo::find($cargoActual);
                $actualizarCargo->estado = 'SUSPENDIDO';
                $actualizarCargo->save();
            }

        }else{
            //MODIFICANDO EL ESTADO       
            if($request->get('estado') == 'ACEFALO'){
                $funcionario->estado = 'ACTIVO';
                $actualizarCargo = Cargo::find($cargoActual);
                $actualizarCargo->estado = 'OCUPADO';
                $actualizarCargo->save();
            }   
            if($request->get('estado') == 'DESHABILITADO'){
                $funcionario->estado = 'DESHABILITADO';
                $actualizarCargo = Cargo::find($cargoActual);
                $actualizarCargo->estado = 'ACEFALO';
                $actualizarCargo->save();
            }
            if($request->get('estado') == 'SUSPENDIDO'){
                $funcionario->estado = 'SUSPENDIDO';
                $actualizarCargo = Cargo::find($cargoActual);
                $actualizarCargo->estado = 'SUSPENDIDO';
                $actualizarCargo->save();
            }
        }

        $funcionario->save();

        //echo "Datos funcionario guardado";
                //ACTUALIZANDO PERFILES EXTRAS
                if($request->get('info_perfiles') != null)
                {
                    DB::delete('delete from asignacion_perfils where asignacion_perfils.funcionario_id = ?', [$funcionario->id] );

                    $arrayPerfiles = $request->get('info_perfiles');
                    $id_perfiles = explode(',', $arrayPerfiles); //esto tambien es un array
                    
                    for ($i = 0; $i < sizeof($id_perfiles); $i++) 
                    {
                        if($id_perfiles[$i] == ''){
                            break;
                        }
                        else{
                            $nuevaAsignacionPerfil = new AsignacionPerfil();
                            $nuevaAsignacionPerfil->funcionario_id = $funcionario->id;
                            $nuevaAsignacionPerfil->cargo_id = $id_perfiles[$i];
                            $nuevaAsignacionPerfil->save();
                        }
                    }
                }

        return redirect('/funcionarios')->with('info', 'MODIFICADO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    //ACTUALIZA LA IMAGEN DEL USUARIO
    public function cambiarImagen(Request $request, $id)
    {    
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:1024'  //antes de hacer cualquier cosa... se valida la informacion de la imagen (tipo de imagen)
        ]);


        //dd( $request, $request->all(), $funcionario);  // Muestra la informacion que devuelve la vista
        //dd( $request, $request->image->getClientOriginalExtension(), $funcionario); //funciones para imagenes

        $funcionario = Funcionario::find($id);
        $nombre_imagen = 'funcionario_'.$funcionario->id.'.'.$request->image->getClientOriginalExtension();
        try{

            

            DB::beginTransaction();
            
            $funcionario->imagen_user = $nombre_imagen;
            $funcionario->save();
            
            DB::commit();

            $ruta_publica = 'storage/imagenes_de_perfiles/';
            //$request->image->storeAs('imagenes_de_perfiles', $nombre_imagen);
            $request->image->move($ruta_publica, $nombre_imagen);

        }catch(\Throwable $th){
            DB::rollBack();
        }

        $funcionarioda = Funcionario::join('users', 'users.id', '=', 'funcionarios.usuario_id')
                                        ->join('model_has_roles','model_has_roles.model_id','=','users.id')
                                        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                                        ->join('asignacions', 'asignacions.funcionario_id', '=', 'funcionarios.id')
                                        ->join('cargos', 'cargos.id', '=', 'asignacions.cargo_id')

                                        ->selectRaw('
                                            users.id,
                                            users.name,
                                            
                                            users.email,
                                            
                                            users.password,
                                            
                                            funcionarios.estado,

                                            roles.id as rolesid,
                                            roles.name as nombre_rol,
                                            roles.description,

                                            cargos.id as cargo_ident,
                                            cargos.nombre_cargo,

                                            asignacions.id as id_asignacion

                            ')->find($id);


        $roles_asignados = DB::table('model_has_roles')
                    ->where('model_has_roles.model_id','=', $id)
                    ->select(DB::raw('rol_id, model_id'));


        $rolesDatos = Role::all();
        $asigPerfiles = AsignacionPerfil::where('asignacion_perfils.funcionario_id', '=', $id)
                                    ->join('cargos', 'cargos.id', '=', 'asignacion_perfils.cargo_id')
                                    ->selectRaw('
                                    asignacion_perfils.cargo_id,
                                    cargos.id as cargo_ident,
                                    cargos.nombre_cargo
        ')->get();

        return view('sistema.personal.funcionario.edit', compact('rolesDatos', 'roles_asignados', 'asigPerfiles', 'funcionarioda'))->with('info', 'MODIFICADA');

    }
}
