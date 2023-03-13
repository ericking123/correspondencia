@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')

@stop

@section('content')

    <div class="card bg-dark elevation-2">
        <div class="card-head">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                Roles y Permisos
            </h2>
        </div>
    </div>

    <div class="card bg-white elevation-2">
        <div class="card-body container">
            <br>
            <div class="row justify-content-md-center ">
                <div class="col col-lg-2 mt-2">
                    <label for="staticEmail2" class="visually-hidden">LISTA DE ROLES REGISTRADOS</label>
                </div>
                <div class="col">
                    <table class="table table-striped table-bordered elevation-2 mt-2" style="width:100%">
                        <thead class="bg-dark text-white">
                            <tr>
                                
                                <th>ID</th>
                                <th>ROLE</th>
                                <th>DESCRIPCIÓN</th>
                                <th style="width: 50px;"></th>
                                <th style="width: 50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listroles as $rol)
                                <tr>
                                    
                                    <td>{{$rol->id}}</td>
                                    <td>{{$rol->name}}</td>
                                    <td>{{$rol->description}}</td>
                                    
                                        <td>
                                            @can('asignarRole_crud')
                                                <a href=" {{ route('permissions_roles_auxiliar.edit', $rol->id) }} " class="btn btn-warning" title="Editar Rol"> <i class='fas fa-edit fa-fw fa-1x'></i></a>
                                            @endcan
                                        </td>
                                        
                                        <td>
                                            @can('asignarRole_crud')
                                                <form action=" {{ route('permissions_roles.destroy', $rol->id) }} " method="POST" class="formulario-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title="Eliminar Rol"> <i class='fas fa-trash fa-fw fa-1x'></i></button>
                                                </form>
                                            @endcan

                                        </td>
                                        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <br>


            <div class="container">
                 
                {!! Form::open(['route' => 'permissions_roles.store', 'class'=> 'formulario-crear']) !!}
                @csrf
                    <label for="staticEmail2" class="visually-hidden"><h4> REGISTRAR UN NUEVO ROL</h4></label>
                    <div class="row">
                        
                        <div class="col-6 mb-3 mt-4 mr-4">
                            <div class="form-group">
                                    {!! Form::label('name', 'NOMBRE DEL ROL') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre para el Rol']) !!}
                                    @error('name')
                                        <small class="text-danger">
                                            {{$message}}
                                        </small>
                                    @enderror
                                    
                                    <br><br>
                                    {!! Form::label('name', 'DESCRIPCION') !!}
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción del rol (optativo)']) !!}
                                    @error('description')
                                        <small class="text-danger">
                                            {{$message}}
                                        </small>
                                    @enderror
                            </div>

                            <div class="col">
                                <!-- CREAR NUEVO ROL -->
                                @can('asignarRole_crud')
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                                    {!! Form::submit('CREAR ROL', ['class' => 'btn btn-success']) !!}
                                    <!--<a href="/permissions_roles" class="btn btn-danger">VOLVER ATRAS</a>-->
                                </div>
                                @endcan
                            </div>

                        </div>
                        

                        <div class="col-6 col-md-auto mb-3 mt-4 mr-4">
                                <label for="staticEmail2" class="visually-hidden">LISTA DE PERMISOS</label>
                                <hr>
                                @foreach ($listpermisos ?? '' as $permiso)
                                    <div>
                                        <label>
                                            {!! Form::checkbox('permissions[]', $permiso->id, null, ['class' => 'mr-3']) !!}
                                            {{ $permiso->description }}
                                        </label>
                                    </div>
                                @endforeach
                        </div>
                        

                    </div>
                    
                {!! Form::close() !!}

            </div>
            
        </div>
    </div>

@stop

@section('css')
    
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                        text: "Este registro se va ha Generar",
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

    @if ( session('info')  == 'ROL REGISTRADO' )
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
                title: 'Se ha Creado un Nuevo Registro'
            })
        </script>
    @endif

    @if ( session('info')  == 'ROL MODIFICADO' )
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
                title: 'Se ha Creado un Nuevo Registro'
            })
        </script>
    @endif

    @if ( session('info')  == 'ROL ELIMANDO' )
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
                title: 'Se ha Creado un Nuevo Registro'
            })
        </script>
    @endif

@stop
