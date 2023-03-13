@extends('adminlte::page')

@section('title', 'Organigrama')

@section('content_header')

@stop

@section('content')

    <div class="card bg-dark elevation-2">
        <div class="card-head">
            <div class="row">
                <div class="col-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                        Direcciones, Unidades y Áreas del Organigrama
                    </h2>
                </div>
                <div class="col-4">
                    @can('organigramas_crud')
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearUnidad"> 
                                    INGRESAR NUEVO REGISTRO
                            </button>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <!--Ventana Modal para Actualizar-->
    @include('sistema.estructuraInstitucional.organigrama.ModalCrearDireccionUnidad')
    <!-- FIN Ventana Modal para Actualizar-->

    <div class="card bg-white elevation-2">


        <div class="card-body">

            @foreach ($regional_datos as $regional)
                
                    <div class="card border-warning mt-3 mb-3 ml-5 elevation-2" style="max-width: 74rem;">
                        
                        <div class="card-header"><h3> <strong> {{$regional->nom_regional}} </strong> </h3></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="col-auto mb-3 mt-2 ml-5">
                                        <h4 class="card-title"> <strong> Dirección : </strong> {{$regional->direccion}}</h4><br>
                                        <h4 class="card-title">  <strong> Telefono :  </strong> {{$regional->telefono}} </h4>
                                    </div>
                                </div>
                                <div class="col-auto  mt-4">
                                    @can('organigramas_crud')
                                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editRegional{{ $regional->id }}" title="Modificar"> 
                                                Actualizar Información
                                            </button> 
                                        </div>
                                    @endcan
                                </div>

                            </div>
                        </div>

                    </div>
                    
                    <!--Ventana Modal para Actualizar-->
                    @include('sistema.estructuraInstitucional.organigrama.ModalEditarRegional')
                    <!-- FIN Ventana Modal para Actualizar-->

            @endforeach

            <hr>
            <table id="personalTabla" class="table table-striped table-bordered elevation-2 mt-4" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr style="text-align: center;">
                        <th scope="col" width="15px"> ACCIONES </th>
                        <th scope="col" width="150px"> DESG. TELEGRAFICO </th>
                        <th scope="col"> NOMBRE UNIDAD </th>
                        <th scope="col"> DEPENDENCIA </th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($organigramaDatos as $organigrama)
                        <tr>
                            <td width="15px" style="text-align: center;"> 
                                @can('organigramas_crud')
                                    <a href="#" data-toggle="modal" data-target="#editDirUnd{{ $organigrama->id }}"  class="btn btn-secondary" title="Modificar Registro"> 
                                        <i class='fas fa-edit fa-fw fa-1x'></i> 
                                    </a> 
                                @endcan
                            </td>
                            <!--Ventana Modal para Actualizar-->
                            @include('sistema.estructuraInstitucional.organigrama.ModalEditarDireccionUnidad')
                            <!-- FIN Ventana Modal para Actualizar-->
                            
                            <td style="text-align: center;">{{ $organigrama->desg_teleg }}</td>
                            <td>{{ $organigrama->nombre_unidad }}</td>
                            <td>{{ $organigrama->dependencia }}</td>

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
        

        <script>
            $(document).ready(function() {
                $('#personalTabla').DataTable({
                    "lengthMenu": [[5, 10, -1], [5, 10, 20, "All"]]
                });
            } );
        </script>

        <!-- Alertas para la modificacion de la regional actual -->
        @if ( session('info')  == 'MODIFICAR REGIONAL' )
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
                        title: 'El Registro de la Regional ha sido Modificado'
                    })
            </script>
        @endif

        <!-- Alertas para la MODIFICACION DE LA REGIONAL -->
        @if ( session('info')  == 'ACTULIZAR INFORMACION' )
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

        <!-- Alertas para la CREACION de un unidad en la regional actual -->
        @if ( session('info')  == 'CREAR ORGANIGRAMA' )
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

        <!-- Alertas para la MODIFICACION de un unidad en la regional actual -->
        @if ( session('info')  == 'MODIFICAR ORGANIGRAMA' )
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
                        title: 'Se han Modificado los datos de la Unidad con Éxito'
                    })
            </script>
        @endif

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!--<script src="../js/sweetAlert/sweetalert2@10"></script>-->

        <!-- Alertas para la MODIFICACION DE LA REGIONAL -->
        <script>
            $('.formulario-modificarRegional').submit(function(e){
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

        <!-- Alertas para la MODIFICACION DE LA DIRECCION UNIDAD -->
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
