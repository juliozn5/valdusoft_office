@extends('layouts.app')

@section('content')
@if (Session::has('msj-exitoso'))
<script>
    $(document).ready(function() toastr.success('El empleado ha sido creado con éxito.', 'Operación Completada');
    });
</script>
@endif


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Empleados</h3>
                            <a href="{{ route('admin.employes.create') }}" class="btn btn-primary mb-2 waves-effect waves-light"><i class="feather icon-plus"></i> Añadir Nuevo</a>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>FOTO</th>
                                            <th>NOMBRE</th>
                                            <th>APELLIDO</th>
                                            <th>FECHA DE NACIMIENTO</th>
                                            <th>FECHA DE INGRESO</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employes as $employe)
                                        <tr>
                                            <td><img class="rorounded-circleund" width="50px" height="50px" src="{{ asset('images/valdusoft.png') }}" /></td>
                                            <td>{{ $employe->name }}</td>
                                            <td>{{ $employe->last_name }}</td>
                                            <td>{{ date('d-m-Y', strtotime($employe->birthdate)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($employe->admission_date)) }}</td>
                                            <td><a href="{{ route('admin.employes.show', [$employe->slug, $employe->id]) }}"><i class="fa fa-eye"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mr-3">
                                {{ $employes->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card pl-1">
                <div class="card-header">
                    <h3 class="card-title mb-2">Proyectos</h3>


                    <div class="container pb-2">
                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3" style="margin-right: 90px;">

                            <div class="col shadow  rounded" style="right:20px;">
                                <img src="{{asset('images/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2  text-white" id="shadow">Recomiendo
                                </div>
                            </div>

                            <div class="col shadow  rounded" style="left:15px;">
                                <img src="{{asset('images/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">Recomiendo
                                </div>
                            </div>

                            <div class="col shadow  rounded" style="left:45px;">
                                <img src="{{asset('images/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">Recomiendo
                                </div>
                            </div>
                            <div class="col shadow  rounded" style="left:80px;">
                                <img src="{{asset('images/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">Recomiendo
                                </div>
                            </div>

                            <div class="col shadow  rounded" style="left:108px;">
                                <img src="{{asset('images/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow">Recomiendo
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ultima Factura de <br> la quincena</h5>
                            <br>
                            <a href="#" class="btn btn-primary">Descargar</a>
                            <img src="{{asset('/images/Group.png')}}" style="position:absolute; margin-left:50px;top:20px; height:100px;" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-4">
                    <div class="card" style="margin-left: 50px;">
                        <div class="card-body">
                            <h5 class="card-title">Valor de la hora<br>de trabajo</h5>

                            <br>
                            <img src="{{asset('/images/icons/ilustre.png')}}" alt="">
                            <img src="{{asset('/images/dolar.png')}}" style="position:absolute; margin-left:89px;top:20px; height:100px;" alt="">

                        </div>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="card" style="margin-left:50px;">
                        <div class="card-body">
                            <h5 class="card-title">Proximas<br>Vacaciones</h5>
                            <br>
                            <p class="h4 " id="holidays-date"><i class="far fa-calendar icon-big mr-1"></i>30 Agosto</p>
                            <img src="{{asset('/images/ilustracion_clientes.svg')}}" style="position:absolute; margin-left:125px;top:20px; height:100px;" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


@endsection