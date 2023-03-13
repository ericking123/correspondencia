@extends('adminlte::page')

@section('title', 'Regional')

@section('content_header')
<div class="card bg-light shadow elevation-4" style="margin-left: 20px; margin-right: 40px;">
        <div class="card-head">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 10px; margin-bottom: 15px; margin-left: 50px;">
                Crear Nueva Regional
            </h2>
        </div>
    </div>
@stop

@section('content')
    <div class="card bg-white shadow" style="margin-left: 20px; margin-right: 40px;">
        <div class="card-body ">
            <form action="/regionales" method="POST" class="formulario-crear">
                @csrf

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="col-auto mb-3 mt-4">
                                <label for="inputPassword2" class="visually-hidden">DESIGNADOR TELEGRAFICO</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo" required>
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="col-auto mb-3">
                                <label for="staticEmail2" class="visually-hidden">NOMBRE DE REGIONAL</label>
                                <input type="text" class="form-control" id="nomReg" name="nomReg" placeholder="Nombre Regional" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-auto mb-3">
                                <label for="staticEmail2" class="visually-hidden">AEROPUERTO</label>
                                <input type="text" class="form-control" id="aeropuerto" name="aeropuerto" placeholder="Aeropuerto" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="col-auto mb-3">
                                <label for="staticEmail2" class="visually-hidden">TELEFONO</label>
                                <input type="number" class="form-control" id="fono" name="fono" placeholder="Telefono" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-auto mb-3">
                                <label for="staticEmail2" class="visually-hidden">DIRECCION</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    <button type="submit" class="btn btn-success">GUARDAR</button>
                    <a href="/regionales" class="btn btn-danger">CANCELAR</a>
                </div>

            </form>
        </div>
    </div>

@stop

@section('css')
    
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--<script src="../js/sweetAlert/sweetalert2@10"></script>-->
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
        </script>
@stop
