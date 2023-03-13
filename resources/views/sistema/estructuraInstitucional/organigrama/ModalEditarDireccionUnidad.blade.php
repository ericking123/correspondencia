
<!--ventana para Update-->
<div class="modal fade" id="editDirUnd{{ $organigrama->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
      


            @inject('regionalServicio', 'App\Servicios\RegionalServ')
            @inject('unidadServicio', 'App\Servicios\UnidadServ')
        

                    <form action="{{ route('organigramas.update', $organigrama->id) }}" method="POST" class="formulario-modificar">
                        @csrf
                        @method('PUT')
                        <div class="container">
        
                            <div class="row mr-4 ml-4 mb-4 mt-4">
                                <div class="col-6">
                                    <label>DESIGNADOR TELEGRAFICO</label>
                                    <input type="text" value="{{$organigrama->desg_teleg}}"  class="form-control" id="codigo" name="codigo" placeholder="Codigo" required  onkeyup="this.value = this.value.toUpperCase(); ">
                                </div>
                            </div>
        
                                <div class="row mr-4 ml-4 mb-3">
                                    <div class="col-4">
                                        <label>NOMBRE DE LA UNIDAD</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" value="{{$organigrama->nombre_unidad}}"  class="form-control" id="nomReg" name="nomReg" placeholder="Nombre Unidad" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>


                                <div class="row mr-4 ml-4 mb-3">
                                    <div class="col-4">
                                        <label>DEPENDENCIA</label>        
                                    </div>
                                    <div class="col-8">
                                        <select class = "form-control" id = "unidad" name="unidad">
                                            <option value="{{$organigrama->dependencia}}" selected> {{$organigrama->dependencia}} </option>
                                            <option value="">  </option>
                                            @foreach($unidadServicio->get() as $index=>[$desgTele, $nomUnidad])
                                                <option value = "{{ $desgTele }} : {{$nomUnidad}}">
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