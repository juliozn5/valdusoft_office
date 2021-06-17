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
         <!--  <div class="row" id="table-head">
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
                                            <td><img class="rorounded-circleund" width="50px" height="50px" src="{{ asset('images/valdusoft/valdusoft.png') }}" /></td>
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
            </div>-->
            
            <div class="card">
                <div class="ml-1 mb-1 mt-1"><h3>Proyectos</h3></div>
                <div class="">
                    


                    <div class="card">
                        <div class="row ">

                            <div class="container col-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2  text-white" id="shadow"><div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>

                            <div class="container col-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow"><div style="
                                   position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>

                            <div class="container col-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow"><div style="
                                    position: relative;top: 14px;"> Recomiendo</div>                                </div>
                            </div>
                            <div class="container col-2  rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow"><div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>
                            </div>

                            <div class="container col-2 rounded">
                                <img src="{{asset('images/figma/recomiendo.png')}}" class="mt-2" alt="">
                                <div class="pr-1 mt-2 h4 pb-2 text-white" id="shadow"><div style="
                                    position: relative;top: 14px;"> Recomiendo</div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <section class="employes-home">
            <div class="row">
                <div class="col-4">
                    <div class="card p-xl" style="height: 80%">
                        <div class="card-body">
                            <h5 class="col-6">Ultima Factura de la quincena</h5>
                            <br>
                            <a href="#" class="btn btn-primary">Descargar</a>
                            <div class=""><img src="{{asset('/images/figma/group_154.png')}}" style="position:absolute;margin-left: 155px;
                                top: 18px;
                                height: 125px;" alt=""></div>
                        </div>
                    </div>
                </div>


                <div class="col-4">
                    <div class="card p-xl" style="height: 80%">
                        <div class="card-body">
                            <h5 class="col-6">Valor de la hora de trabajo</h5>
                            <br>
                            <p class="h4 " id="holidays-date"><i class="far icon-big mr-1"></i>$ 0.00</p>
                            <img src="{{asset('/images/figma/dolar.png')}}" style="position:absolute;margin-left: 130px;
                            top: 8px;
                            height: 132px;" alt="">

                        </div>
                    </div>
                </div>


                <div class="col-4">
                    <div class="card p-xl" style="height: 80%">
                        <div class="card-body">
                            <h5 class="col-6 mt-1">Proximas <br> Vacaciones</h5>
                            <br>
                            <p class="h4 " id="holidays-date"><i class="far fa-calendar icon-big mr-1"></i>30 Agosto</p>
                            <img src="{{asset('/images/svg/ilustracion_clientes.svg')}}" style="position:absolute;margin-left: 150px;
                            top: 5px;
                            height: 140px;" alt="">

                        </div>
                    </div>
                </div>

            </div>
        </section>
        </div>
    </div>
</div>
</div>
</div>


@endsection