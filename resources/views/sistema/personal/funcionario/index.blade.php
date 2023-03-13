@extends('adminlte::page')

@section('title', 'Funcionario')

@section('content_header')

@stop

@section('content')

    <div class="card bg-dark elevation-2">
        <div class="card-head">
            <div class="row">
                <div class="col-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top: 15px; margin-bottom: 15px; margin-left: 50px;">
                        Funcionarios
                    </h2>
                </div>
                <div class="col-4">
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        @can('funcionario_crud')
                            <a href="funcionarios/create" class="btn btn-success"> INGRESAR NUEVO FUNCIONARIO </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-white elevation-2">
        <div class="card-body ">
            
            <table id="personalTabla" class="table table-striped table-bordered elevation-2 mt-4" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr style="text-align: center;">
                        <th scope="col" width="15px"> </th>
                        <th scope="col"> IMAGEN </th>
                        <th scope="col"> UNIDAD </th>
                        <th scope="col"> NOMBRE </th>
                        <th scope="col"> EMAIL </th>
                        <th scope="col"> CARGO </th>
                        <th scope="col"> ROL DESIGNADO </th>
                        <th scope="col"> ESTADO del personal </th>
                    </tr>
                </thead>

                <tbody>
                    @if ( $funcionarioda->count() )
                        @foreach ($funcionarioda as $funcionario)
                            <tr>
                                <td width="15px"> 
                                    @can('funcionario_crud')
                                        <a href="funcionarios/{{ $funcionario->id }}/edit" class="btn btn-secondary" title="Modificar Estado"> <i class='fas fa-edit fa-fw fa-1x'></i> </a> 
                                    @endcan
                                </td>
                                <td style="text-align: center;">
                                    <img class="profile-user-img img-fluid img-circle" 
                                        src="{{ asset('storage/imagenes_de_perfiles/'.$funcionario->imagen_user) }} " style="width: 75px;">
                                </td>
                                <td style="text-align: center;">{{ $funcionario->identificador }}</td>
                                <td>{{ $funcionario->name }}</td>
                                <td>{{ $funcionario->email }}</td>
                                <td>{{ $funcionario->nombre_cargo }}</td>
                                <td style="text-align: center;">{{ $funcionario->nombre_rol }}</td>
                                <td style="text-align: center;">{{ $funcionario->estado }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="card-body">
                            <strong>No hay Funcionarios Habilitados</strong>
                        </div>
                    @endif

                </tbody>
            </table>

        </div>
    </div>



@stop

@section('css')
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css">-->
    <link rel="stylesheet" href="css/dataTable/dataTables.bootstrap5.min.css">
@stop

@section('js')

        <script src="js/dataTable/jquery-3.5.1.js"></script>
        <script src="js/dataTable/jquery.dataTables.min.js"></script>
        <script src="js/dataTable/dataTables.bootstrap5.min.js"></script>


        <script>
            $(document).ready(function() {
                $('#personalTabla').DataTable({
                    "lengthMenu": [[5, 10, -1], [5, 10, 20, "All"]]
                });
            } );
        </script>

        
        @if ( session('info')  == 'GUARDADO' )
            <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: false,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Se ha Creado un Nuevo Registro'
                    })
            </script>
        @endif

        @if ( session('info')  == 'MODIFICADO' )
            <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: false,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'El Registro se ha Modificado con Éxito'
                    })
            </script>
        @endif
@stop
