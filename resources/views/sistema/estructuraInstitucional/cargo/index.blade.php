@extends('adminlte::page')

@section('title', 'Cargo')

@section('content_header')

@stop

@section('content')

    <div class="card bg-dark elevation-2">
        <div class="card-head">
            <div class="row">
                <div class="col-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                        Cargos
                    </h2>
                </div>
                <div class="col-4">
                    @can('cargos_crud')
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearCargo"> 
                                INGRESAR NUEVO CARGO
                            </button>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <!--Ventana Modal para Actualizar-->
    @include('sistema.estructuraInstitucional.cargo.ModalCrearCargo')
    <!-- FIN Ventana Modal para Actualizar-->

    <div class="card bg-white elevation-2">
        <div class="card-body ">
            
            <table id="personalTabla" class="table table-striped table-bordered elevation-2 mt-4" style="width:100%">
                <thead class="bg-dark text-white ">
                    <tr style="text-align: center;">
                        <th scope="col" width="15px"> ACCIONES </th>
                        <th scope="col" width="35px"> IDENTIFICADOR </th>
                        <th scope="col"> NOMBRE DEL CARGO </th>
                        <th scope="col"> UNIDAD </th>
                        <th scope="col"> ESTADO </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cargoDatos as $cargo)
                        <tr>
                            <td width="15px" style="text-align: center;"> 
                                @can('cargos_crud')
                                    <a href="#" data-toggle="modal" data-target="#editCargo{{ $cargo->id }}"  class="btn btn-secondary" title="Modificar Cargo"> 
                                        <i class='fas fa-edit fa-fw fa-1x'></i> 
                                    </a> 
                                @endcan
                            </td>
                            <!--Ventana Modal para Actualizar-->
                            @include('sistema.estructuraInstitucional.cargo.ModalEditarCargo')
                            <!-- FIN Ventana Modal para Actualizar-->

                            <td style="text-align: center;">{{ $cargo->identificador }}</td>
                            <td>{{ $cargo->nombre_cargo }}</td>
                            <td>{{ $cargo->nombre_unidad }}</td>
                            <td style="text-align: center;">{{ $cargo->estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="css/dataTable/dataTables.bootstrap5.min.css">
@stop

@section('js')
        <script src="js/dataTable/jquery-3.5.1.js"></script>
        <script src="js/dataTable/jquery.dataTables.min.js"></script>
        <script src="js/dataTable/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            $(document).ready(function() {
                $('#personalTabla').DataTable({
                    "lengthMenu": [[5, 10, -1], [5, 10, 20, "All"]]
                });
            } );
        </script>

        @if ( session('info')  == 'GUARDADO' )
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

        @if ( session('info')  == 'MODIFICADO' )
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
                        title: 'El Registro se ha Modificado con Éxito'
                    })
            </script>
        @endif

        <!-- Alertas para la CREACION de un CARGO en la regional actual -->
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
        </script>

        @if ( session('info')  == 'CREAR CARGO' )
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
                            title: 'La Unidad se ha Registrado Correctamente'
                        })
                </script>
        @endif

@stop
