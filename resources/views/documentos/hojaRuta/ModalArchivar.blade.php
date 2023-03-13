
<!--ventana para Update-->
<div class="modal fade" id="archivarHojaRuta{{ $hoja->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #000000 !important;">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Archivar Hoja de Ruta
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="POST" action="{{ route('archivarHRI', $hoja->id) }}" class="formulario-crear">
          @method('PUT')
          @csrf

              <div class="modal-body" id="cont_modal">
  
                  <div class="form-group">
                          <div class="row">
                                  <div class="col-md-auto mb-3 mt-4">
                                      <label for="inputPassword2" class="visually-hidden">NRO. HOJA DE RUTA</label>
                                      <input type="text" class="form-control" id="codigo" name="codigo" value="{{$hoja->generador_cod}}" disabled>
                                  </div>
                                  <div class="col mb-3 mt-4">
      
                                  </div>
                          </div>
                      <label for="recipient-name" class="col-form-label">ASUNTO</label>
                      <input type="text" class="form-control" id="descAsunto" name="descAsunto" value="{{$hoja->asunto}}" disabled>

                      <hr>
                      <label for="recipient-name" class="col-form-label">DETALLE O MOTIVO</label>
                      <input type="text" class="form-control" id="motivoArch" name="motivoArch" placeholder="Ingrese el detalle o motivo para archivar la Hoja de Ruta" required value="" onkeyup="this.value = this.value.toUpperCase();">
                  </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Archivar Hoja de Ruta</button>
              </div>
        </form>
  
      </div>
    </div>
  </div>
  <!---fin ventana Update -->

