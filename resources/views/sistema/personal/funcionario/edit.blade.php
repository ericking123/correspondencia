@extends('adminlte::page')

@section('title', 'Funcionario')

@section('content_header')
    
@stop

@section('content')
    @inject('cargoServicio', 'App\Servicios\CargoServ')
    
        <div class="card bg-dark elevation-2">
            <div class="card-head">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                    Edición de Funcionario
                </h2>
            </div>
        </div>

    {!! Form::model( $funcionarioda, ['route' => ['funcionarios.update', $funcionarioda->id], 'class'=> 'formulario-crear', 'method' => 'PUT']) !!}
    @csrf
        <div class="card bg-white elevation-2">
            <div class="card-body container">
                
                    <div class="row justify-content-md-center ">
                        <div class="col col-lg-2 mt-4">
                            <label for="staticEmail2" class="visually-hidden">DATOS DEL PERSONAL:</label>
                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="col-auto mb-3 mt-4 ml-4">
                                        
                                        {!! Form::label('name', 'NOMBRE COMPLETO') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre del Funcionario' ]) !!}
                                        @error('name')
                                            <small class="text-danger">
                                                {{$message}}
                                            </small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-auto mb-3 mt-4 ml-4">

                                        {!! Form::label('name', 'CORREO ELECTRONICO') !!}
                                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@aasana.gob.bo', 'required'=>'true']) !!}
                                        @error('name')
                                            <small class="text-danger">
                                                {{$message}}
                                            </small>
                                        @enderror
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="col-auto mb-3 mt-4 ml-4">
                                        <label for="inputPassword2" class="visually-hidden">CONTRASEÑA</label>
                                        <!--<input type="password" class="form-control" value=""  id="pass" name="pass" placeholder="Contraseña">-->
                                        {!! Form::text('pass', null, ['class' => 'form-control', 'placeholder' => 'Password' ]) !!}
                                    </div>    
                                </div>
                                
                                <div class="col">
                                    <div class="col-auto mb-3 mt-4 ml-4" >

                                        <?php
                                            $opciones = [
                                                '' => 'Seleccionar el Estado',
                                                'ACTIVO' => 'ACTIVO',
                                                'DESHABILITADO' => 'DESHABILITADO',
                                                'SUSPENDIDO' => 'SUSPENDIDO'
                                            ];
                                            $selected = 0;
                                        ?>

                                        {!! Form::label('name', 'ESTADO') !!}
                                        {!! Form::select('estado', $opciones, null, ['class' => 'form-control', 'required'=>'true']) !!}
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group ml-4 mt-4 mr-5">
                                <div class="col-6 mb-3">

                                    {!! Form::label('name', 'IMAGEN DE USUARIO') !!} <br>
                                    <button type="button" class="btn btn-default btn-block btn-outline-dark" data-toggle="modal" data-target="#modal-imagen">
                                        <i class="fa fa-fa fw- fa-image"></i> Cambiar Imagen
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-md-center mb-4">
                        <div class="col-4 mt-3">            
                            <strong>ROL ACTUAL: </strong> {{ $funcionarioda->nombre_rol }} 
                        </div>
                        <div class="col-8">               
                            <label class="visually-hidden mb-2">CAMBIAR POR:  </label>
                            <br>
                            @foreach ($rolesDatos ?? '' as $rol)
                                {!! Form::radio('roles[]', $rol->id, null, ['class' => 'mr-1 ml-4']) !!}
                                {{$rol->name}}
                            @endforeach
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-md-center mb-4">
                        <div class="col-4 mt-3">
                            <?php
                                $cargos_datos = DB::table('cargos')
                                                    ->where('cargos.estado','=', 'ACEFALO')
                                                    ->select(DB::raw('nombre_cargo, id'))
                                                    ->orderby(DB::raw('nombre_cargo'));
                                                        
                                $cargosOptions = array('' => 'Designar Nuevo Cargo') + $cargos_datos->pluck('nombre_cargo', 'id')->toArray();        
                            ?>
                                    
                            <input type="hidden" value="{{ $funcionarioda->cargo_ident }}" id="cargo_actual" name="cargo_actual">
                            <input type="hidden" value="{{ $funcionarioda->id_asignacion }}" id="id_asignacion_actual" name="id_asignacion_actual">
                            <strong>CARGO ACTUAL: </strong> {{ $funcionarioda->nombre_cargo }} 
                        </div>

                        <div class="col-8">
                            <label for="staticEmail2" class="visually-hidden mb-2">CAMBIAR POR:  </label>
                            {!! Form::select('cargo_ident', $cargosOptions, null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    
            </div>

            <hr>

            <div class="row justify-content-md-center">
                {!! Form::label('name', 'SELECCIONE UN PERFIL EXTRA PARA EL USUARIO (OPCIONAL) ') !!}          
            </div>

            <br>
                                
            <div class="row justify-content-md-center ml-5 mr-5">
                <div class="col-7">
                    <table id="tabla" class="table table-striped table-bordered elevation-2 mt-4" style="width:100%">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col"> {!! Form::label('name', 'LISTA DE PERFILES') !!} </th>
                            </tr>
                        </thead>

                        <tbody class="list-group" id="tareas">
                            @foreach($cargoServicio->get() as $index=>[$codigo, $objetivo])
                                <tr class="list-group-item" data-identificador={{ $codigo }} name="perfil[]" value={{ $codigo }}>
                                    <td><i class="fas fa-grip-lines mr-2"></i> {{ $objetivo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                                            
                <div class="col-5 mt-5">         
                    <table id="tablaxxx" class="table table-striped table-bordered elevation-2" style="width:100%">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col"> {!! Form::label('name', 'PERFILES ASIGNADOS') !!} </th>
                            </tr>
                        </thead>
                        <tbody class="list-group" id="tareasCompletadas">
                            <input type="hidden" value="" id="info_perfiles" name="info_perfiles">
                                                
                                @if ( $asigPerfiles->count() )
                                    @foreach ($asigPerfiles as $perfilasig)
                                        <tr class="list-group-item" data-identificador={{ $perfilasig->cargo_ident }} value="{{ $perfilasig->cargo_ident }}">
                                            <td><i class="fas fa-grip-lines mr-2"></i> {{ $perfilasig->nombre_cargo }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <!--<div class="card-body">
                                        <strong>No tiene ningun Perfil Extra </strong>
                                    </div>-->
                                @endif
                    </tbody>
                    </table>
                </div>
            </div>

            <hr>
            <!-- BOTONES GUARDAR Y REGRESAR -->
            <div class="col">
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    {!! Form::submit('MODIFICAR INFORMACIÓN', ['class' => 'btn btn-success']) !!}
                    <a href="../" class="btn btn-danger">CANCELAR EDICION</a>
                </div>
            </div>
        </div>
    {!! Form::close() !!}



    <!-- Modal -->
    <div class="modal fade" id="modal-imagen" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {!! Form::open(['route' => ['cambiandoImagen', $funcionarioda->id], 'method' => 'patch', 'files' => true]) !!}
                    
                    <div class="modal-header">
                        <h5 class="modal-title"><label>Cambiar Imagen</label></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            {!! Form::file('image', ['class' => 'form-control', 'required'=>'true']) !!}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="../../css/dataTable/dataTables.bootstrap5.min.css">
    <style>
        .fas {
            cursor: move;
        }
    </style>
@stop

@section('js')
    <script src="../../js/dataTable/jquery-3.5.1.js"></script>
    <script src="../../js/dataTable/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTable/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                "lengthMenu": [[5, 10, -1], [5, 10, 20, "All"]]
            });
        } );
    </script>

    
        @if(session('Guardar') == 'ok')
            <script>
                Swal.fire(
                        'Registro Creado!',
                        'El registro se ha creado con éxito',
                        'success'
                        )
            </script>
        @endif
        
        <script>
            $('.formulario-crear').submit(function(e){
                e.preventDefault();
                Swal.fire({
                        title: '¿Estas seguro?',
                        text: "Este registro se va ha Modificar",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#28a745',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Si, Modificar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        
                        this.submit();
                    }
                })
            });

            $('.formulario-eliminar').submit(function(e){
                e.preventDefault();
                Swal.fire({
                        title: '¿Estas seguro?',
                        text: "Este registro se eliminara definitivamente",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Si, eliminar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        
                        this.submit();
                    }
                })
            });
        </script>

    <!-- SCRIPTS SORTEABLEJS -->
    <script src="../../js/sorteable/Sortable.min.js"></script>
    <script src="../../js/sorteable/options.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        
        @if ( session('info')  == 'MODIFICADA' )
            <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: false,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'La imagen del usuario se ha Reemplazado con Éxito'
                    })
            </script>
        @endif
@stop
