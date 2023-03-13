@extends('adminlte::page')

@section('title', 'Documento')

@section('content_header')
    
@stop

@section('content')
    @inject('regionalServicio', 'App\Servicios\RegionalServ')
    @inject('unidadServicio', 'App\Servicios\UnidadServ')

        <div class="card bg-dark elevation-2">
            <div class="card-head">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                    Crear Nuevo Documento Base
                </h2>
            </div>
        </div>

    <div class="card bg-white elevation-2">
        <div class="card-body ">
           
            {!! Form::open(['route' => 'documentos.store', 'class'=> 'formulario-crear', 'enctype'=>'multipart/form-data']) !!}
    
            @csrf

                <div class="container">

                    <div class="row mb-3">
                        <div class="col mt-4">
                            <label for="inputPassword2" class="visually-hidden">PREFIJO</label>
                            {!! Form::text('pref', null, ['class' => 'form-control', 'placeholder' => 'Ejemp. INF, CAI, CONT, CONT-AMPE, etc.', 'required'=>'true',  'onkeyup'=>"this.value = this.value.toUpperCase();"]) !!}
                            
                        </div>
                        <div class="col mt-4">
                            <label for="staticEmail2" class="visually-hidden">DOCUMENTO</label>
                            {!! Form::text('descDoc', null, ['class' => 'form-control', 'placeholder' => 'Ejemp. INFORME, CARTA INT, CARTA EXT', 'required'=>'true',  'onkeyup'=>"this.value = this.value.toUpperCase();"]) !!}
                            
                        </div>
                        <div class="col mt-4">
                            <label for="staticEmail2" class="visually-hidden">PLANTILLA DEL DOCUMENTO (MODELO ESTANDAR):</label>
                            <button type="button" class="btn btn-default btn-block btn-outline-dark" data-toggle="modal" data-target="#modal-docEstandar">
                                <i class="fa fa-fa fw- fa-file"></i> GENERAR DOCUMENTO
                            </button>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col mt-4">
                                <label for="staticEmail2" class="visually-hidden">SELECCIONA LOS CARGOS PARA LOS QUE VA HA SER UTILIZADO ESTE DOCUMENTO</label>
                            </div>
                            <div class="col-12 mt-4">
                                @foreach ($cargosDatos as $car)
                                        {!! Form::checkbox('cargos[]', $car->id, null, ['class' => 'mr-1 ml-5 mb-3']) !!}
                                        {{ $car->nombre_cargo }} <br>
                                @endforeach
                            </div>
                    </div>

                </div>



                <br>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    {!! Form::submit('GUARDAR', ['class' => 'btn btn-success']) !!}
                    <a href="../documentos" class="btn btn-danger">CANCELAR</a>
                </div>

                <!-- Ventana Modal para la creación del Documento Estandar -->
                @include('sistema.documentos.ModalDocEstandar')
                <!-- FIN Ventana Modal para la creación del Documento Estandar -->

            {!! Form::close() !!}
        </div>
    </div>

    

@stop

@section('css')
	<style>

        @page {
        margin: 160px 50px;
        }

        header { position: fixed;
        left: 0px;
        top: -160px;
        right: 0px;
        height: 100px;
        background-color: #ddd;
        text-align: center;
        }

        header h1{
        margin: 10px 0;
        }

        header h2{
        margin: 0 0 10px 0;
        }
        
        footer {
        position: fixed;
        left: 0px;
        bottom: -50px;
        right: 0px;
        height: 40px;
        border-bottom: 2px solid #ddd;
        }
        footer .page:after {
        content: counter(page);
        }
        footer table {
        width: 100%;
        }
        footer p {
        text-align: right;
        }
        footer .izq {
        text-align: left;
        }

        .row-editor {
            display: flex;
            position: relative;
            justify-content: center;
            overflow-y: auto;
            background-color: #777777;
            border: 1px solid hsl(0, 0%, 77%);
        }

        

        .ck .ck-content,
        /* Decoupled document build. */
        .ck.editor__editable[role='textbox'],
        .ck.ck-editor__editable[role='textbox'],
        /* Inline & Balloon build. */
        
        .ck.editor[role='textbox'] {
            width: 100%;
            background: #fff;
            font-size: 0.6em;
            line-height: 1.3em;
            min-height: var(--ck-sample-editor-min-height);
            padding: 0.5em 0.5em;

            margin-top: 50px; 
            margin-bottom: 50px; 

            /*padding-top: 90px;
            padding-left: 100px;
            padding-right: 100px;
            padding-bottom: 80px;*/

            padding-left: 65px;
            padding-right: 50px;
            padding-top: 5px;
            padding-bottom: 30px;



            height: 792px;
            width: 612px;

            /*margin-top: 0;*/
            /*margin-bottom: 0rem;*/
        }



       

        /* Because of sidebar `position: relative`, Edge is overriding the outline of a focused editor. */
        .ck.ck-editor__editable {
            position: relative;
            z-index: var(--ck-sample-editor-z-index);
        }


        .ck.ck-editor__editable {
            background: #fff;
            border: 1px solid hsl(0, 0%, 70%);
            width: 100%;
        }

        /* Because of sidebar `position: relative`, Edge is overriding the outline of a focused editor. */
        .ck.ck-editor__editable {
            position: relative;
            z-index: var(--ck-sample-editor-z-index);
        }

        .editor-container {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            position: relative;
            width: 100%;
            justify-content: center;
        }


    </style>
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

        <!-- <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
        	 <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/inline/ckeditor.js"></script>-->
		<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/decoupled-document/ckeditor.js"></script>

		<script>
			DecoupledEditor
				.create( document.querySelector( '#editor' ) )
				.then( editor => {
					const toolbarContainer = document.querySelector( '#toolbar-container' );
	
					toolbarContainer.appendChild( editor.ui.view.toolbar.element );
				} )
				.catch( error => {
					console.error( error );
				} );
		</script>

@stop
