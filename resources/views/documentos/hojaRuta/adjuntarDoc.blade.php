@extends('adminlte::page')

@section('title', 'HR-INTERNO')

@section('content_header')
    
@stop

@section('content')

    <div class="card bg-dark elevation-2">
        <div class="card-head">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                Adjuntar Documentación
            </h2>
        </div>
    </div>

    <div class="card bg-white elevation-2">
        <div class="card-body ">
                <div class="col-md-auto ml-4 mt-2">
                    <a href="../" class="btn btn-warning"><i class="fas fa-arrow-left fa-fw fa-1x" title="Volver al listado"></i> <strong> | REGRESAR </strong> </a>
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                            <div class="col-md-auto mb-3 mt-4">
                                <label for="inputPassword2" class="visually-hidden">HOJA DE RUTA</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" value="{{$hojaint->generador_cod}}" disabled>
                            </div>
                            <div class="col mb-3 mt-4">
                                <label for="staticEmail2" class="visually-hidden">ASUNTO</label>
                                <input type="text" class="form-control" id="descAsunto" name="descAsunto" value="{{$hojaint->asunto}}" disabled>
                            </div>
                    </div>
                </div>
        </div>
    </div>

    
        <div class="card bg-white shadow">
            <form action="/hojas_de_ruta/{{$hojaint->id}}" method="POST" class="formulario-modificar">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                                    
                        <div class="form-row clonar">
                            <div class="card-body ">
                                
                                    
                                    <div class="form-group">
                                                    
                                        <div style="margin-left: 50px; margin-top: 5px; margin-right: 50px;">
                                            
                                            <div class="row">
                                                <div class="col">
                                                    <div class="col-auto mb-3" >
                                                        <?php
                                                            $opciones = [
                                                                '' => 'Seleccionar el Tipo de Documento',
                                                                '1' => 'ACTA DE APERTURA PROPUESTAS',
                                                                '2' => 'ACTA DE BECAS',
                                                                '3' => 'ACTA DE CIERRE DE RECEPCIÓN DE PROPUESTAS',
                                                                '4' => 'ACTA DE RECEPCIÓN Y CONFORMIDAD',
                                                                '5' => 'AUTORIZACIÓN DE VIAJE',
                                                                '6' => 'CARTA INTERNA',
                                                                '7' => 'CERTIFICACIÓN POA',
                                                                '8' => 'CERTIFICADO DE TRABAJO',
                                                                '9' => 'CIRCULAR',
                                                                '10' => 'CITACIÓN DE BECAS',
                                                                '11' => 'COMUNICACIÓN INTERNA',
                                                                '12' => 'CONTRATO',
                                                                '13' => 'CONTRATO AMPLIATORIO',
                                                                '14' => 'CONVOCATORIA EXTERNA',
                                                                '15' => 'CONVOCATORIA INTERNA',
                                                                '17' => 'DOCUMENTO BASE DE CONTRATACIÓN ANPE',
                                                                '18' => 'DOCUMENTO BASE DE CONTRATACIÓN LICITACIÓN PÚBLICA',
                                                                '19' => 'ESPECIFICACIONES TÉCNICAS',
                                                                '20' => 'FORMULARIO DE CAJA CHICA',
                                                                '21' => 'INFORME',
                                                                '22' => 'INFORME AMPLIATORIO',
                                                                '23' => 'INFORME DE CALIFICACIÓN',
                                                                '24' => 'INFORME DE CONFIABILIDAD',
                                                                '25' => 'INFORME DE CONTROL INTERNO',
                                                                '26' => 'INFORME DE CONVOCATORIA',
                                                                '27' => 'INFORME DE RECEPCIÓN',
                                                                '28' => 'INFORME DE SEGUIMIENTO',
                                                                '29' => 'INFORME ESPECIAL COMPLEMENTARIO',
                                                                '30' => 'INFORME PRELIMINAR',
                                                                '31' => 'INFORME II',
                                                                '32' => 'INFORME REFORMULADO',
                                                                '33' => 'INSTRUCTIVO',
                                                                '34' => 'MEMORANDUM',
                                                                '35' => 'NOTA ADMINISTRATIVA',
                                                                '36' => 'NOTA INTERNA',
                                                                '37' => 'ORDEN DE COMPRA',
                                                                '38' => 'PEDIDO DE ACTIVOS FIJOS',
                                                                '39' => 'PEDIDO DE MATERIAL',
                                                                '40' => 'PROCESO ADMINISTRATIVO INICIAL',
                                                                '41' => 'RESOLUCIÓN ADMINISTRATIVA YHYD',
                                                                '42' => 'RESOLUCIÓN ADMINISTRATIVA YVYA',
                                                                '43' => 'RESOLUCIÓN INTERNA',
                                                                '44' => 'RESOLUCIÓN DE CONTRATO',
                                                                '45' => 'RESOLUCIÓN DE RECURSO REVOCATORIA',
                                                                '46' => 'RESOLUCIÓN VARIAS',
                                                                '47' => 'RESOLUCIÓN SUMARIA',
                                                                '48' => 'ROL DE TURNOS NOTAM',
                                                                '49' => 'SOLICITUD DE INICIO DE PROCESO DE CONTRATACIÓN',
                                                                '50' => 'SOLICITUD DE PAGO',
                                                                '51' => 'TERMINOS DE REFERENCIA'
                                                            ];
                                                            $selected = 0;
                                                        ?>
                                                        {!! Form::label('name', 'TIPO DE DOCUMENTO') !!}
                                                        {!! Form::select('selectorTipoDocumento', $opciones, null, ['class' => 'form-control', 'required'=>'true']) !!}
                                                    </div>
                                                </div>
                                                <div class="col"></div>
                                            </div>
                                                                        
                                                        
                                            <div class="row">
                                                <div class="col">
                                                    <div class="col-auto">
                                                        <label for="staticEmail2" class="visually-hidden">REFERNCIA O DETALLE DEL DOCUMENTO</label>
                                                        <input type="text" class="form-control" id="fono" name="fono" placeholder="Ingrese el Detalle del documento" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    
                                        
                                    
                                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                                            <span class="badge badge-pill badge-danger puntero ocultar">- | QUITAR DOCUMENTO </span>
                                        </div>

                                        <hr>

                                    </div>
                                
                            </div>
                        </div>
                                                
                        <div id="contenedor"></div>

                    </div>    
                </div>
                

            </form>
        </div>

        
            <div class="card bg-white shadow" >
                <div class="col-md-auto mt-4 mb-4" style="text-align: center;">

                    <button  class="btn btn-info mr-3" id="agregar"><i class="fas fa-plus fa-fw fa-1x" title="Agregar Documento"></i> <strong> | AÑADIR DOCUMENTO </strong> </button>

                    <a href="../" class="btn btn-warning ml-3 mr-3"><i class="fas fa-arrow-left fa-fw fa-1x" title="Volver al listado"></i> <strong> | CANCELAR ADICIÓN </strong> </a>
                    
                    <button  class="btn btn-success ml-3" id=""><i class="fas fa-file-alt fa-fw fa-1x" title="Generar Hoja de ruta con Documentación"></i> <strong> | GENERAR HOJA DE RUTA</strong> </button>
               
                </div>
            </div>
    
    
@stop

@section('css')
    
    
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--<script src="../js/sweetAlert/sweetalert2@10.js"></script>-->
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

        <script>
            
            let agregar = document.getElementById('agregar');
            let contenido = document.getElementById('contenedor');
            agregar.addEventListener('click', e =>{
                e.preventDefault();
                let clonado = document.querySelector('.clonar');
                let clon = clonado.cloneNode(true);

                contenido.appendChild(clon).classList.remove('clonar');

                let remover_ocutar = contenido.lastChild.childNodes[1].querySelectorAll('span');
                remover_ocutar[0].classList.remove('ocultar');
            });

            contenido.addEventListener('click', e =>{
                e.preventDefault();
                if(e.target.classList.contains('puntero')){
                    let contenedor  = e.target.parentNode.parentNode;
                    contenedor.parentNode.removeChild(contenedor);
                }
            });

        </script>
@stop
