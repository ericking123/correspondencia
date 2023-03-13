
@extends('adminlte::page')

@section('title', 'HR-Archivados')

@section('content_header')
    
@stop

@section('content')

    <div class="card bg-dark elevation-2">
        <div class="card-head">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                Hojas de Ruta Archivadas
            </h2>
        </div>
    </div>

    <div class="card bg-white elevation-2">
        <div class="card-body ">

            <table id="personalTabla" class="table table-striped table-bordered elevation-2 mt-4" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col" width="15px"> </th>
                        <th scope="col" width="140px" style="text-align: center;"> HOJA DE RUTA </th>
                        <th scope="col"> ASUNTO </th>
                        <!--<th scope="col"> NRO. DE DOCUMENTOS </th>-->
                        <th scope="col"> MOTIVO DE SU ARCHIVO </th>
                        <th scope="col" width="150px" style="text-align: center;"> ARCHIVADO EL </th>
                        <!--<th scope="col" width="200px" style="text-align: center;"> ACCIONES </th>-->
                    </tr>
                </thead>

                <tbody>
                    @if ( $HI_Datos->count() )
                        @foreach ($HI_Datos as $hoja)
                            <tr>
                                
                                <td width="15px"> 
                                    @can('hojaruta_agrupar_archivar_derivar')
                                        <!--<a href="/nueva_hoja_interna/{{ $hoja->id }}/edit" class="btn btn-warning" title="Modificar Hojas Ruta"> <i class='fas fa-edit fa-fw fa-1x'></i> </a> -->
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#reactivarHojaRuta{{ $hoja->id }}">
                                            <i class="fas fa-level-up-alt fa-fw fa-1x" title="Reactivar Hoja de Ruta"></i>  
                                        </button>
                                    @endcan
                                </td>

                                <td>{{ $hoja->generador_cod }}</td>
                                <td>{{ $hoja->asunto }}</td>
                                <td>{{ $hoja->motivo_archivo }}</td>
                                <td>{{ date_format(date_create($hoja->updated_at), "d/m/Y (H:i)") }}</td>
                                
                            </tr>

                            <!--Ventana Modal para Actualizar-->
                              @include('consultas.archivados.ModalReactivar')
                            <!-- FIN Ventana Modal para Actualizar-->

                            

                        @endforeach

                    @else
                        <div class="card-body">
                            <strong>No Tiene Hojas de Ruta Archivadas</strong>
                        </div>
                    @endif
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
        
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--<script src="../js/sweetAlert/sweetalert2@10"></script>-->

        
        <script>
            $('.formulario-crear').submit(function(e){
                e.preventDefault();
                Swal.fire({
                        title: '¿Estas seguro?',
                        text: "La Hoja de Ruta va ha ser REACTIVADA",
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

@stop
