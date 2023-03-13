@extends('adminlte::page')

@section('title', 'Funcionario')

@section('content_header')
    
@stop

@section('content')
    @inject('cargoServicio', 'App\Servicios\CargoServ')

        <div class="card bg-dark elevation-2">
            <div class="card-head">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                    Registro de Nuevo Funcionario
                </h2>
            </div>
        </div>
    
    {!! Form::open(['route' => 'funcionarios.store', 'class'=> 'formulario-crear', 'enctype'=>'multipart/form-data']) !!}
    @csrf
        <div class="card bg-white elevation-2">
            <div class="card-body container">

                    <div class="row justify-content-md-center ">
                        <div class="col col-lg-2 mt-4">
                            <label for="staticEmail2" class="visually-hidden">DATOS DEL PERSONAL</label>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="col-auto mb-3 mt-4 ml-4">
                                        
                                        {!! Form::label('name', 'NOMBRE COMPLETO') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'required'=>'true' ]) !!}
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
                                        {!! Form::text('email', null, ['class' => 'form-control', 'required'=>'true']) !!}
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
                                        {!! Form::label('name', 'IMAGEN DE USUARIO') !!}
                                        <br>
                                        
                                        {!! Form::file('image', ['class' => 'form-control', 'required'=>'true']) !!}
                                        
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col-auto mb-3 mt-4 ml-4">
                                        {!! Form::label('name', 'CONTRASEÑA') !!}
                                        {!! Form::text('password', null, ['class' => 'form-control', 'required'=>'true']) !!}
                                            @error('name')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                            @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row mb-4 mt-4">
                        <div class="col-6">
                            <label for="staticEmail2" class="visually-hidden">ASIGNACIÓN DE CARGO</label>
                        
                                <?php
                                    $cargos_datos = DB::table('cargos')
                                                        ->where('cargos.estado','=', 'ACEFALO')  // SOLO SI EL CARGO ESTA DISPONIBLE (ACÉFALO)
                                                        ->select(DB::raw('nombre_cargo, id'))
                                                        ->orderby(DB::raw('nombre_cargo'));
                                                            
                                    $cargosOptions = array('' => 'Seleccionar Cargo') + $cargos_datos->pluck('nombre_cargo', 'id')->toArray();        
                                ?>
                                            
                            {!! Form::select('cargo_ident', $cargosOptions, null, ['class'=>'form-control', 'required'=>'true']) !!}
                                
                        </div>
                    
                        <div class="col-6">
                            <label for="staticEmail2" class="visually-hidden ml-5">ROL</label> <br>
                            @foreach ($rolesDatos as $rol)
                            
                                {!! Form::radio('roles[]', $rol->id, null, ['class' => 'mr-1 ml-5']) !!}
                                {{ $rol->name }}
                                
                            @endforeach
                            
                        </div>
                    </div>
            </div>

            
                    
            <div class="row justify-content-md-center">
                {!! Form::label('name', 'SELECCIONE UN PERFIL EXTRA PARA EL USUARIO (OPCIONAL) ') !!}
            </div>

            <br>

            <div class="row ml-5 mr-5">
                <div class="col-7">
                    <div class="col-auto mb-3">
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
                </div>
                                
                <div class="col-5">
                    <div class="col-auto mt-5">
                        <table id="tablaxxx" class="table table-striped table-bordered elevation-2 mt-4" style="width:100%">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col"> {!! Form::label('name', 'PERFILES ASIGNADOS') !!} </th>
                                </tr>
                            </thead>
                            <tbody class="list-group" id="tareasCompletadas">
                                <div>
                                    <input type="hidden" value="" id="info_perfiles" name="info_perfiles">
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>        
            </div>

            <hr>

            <div class="col">
                <!-- BOTONES GUARDAR Y REGRESAR -->
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    {!! Form::submit('CREAR FUNCIONARIO', ['class' => 'btn btn-success']) !!}
                    <a href="../funcionarios" class="btn btn-danger">CANCELAR REGISTRO</a>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop




@section('css')
    <link rel="stylesheet" href="../css/dataTable/dataTables.bootstrap5.min.css">
    
    <style>
        .fas {
            cursor: move;
        }
    </style>
@stop

@section('js')

    <script src="../js/dataTable/jquery-3.5.1.js"></script>
    <script src="../js/dataTable/jquery.dataTables.min.js"></script>
    <script src="../js/dataTable/dataTables.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
            });
        } );
    </script>



    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
     

            $('.formulario-crear').submit(function(e){
                e.preventDefault();
                Swal.fire({
                        title: '¿Estas seguro?',
                        text: "Este registro se va ha CREAR",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#28a745',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Si, Guardar!',
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
    <script src="../js/sorteable/Sortable.min.js"></script>
    <script src="../js/sorteable/options.js"></script>



@stop
