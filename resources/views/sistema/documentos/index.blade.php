@extends('adminlte::page')

@section('title', 'Documento')

@section('content_header')

@stop

@section('content')
@inject('cargoDocuementoServicio', 'App\Servicios\CargoDocumentoServ')

    <div class="card bg-dark elevation-2">
        <div class="card-head">
            <div class="row">
                <div class="col-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                        Generador de Documentos
                    </h2>
                </div>
                <div class="col-4">
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        @can('documento_crud')
                            <a href="documentos/create" class="btn btn-success"> CREAR NUEVO DOCUMENTO </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-white elevation-2">
        <div class="card-body ">

            <table id="personalTabla" class="table table-striped table-bordered elevation-2 mt-4" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col" width="15px"> ACCIONES </th>
                        <th scope="col" width="15px"> PREFIJO </th>
                        <th scope="col"> TIPO DE DOCUMENTO </th>
                        <th scope="col"> ORIENTADO PARA LOS SIGUIENTES CARGOS: </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($doc_Datos as $documento)
                        <tr>
                            <td width="15px" style="text-align: center;"> 
                                @can('documento_crud')
                                    <a href="{{ route('documentos.edit', $documento->id) }}"  class="btn btn-secondary" title="Modificar Registro"> 
                                        <i class='fas fa-edit fa-fw fa-1x'></i> 
                                    </a> 
                                @endcan
                            </td>
                            
                            <td style="text-align: center;">{{ $documento->prefijo }}</td>
                            <td>{{ $documento->tipo_documento }}</td>
                            <td>

                                @foreach($cargoDocuementoServicio->get() as $index=>[$cod, $doc, $car])
                                        
                                    @if( $doc == $documento->id)

                                        @foreach($car_Datos as $cargo)
                                            @if($car == $cargo->id)
                                                <span class="right badge badge-info">{{ $cargo->nombre_cargo }}</span>
                                            @endif
                                        @endforeach
                                        
                                    @endif
                                    
                                @endforeach

                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

@stop

@section('css')
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css">-->
    <link rel="stylesheet" href="css/dataTable/dataTables.bootstrap5.min.css">
@stop

@section('js')
        <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
        <script src="js/dataTable/jquery-3.5.1.js"></script>
        
        <!--<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>-->
        <script src="js/dataTable/jquery.dataTables.min.js"></script>
        
        <!--<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>-->
        <script src="js/dataTable/dataTables.bootstrap5.min.js"></script>
        

        <script>
            $(document).ready(function() {
                $('#personalTabla').DataTable({
                    "lengthMenu": [[5, 10, -1], [5, 10, 20, "All"]]
                });
            } );
        </script>

        <!-- Alertas para la generacion del documento actual -->
            @if ( session('info')  == 'DOCUMENTO CREADO' )
                <script>
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Registro Guardado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                </script>
            @endif
        
        <!-- Alertas para la generacion del documento actual -->
        @if ( session('info')  == 'DOCUMENTO MODIFICADO' )
        <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Registro Modificado',
                    showConfirmButton: false,
                    timer: 1500
                })
        </script>
    @endif

@stop
