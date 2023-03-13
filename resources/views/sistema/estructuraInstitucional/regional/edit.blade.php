@extends('adminlte::page')

@section('title', 'Regional')

@section('content_header')
    <div class="card bg-dark shadow elevation-4" style="margin-top: 20px;">
        <div class="card-head">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 10px; margin-bottom: 15px; margin-left: 50px;">
                Editar Regional
            </h2>
        </div>
    </div>
@stop

@section('content')
    <div class="card bg-white shadow">
        <div class="card-body ">
            <form action="{{ route('regionales.update', $regional->id) }}" method="POST" class="formulario-modificar">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="row">
                            <div class="col-md-auto mb-3 mt-4">
                                <label for="inputPassword2" class="visually-hidden">DESIGNADOR TELEGRAFICO</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo" required value="{{$regional->desg_telegrafico}}" disabled>
                            </div>
                            <div class="col mb-3 mt-4">

                            </div>
                    </div>

                    <div class="row">
                        
                        <div class="col">
                            <!--<div class="col-auto mb-3">
                                <label for="staticEmail2" class="visually-hidden">AEROPUERTO</label>
                                <input type="text" class="form-control" id="aeropuerto" name="aeropuerto" placeholder="Aeropuerto" required value="{{$regional->aeropuerto}}">
                            </div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto mb-3 mt-4">
                            <label for="staticEmail2" class="visually-hidden">NOMBRE DE REGIONAL</label>
                            <input type="text" class="form-control" id="nomReg" name="nomReg" placeholder="Nombre Regional" required value="{{$regional->nom_regional}}">
                        </div>
                        
                        <div class="col mt-4">
                            <label for="staticEmail2" class="visually-hidden">DIRECCION</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required value="{{$regional->direccion}}">
                        </div>
                        <div class="col col-lg-3 mt-4">
                            <label for="staticEmail2" class="visually-hidden">TELEFONO</label>
                            <input type="text" class="form-control" id="fono" name="fono" placeholder="Telefono" required value="{{$regional->telefono}}">
                        </div> 
                    </div>
                </div>

                <br>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    <button type="submit" class="btn btn-success"> MODIFICAR </button>
                    <a href="../../organigramas" class="btn btn-danger"> CANCELAR </a>
                </div>

            </form>
        </div>
    </div>
    
@stop

@section('css')
    
    
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- <script src="js/sweetAlert/sweetalert2@10.js"></script> -->
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
