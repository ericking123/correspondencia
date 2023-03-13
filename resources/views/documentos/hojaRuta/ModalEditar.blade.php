
<!--ventana para Update-->
<div class="modal fade" id="editHojaRuta{{ $hoja->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #000000 !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            Actualizar Información
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="{{ route('updateHRI', $hoja->id) }}">
        @method('PUT')
        @csrf

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                        <div class="row">
                                <div class="col-md-auto mb-3 mt-4">
                                    <label for="inputPassword2" class="visually-hidden">NRO. HOJA DE RUTA</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo" required value="{{$hoja->generador_cod}}" disabled>
                                </div>
                                <div class="col mb-3 mt-4">
    
                                </div>
                        </div>
                    <label for="recipient-name" class="col-form-label">ASUNTO</label>
                    <input type="text" class="form-control" id="descAsunto" name="descAsunto" placeholder="Asunto" required value="{{$hoja->asunto}}" onkeyup="this.value = this.value.toUpperCase();">
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-info">Guardar Cambios</button>
            </div>
       </form>

    </div>
  </div>
</div>
<!---fin ventana Update -->