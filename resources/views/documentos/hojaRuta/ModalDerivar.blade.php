
<!--ventana para Update-->
<div class="modal fade" id="derivarHojaRuta{{ $hoja->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #000000 !important;">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Derivar o Enviar Hoja De Ruta
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="POST" action="{{ route('derivarHRI', $hoja->id) }}" class="formulario-crear">
          @method('PUT')
          @csrf

              <div class="modal-body" id="cont_modal">
  
                    <div class="form-group">
                            <div class="row">
                                    <div class="col-md-auto mb-3 mt-4">
                                        <label for="inputPassword2" class="visually-hidden">NRO. HOJA DE RUTA</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{$hoja->generador_cod}}" disabled>
                                    </div>
                                    <div class="col">
        
                                    </div>
                            </div>
                        <label for="recipient-name" class="col-form-label">ASUNTO</label>
                        <input type="text" class="form-control" id="descAsunto" name="descAsunto" value="{{$hoja->asunto}}" disabled>

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="col-auto mb-3 mt-4">
                                <label for="staticEmail2" class="visually-hidden">ORIGEN / REMITENTE</label>
                                <input type="text" class="form-control" id="nomReg" name="nomReg" placeholder="Ingrese al Remitente" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-auto mb-3 mt-4">
                                <label for="staticEmail2" class="visually-hidden">DESTINO / RECEPTOR</label>
                                <input type="text" class="form-control" id="aeropuerto" name="aeropuerto" placeholder="Ingrese al Receptor" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col">
                                <div class="col-auto mb-3 mt-4">
                                        <?php
                                        $opciones = [
                                            '' => 'Seleccionar el Nivel de Prioridad',
                                            '1' => 'URGENTE',
                                            '2' => 'PREPARAR RESPUESTA',
                                            '3' => 'PROCESAR COMO CORRESPONDE',
                                            '4' => 'PARA SU CONOCIMIENTO E INFORME',
                                            '5' => 'SEGUIMIENTO',
                                            '6' => 'ARCHIVAR',                                            
                                        ];
                                        $selected = 0;
                                    ?>
                                    {!! Form::label('name', 'NIVEL DE PRIORIDAD') !!}
                                    {!! Form::select('selectorTipoDocumento', $opciones, null, ['class' => 'form-control', 'required'=>'true']) !!}
                                
                                </div>
                            </div>
                            <div class="col">
                            </div>
                    </div>

                        <label for="recipient-name" class="col-form-label">CON COPIA PARA: </label>
                        <div class="col-auto mb-3">
                            <input type="text" class="form-control" id="aeropuerto" name="aeropuerto" placeholder="Destino / Receptor" required>
                        </div>
                        <div class="col-auto mb-3 mt-4">
                            <input type="text" class="form-control" id="aeropuerto" name="aeropuerto" placeholder="Destino / Receptor" required>
                            </div>
                        <div class="col-auto mb-3 mt-4">
                            <input type="text" class="form-control" id="aeropuerto" name="aeropuerto" placeholder="Destino / Receptor" required>
                        </div>
                
                </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="submit" class="btn btn-info">DERIVAR HOJA DE RUTA</button>
              </div>
        </form>
  
      </div>
    </div>
  </div>
  <!---fin ventana Update -->

