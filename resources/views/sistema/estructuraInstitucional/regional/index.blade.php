@extends('adminlte::page')

@section('title', 'Regional')

@section('content_header')
    <div class="card bg-light shadow elevation-4" style="margin-left: 20px; margin-right: 40px;">
        <div class="card-head">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 10px; margin-bottom: 15px; margin-left: 50px;">
                Lista de Regionales 
            </h2>
        </div>
    </div>
@stop

@section('content')

    

    @if ( session('info') )
    <div class="alert alert-success shadow" style="margin-left: 20px; margin-right: 40px;">
        <strong>{{ session('info') }}</strong>
    </div>
    @endif

    <div class="card bg-white shadow" style="margin-left: 20px; margin-right: 40px;">
        <div class="card-body ">

            @can('regionales_crud')
                <a href="regionales/create" class="btn btn-danger mb-3"> INGRESAR NUEVA REGIONAL </a>
            @endcan

            <hr>
            <table id="personalTabla" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col" width="15px"> ACCIONES </th>
                        <th scope="col"> SIGLA </th>
                        <th scope="col"> REGIONAL </th>
                        <th scope="col"> TELEFONO </th>
                        <th scope="col"> DIRECCION </th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($regionales as $regional)
                        <tr>
                            <td width="15px"> 
                                @can('regionales_crud')
                                    <a href="/regionales/{{ $regional->id }}/edit" class="btn btn-warning" title="Modificar Regional"> 
                                        <i class='fas fa-edit fa-fw fa-1x'></i> 
                                    </a> 
                                @endcan
                            </td>
                            
                            <td>{{ $regional->desg_telegrafico }}</td>
                            <td>{{ $regional->nom_regional }}</td>
                            <td>{{ $regional->telefono }}</td>
                            <td>{{ $regional->direccion }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>



@stop

@section('css')
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css">-->
    <link rel="stylesheet" href="../css/dataTable/dataTables.bootstrap5.min.css">
@stop

@section('js')
        <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
        <script src="../js/dataTable/jquery-3.5.1.js"></script>
        
        <!--<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>-->
        <script src="../js/dataTable/jquery.dataTables.min.js"></script>
        
        <!--<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>-->
        <script src="../js/dataTable/dataTables.bootstrap5.min.js"></script>
        

        <script>
            $(document).ready(function() {
                $('#personalTabla').DataTable({
                    "lengthMenu": [[5, 10, -1], [5, 10, 20, "All"]]
                });
            } );
        </script>

@stop
