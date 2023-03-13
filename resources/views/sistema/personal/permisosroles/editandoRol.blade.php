@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <div class="card bg-dark elevation-2" style="margin-top: 20px;">
        <div class="card-head">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                Modificar Rol
            </h2>
        </div>
    </div>
@stop

@section('content')
    <div class="card bg-white elevation-2">
        <div class="card-body ">
            <div class="container">
                 
                {!! Form::model( $rolDato, ['route' => ['permissions_roles_auxiliar.update', $rolDato->id], 'class'=> 'formulario-crear', 'method' => 'PUT']) !!}
                @csrf

                    <div class="row">
                        
                        <div class="col-6 mb-3 mt-4 mr-4">
                            <div class="form-group">
                                    {!! Form::label('name', 'NOMBRE DEL ROL') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre para el Rol' ]) !!}
                                    @error('name')
                                        <small class="text-danger">
                                            {{$message}}
                                        </small>
                                    @enderror
                                    
                                    <br><br>
                                    {!! Form::label('name', 'DESCRIPCION') !!}
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción del rol (optativo)', 'value' => '{{$rolDato->description}}' ]) !!}
                                    @error('description')
                                        <small class="text-danger">
                                            {{$message}}
                                        </small>
                                    @enderror
                            </div>

                            <div class="col">
                                <!-- BOTONES GUARDAR CANCELAR -->
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                                    @can('asignarRole_crud')
                                        {!! Form::submit('ACTUALIZANDO ROL', ['class' => 'btn btn-success']) !!}
                                    @endcan
                                    <a href="../../permissions_roles/create" class="btn btn-danger">CANCELAR</a>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-6 col-md-auto mb-3 mt-4 mr-4">
                                <label for="staticEmail2" class="visually-hidden">LISTA DE PERMISOS</label>
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
        @if(session('modificar') == 'ok')
            <script>
                Swal.fire(
                        'Registro Modificado!',
                        'El registro se modificó con éxito',
                        'success'
                        )
            </script>
        @endif

        <script>
            $('.formulario-modificar').submit(function(e){
                e.preventDefault();
                Swal.fire({
                        title: '¿Estas seguro?',
                        text: "Este registro se va ha modificar",
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
        </script>
@stop
