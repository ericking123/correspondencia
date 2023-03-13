@extends('adminlte::page')

@section('title', 'Hojas de Salida')

@section('content_header')
    
@stop

@section('content')

    <div class="card bg-dark elevation-2">
        <div class="card-head">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                Hojas de Ruta Enviados
            </h2>
        </div>
    </div>


    <div class="card bg-white elevation-2">
        <div class="card-body ">

            <table id="personalTabla" class="table table-striped table-bordered elevation-2 mt-4" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col" width="200px" style="text-align: center;"> ACCIONES </th>
                        <th scope="col" width="140px" style="text-align: center;"> HOJA DE RUTA </th>
                        <th scope="col"> ASUNTO </th>
                        <th scope="col"> PARA </th>
                        <th scope="col" width="150px" style="text-align: center;"> FECHA DE ENVIO </th>
                    </tr>
                </thead>

                <tbody>
                    
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

@stop
