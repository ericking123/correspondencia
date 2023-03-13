<!--ventana para Guardar-->
    <div class="modal fade" id="guardarHojaRutaInterna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #000000 !important;">
              <h6 class="modal-title" style="color: #fff; text-align: center;">
                  Generar Nueva Hoja de Ruta
              </h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
      
      
            <form action="{{ route('hojas_de_ruta.store') }}" method="POST" class="formulario-crear">
                
                @csrf
      
                  <div class="modal-body" id="cont_modal">
                      <div class="form-group">
                          <label for="recipient-name" class="col-form-label">ASUNTO</label>
                          <input type="text" class="form-control" id="descAsunto" name="descAsunto" placeholder="Asunto" required value="" onkeyup="this.value = this.value.toUpperCase();">
                      </div>
                  </div>
      
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                  </div>
             </form>
      
          </div>
        </div>
    </div>
<!---fin ventana Guardar -->


