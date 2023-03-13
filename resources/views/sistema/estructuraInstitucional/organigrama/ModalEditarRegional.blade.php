
<!--ventana para Update-->
<div class="modal fade" id="editRegional{{ $regional->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
  
  
        <form method="POST" action="{{ route('actualizarRegional', $regional->id) }}" class="formulario-modificarRegional"> 
            @csrf
            @method('PUT')
                <div class="container">
                    <div class="row mb-3 mt-4">
                            <div class="col-md-auto ">
                                <label for="inputPassword2" class="visually-hidden">DESIGNADOR TELEGRAFICO</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" required value="{{$regional->desg_telegrafico}}" disabled>
                            </div>
                            <div class="col">
                                <label for="staticEmail2" class="visually-hidden">NOMBRE DE REGIONAL</label>
                                <input type="text" class="form-control" id="nomReg" name="nomReg" placeholder="Nombre Regional" required value="{{$regional->nom_regional}}">
                            </div>
                    </div>

                    
                    <div class="row">
                        <div class="col mt-4">
                            <label for="staticEmail2" class="visually-hidden">DIRECCION</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required value="{{$regional->direccion}}">
                        </div>
                        <div class="col col-lg-5 mt-4">
                            <label for="staticEmail2" class="visually-hidden">TELEFONO</label>
                            <input type="text" class="form-control" id="fono" name="fono" placeholder="Telefono" required value="{{$regional->telefono}}">
                        </div> 
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