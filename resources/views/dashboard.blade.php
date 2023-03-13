@extends('adminlte::page')

@section('content')

<!-- Main content -->
<section class="content">

    <div class="container mt-5 mb-5">
        <!-- <div class="row justify-content-center"> -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-dark elevation-2"> <strong> BIENVENIDO AL SISTEMA DE CORRESPONDENCIA </strong> </div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br>
                        Hola <strong> {{ Auth::user()->name }} </strong>  has Iniciado Sesion de manera Correcta
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                @can('hojaruta_index')
                    <div class="small-box bg-primary">
                        <div class="inner">

                            <p>Hojas de Ruta (Recibidos)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-folder-plus"></i>
                        </div>
                        <a href="{{url('hojas_de_ruta')}}" class="small-box-footer">Revisar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                @endcan
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                @can('buzonsalida_index')
                    <div class="small-box bg-success">
                        <div class="inner">

                            <p>Hojas de Ruta (Enviados)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <a href="{{url('buzon_salida')}}" class="small-box-footer">Revisar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                @endcan
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                @can('seguimientohojaruta_index')
                    <div class="small-box bg-warning">
                        <div class="inner">

                            <p>Hojas de Ruta (Seguimiento)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <a href="{{url('#')}}" class="small-box-footer">Revisar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                @endcan
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                @can('hojarutaarchivadas_index')
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <p>Hojas de Ruta (Archivados)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <a href="{{url('hr_archivados')}}" class="small-box-footer">Revisar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                @endcan
            </div>
            <!-- ./col -->
        </div>
    </div>


    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                @can('funcionario_index')
                    <div class="small-box bg-dark">
                        <div class="inner">

                            <p>Funcionarios</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{url('funcionarios')}}" class="small-box-footer">Revisar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                @endcan
            </div>
            <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    @can('cargos_index')
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <p>Cargos en la Institución</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <a href="{{url('cargos')}}" class="small-box-footer">Revisar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    @endcan
                </div>
                <!-- ./col -->
            
            <div class="col-lg-3 col-6">
                <!-- small box -->
                @can('organigramas_index')
                    <div class="small-box bg-white">
                        <div class="inner">

                            <p>Organigrama Institucional</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <a href="{{url('organigramas')}}" class="small-box-footer">Revisar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                @endcan
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                    <!-- small box -->
                    @can('asignarRole_index')
                        <div class="small-box bg-info">
                            <div class="inner">
    
                                <p>Roles y Permisos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <a href="{{url('permissions_roles/create')}}" class="small-box-footer">Revisar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    @endcan
                </div>
                <!-- ./col -->
            
            <div class="col-lg-3 col-6">
                <!-- small box -->
                @can('documento_index')
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <p>Elaboración de Documentos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <a href="{{url('documentos')}}" class="small-box-footer">Revisar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                @endcan
            </div>
            <!-- ./col -->
        </div>
    </div>

</section>
<!-- /.content -->
@endsection