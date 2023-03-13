<!--ventana para Update-->
<div class="modal fade" id="crearCargo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #000000 !important;">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
                Generar un Nuevo Cargo
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  


        @inject('regionalServicio', 'App\Servicios\RegionalServ')
        @inject('unidadServicio', 'App\Servicios\UnidadServ')
    
                <form action="{{ route('cargos.store') }}" method="POST" class="formulario-crear">
                    
                    @csrf
    
                    <div class="container mt-4 ml-4">

                        <div class="row mr-4">
                            <div class="col-3">
                                <label>NOMBRE DEL CARGO</label>
                            </div>
                            <div class="col-9">
                                <div class="col-auto mb-3">
                                    <input type="text" class="form-control" id="nomCargo" name="nomCargo" placeholder="Nombre del Cargo" required onkeyup="this.value = this.value.toUpperCase();">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mr-4">    
                            <div class="col-12">
                                    <label>UNIDAD PERTENECIENTE</label>
                                    <select class = "form-control" id = "unidad" name="unidad">
                                        @foreach($unidadServicio->get() as $index=>[$desgTele, $nomUnidad])
                                            <option value = "{{ $index }}">
                                                {{ $desgTele }}   :   {{$nomUnidad}}
                                            </option>
                                        @endforeach
                                    </select>     
                            </div>
                        </div>

                        
                    </div>
    
                    <br>
    
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        <button type="submit" class="btn btn-success">GUARDAR</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
    
                </form>


  
      </div>
    </div>
  </div>

<!---fin ventana Update -->