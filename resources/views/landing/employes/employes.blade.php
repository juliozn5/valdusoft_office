@extends('layouts.app')

@section('content')
    @if (Session::has('msj-exitoso'))
        <script>
            $(document).ready(function () 
                toastr.success('El empleado ha sido creado con éxito.', 'Operación Completada');
            });
        </script>
    @endif


    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">


                    <!--================Blog Categorie Area =================-->
    <section class="card-employes blog_categorie_area section_gap_top">

        <div class="content-header row">

            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title mb-0 mt-1 ml-2">Proyectos</h2>
                        <div class="breadcrumb-wrapper col-12">
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="categories_post">
                        <img src="{{ asset('template/app-assets/images/elements/decore-left.png') }}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="single-blog.html"><h5></h5></a>
                                <div class="border_line"></div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="categories_post">
                        <img src="{{ asset('template/app-assets/images/elements/decore-left.png') }}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="single-blog.html"><h5></h5></a>
                                <div class="border_line"></div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="categories_post">
                        <img src="{{ asset('template/app-assets/images/elements/decore-left.png') }}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="single-blog.html"><h5></h5></a>
                                <div class="border_line"></div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="categories_post">
                        <img src="{{ asset('template/app-assets/images/elements/decore-left.png') }}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="single-blog.html"><h5></h5></a>
                                <div class="border_line"></div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->



            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="card-down mt-2 ml-3">
                    <div class="container-fluid col-3">
                                <img class="img-view" src="{{ asset('images/ilustracion clientes.svg') }}" width="100" height="100" alt="">
                                    <h4 class="text-pao">Ultima factura de la quincena</h4>
                                <a href="·" class="btn-dina btn btn-primary btn-client mt-1"><b>Descargar</b></a>
                        </div>
                    </div>

                    <div class="card-down mt-2 ml-1">
                        <div class="container-fluid col-3 ml-1">
                          
                              <img class="img-view2" src="{{ asset('images/ilustracion nomina.svg') }}" alt="">
                                  <h4 class="text-kei">Valor de la hora de trabajo</h4><br>
                                  <h4 class="text-sy">$ 0.00</h4>
                      </div>
                    </div>

                    <div class="card-down mt-2 ml-1">
                      <div class="container-fluid col-3 ml-1">
                            <img class="img-view3" src="{{ asset('images/ilustracion clientes.svg') }}" alt="">
                                <h4 class="text-mic">Proximas <br> Vacaciones</h4><br>
                                <h4 class="text-chel"><i class="feather icon-clipboard"></i>30 Agosto</h4>
                    </div>
                    </div>

                    </div>

                </section>
            <!-- Dashboard Analytics end -->

                <!--<div class="row" id="table-head">
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
                </div>-->
            </div>


        </div>
    </div>
@endsection
