@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"> </div>

        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Financiero</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Financiero</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Facturas</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="content-body">

<div id="table-head">
    <div class="col-11" style="margin-left:15px">
        <div class="card">
            <div class="card-header">
                <div class="d-grid gap-2 d-md-block mb-2 col-md-8 col-sm-1">
                    <ul class="nav nav-pills nav-justified">
                        <li class="">
                            <a class="nav-link nav-link-pills active" data-toggle="tab" href="#attachments"><strong> EMPLEADOS </strong></a>
                        </li>
                        <li class="">
                            <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#chat"><strong> CLIENTES </strong></a>
                        </li>
                        <li class="">
                            <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#accountant"><strong> HOSTING </strong></a>
                        </li>
                    </ul>
                </div>
    <div class="d-grid gap-2 d-md-block mb-2 col-4">
    
    <a href="#prestamo" data-toggle="modal" class="btn btn-primary mb-2 waves-effect" style="margin-left:130px;"> GENERAR</a>
    </div>
</div>
<div class="tab-content" >

<!-- Pestaña de Empleado -->
    <div class="tab-pane active " id="attachments">
        <div class="table-responsive mt-1">
            <table class="table mb-0">
                <thead class="thead-light text-center">                                    
                    <tr>
                        <th>#</th>
                        <th>NOMBRE</th>
                        <th>FECHA</th>
                        <th>MONTO</th>
                        <th>ESTADO</th>
                        <th class="col-3">ACCIÓN</th>
                    </tr>
                </thead>
            <tbody class="text-center">
                    
                            <tr>
                                <th scope="row">#125</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                               <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="{{route('admin.bills.billadmin')}}"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <th scope="row">#126</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>

                            <th scope="row">#127</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <tr>
                            <th scope="row">#128</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <tr>
                            <th scope="row">#129</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>

                            <tr>
                            <th scope="row">#130</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <tr>
                            <th scope="row">#131</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>


                            <th scope="row">#132</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>

                            <th scope="row">#133</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                    </tbody>
                </table>
            </div>                                        
        </div>            

        
                                             
<!-- Pestaña de Cliente -->
<div class="tab-pane fade" id="chat">    
    <div class="table-responsive mt-1">
        <table class="table mb-0">
            <thead class="thead-light text-center">
            <tr>
                <th>#</th>
                <th>NOMBRE</th>
                <th>FECHA</th>
                <th>MONTO</th>
                <th>ESTADO</th>
                <th class="col-3">ACCIÓN</th>
            </tr>
            <tbody class="text-center">
           
                    
                            <tr>
                                <th scope="row">#125</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                               <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <th scope="row">#126</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>

                            <th scope="row">#127</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <tr>
                            <th scope="row">#128</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <tr>
                            <th scope="row">#129</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>

                            <tr>
                            <th scope="row">#130</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <tr>
                            <th scope="row">#131</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>


                            <th scope="row">#132</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>

                            <th scope="row">#133</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>
                                </tbody>
                                            </table>
                                        </div>
                                    </div>                

                      
                                    <!-- Pestaña de Hosting -->
                                    <div class="tab-pane fade" id="accountant">    
                                   <div class="table-responsive mt-1">
                                      <table class="table mb-0">
                                     <thead class="thead-light text-center">

                                  
                                                    <tr>
                                                        <th>#</th>
                                                        <th>NOMBRE</th>
                                                        <th>FECHA</th>
                                                        <th>MONTO</th>
                                                        <th>ESTADO</th>
                                                        <th class="col-3">ACCIÓN</th>
                                                    </tr>
                                                </thead>
                                                
            <tbody class="text-center">
           
                    
                            <tr>
                                <th scope="row">#125</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                               <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <th scope="row">#126</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>

                            <th scope="row">#127</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <tr>
                            <th scope="row">#128</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <tr>
                            <th scope="row">#129</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>

                            <tr>
                            <th scope="row">#130</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                            <tr>
                            <th scope="row">#131</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>


                            <th scope="row">#132</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>

                            </tr>

                            <th scope="row">#133</th>
                                <td>Freddy Sanchez </td>
                                <td>05/12/21</td>
                                <td>20.36$</td>
                                <td>
                                    <div class="text-center text-white d-inline-block mr-2">
                                        <div class="project-detail-skill" id="process-project">En Proceso</div>
                                </td>
                                <td><a href="#"><i class="fas fa-paper-plane"></i></a>
                                <a href="#"><i class="far fa-eye ml-1"></i></a>
                                <a href="#"><i class="fas fa-ellipsis-v ml-1"></i></a>
                                </td>
                            </tr>

                
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        
                                    </div>                
                    </div>  

                    <div class="bottom " style="margin-left:700px; height:50px; ">

<button class="btn  btn-circle btn-lg "><i style="color:black;" class="fas fa-angle-left"></i>

</button>

<button class="btn btn-primary  btn-circle btn-lg">1

</button>

<button style="color:black;" class="btn btn-circle btn-lg">2

</button>

<button class="btn  btn-circle btn-lg "><i style="color:black;" class="fas fa-angle-right"></i>


</button>
 

</div>

<!--  MODAL DEL CLIENTE  -->


<div class="modal  fade" id="prestamo" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      <p>Generar Factura</p>
        <button class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="">
      <div class="table-responsive">
                            <table class="table col-12">
                                <thead class="thead-light ">

                                    <tr>
                                        <th>DESCRIPCIÓN</th>
                                        <th>UNIDADES</th>
                                        <th>PRECIO UNITARIO</th>
                                        <th>PRECIO</th>
                                        
                                    </tr>
                                </thead>
                                <input type="text" class=" form-control">

                                </table>
      
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

                    
                </div>
                
        </div>
    </div>
@endsection