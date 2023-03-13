@extends('adminlte::page')

@section('title', 'HR-Interno')

@section('content_header')
    
@stop

@section('content')


    <div class="card bg-dark elevation-2">
        <div class="card-head">
            <div class="row">
                <div class="col-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                            Hojas de Rutas
                    </h2>
                </div>
                <div class="col-4">
                    @can('hojaruta_CEA')
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#guardarHojaRutaInterna">
                                <strong> + | CREAR NUEVA HOJA DE RUTA </strong>
                            </button>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>


    <div class="card bg-white elevation-2">
        <div class="card-body ">

            <table id="tablaHojaRutaInterna" class="table table-striped table-bordered elevation-2 mt-4" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col" width="15px"> </th>
                        <th scope="col" width="140px" style="text-align: center;"> HOJA DE RUTA </th>
                        <th scope="col" width="70px" style="text-align: center;"> TIPO H.R. </th>
                        <th scope="col"> ASUNTO </th>
                        <th scope="col" width="30px" style="text-align: center;"> NRO. DOCS </th>
                        <!--<th scope="col"> PARA </th>-->
                        <th scope="col" width="150px" style="text-align: center;"> FECHA DE CREACION </th>
                        <th scope="col" width="200px" style="text-align: center;"> ACCIONES </th>
                    </tr>
                </thead>

                <tbody>
                    @if ( $HI_Datos->count() )
                        @foreach ($HI_Datos as $hoja)
                            <tr>
                                <td width="15px"> 
                                    @can('hojaruta_CEA')
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editHojaRuta{{ $hoja->id }}" title="MODIFICAR H.R.">
                                            <i class="fas fa-edit fa-fw fa-1x"></i>      
                                        </button>
                                    @endcan
                                </td>
                                <td style="text-align: center;">{{ $hoja->generador_cod }}</td>
                                <td>{{ $hoja->estado_hoja }}</td>
                                <td>{{ $hoja->asunto }}</td>
                                <td style="text-align: center;">{{ $hoja->nro_doc }}</td>
                                <td style="text-align: center;">{{ date_format(date_create($hoja->created_at), "d/m/Y (H:i)") }}</td>

                                <td style="text-align: center;">
                                    
                                    @can('hojaruta_agrupar_archivar_derivar')
                                        <button type="button" class="btn btn-info ml-2 mr-2" data-toggle="modal" data-target="#archivarHojaRuta{{ $hoja->id }}" title="Archivar Hoja de Ruta">
                                            <i class="fas fa-save fa-fw fa-1x" ></i>  
                                        </button>
                                    @endcan

                                    @can('hojaruta_CEA')
                                        <a href="{{ route('hojas_de_ruta.edit', $hoja->id) }}" class="btn btn-warning mr-2" title="Adjuntar Documentos"> <i class='fas fa-plus fa-fw fa-1x'></i> </a> 
                                    @endcan

                                    @can('hojaruta_agrupar_archivar_derivar')
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#derivarHojaRuta{{ $hoja->id }}" title="Derivar Hoja de Ruta"> <i class='fas fa-file-export fa-fw fa-1x'></i> </a>
                                    @endcan

                                </td>
                                
                            </tr>

                            <!--Ventana Modal para Actualizar-->
                            @include('documentos.hojaRuta.ModalEditar')
                            <!-- FIN Ventana Modal para Actualizar-->

                            <!--Ventana Modal para Actualizar-->
                            @include('documentos.hojaRuta.ModalArchivar')
                            <!-- FIN Ventana Modal para Actualizar-->

                            <!--Ventana Modal para DERIVAAR-->
                            @include('documentos.hojaRuta.ModalDerivar')
                            <!-- FIN Ventana Modal para DERIVAR-->

                        @endforeach

                    @else
                        <div class="card-body">
                            <strong>No Tiene Hojas de Ruta Creadas</strong>
                        </div>
                    @endif
                </tbody>
            </table>

            <!--Ventana Modal para Guardar-->
            @include('documentos.hojaRuta.ModalGuardar')
            <!-- FIN Ventana Modal para Guardar-->

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
        
        <!-- <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>-->
        <script src="js/dataTable/dataTables.bootstrap5.min.js"></script> 
        

        <script>
            $(document).ready(function() {
                $('#tablaHojaRutaInterna').DataTable({
                    "lengthMenu": [[5, 10, -1], [5, 10, 20, "All"]]
                });
            } );
        </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--<script src="../js/sweetAlert/sweetalert2@10"></script>-->

        
        <script>
            $('.formulario-crear').submit(function(e){
                e.preventDefault();
                Swal.fire({
                        title: '¿Estas seguro?',
                        text: "La Hoja de Ruta va ha ser Afectada",
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

    @if ( session('info')  == 'HOJA DE RUTA GUARDADA' )
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Hoja de Ruta Generada Satisfactoriamente',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
    @endif

    @if ( session('info')  == 'HOJA DE RUTA MODIFICADA' )
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Hoja de Ruta Modificada Exitosamente',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
    @endif

    @if ( session('info')  == 'HOJA DE RUTA ARCHIVADA' )
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Hoja de Ruta Archivada Satisfactoriamente',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
    @endif

@stop