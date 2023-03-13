@extends('adminlte::page')

@section('title', 'Adjuntar DOCS')

@section('content_header')
    <div class="card bg-dark shadow elevation-4" style="margin-left: 20px; margin-right: 40px; margin-top: 20px;">
        <div class="card-head">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 10px; margin-bottom: 15px; margin-left: 50px;">
                ADJUNTAR DOCUMENTACIÓN
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


                <!--<a href="regionales/create" class="btn btn-danger mb-3"> INGRESAR NUEVA REGIONAL </a>-->
            

            <hr>
                <form action="/hojas_de_ruta" method="POST" class="formulario-crear">
                @csrf
                
                <div class="container">

                    <div class="row">
                        <div class="col col-lg-2 mt-4">
                            <label for="staticEmail2" class="visually-hidden">ASUNTO</label>
                        </div>
                        <div class="col">
                            <div class="col-auto mt-3">
                                
                                <input type="text" class="form-control" id="descAsunto" name="descAsunto" placeholder="Asunto" required onkeyup="this.value = this.value.toUpperCase();">
                                
                            </div>
                        </div>

                    </div>

                </div>

                <br>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    <button type="submit" class="btn btn-success">GENERAR</button>
                    <a href="/hojas_de_ruta" class="btn btn-danger">CANCELAR</a>
                </div>

            </form>
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
