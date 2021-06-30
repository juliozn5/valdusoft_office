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
                            <a class="nav-link nav-link-pills active" data-toggle="tab" href="#attachments" id="empleado" onclick="ocultar()" ><strong> EMPLEADOS </strong></a>
                        </li>
                        <li class="">
                            <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#chat" id="mostrar" onClick="mostrar('generar')"><strong> CLIENTES </strong></a>
                        </li>
                        <li class="">
                            <a class="nav-link nav-link-pills ml-2" data-toggle="tab" href="#accountant" id="mostrar" onClick="mostrar('generar')"><strong> HOSTING </strong></a>
                        </li>
                    </ul>
                </div>
    <div class="d-grid gap-2 d-md-block mb-2 col-4">
    <a href="#prestamo" data-toggle="modal" class="btn1 btn btn-primary mb-2 waves-effect" style="margin-left:130px;" id="generar"> GENERAR</a>
    </div>
</div>


<script>//el boton al entrarTenemos que hacer que cuando entre en la vista el boton no este

function ocultar(){
document.getElementById('generar').style.display = 'none';
}

function mostrar(){
document.getElementById('generar').style.display = 'block';
}

</script>


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
                @foreach ($bills as $bill)
                <tr>
                    <th scope="row">#{{ $bill->id }}</th>
                    <td>{{ $bill->date }}</td>
                    <td>{{ $bill->amount }}$</td>
                    <td>
                        @if ($bill->status == 0)
                            <label class="label status-label status-label-purple">No Atendido</label>
                        @elseif ($bill->status == 1)
                            <label class="label status-label status-label-gray">En Proceso</label>
                        @elseif ($bill->status == 2)
                            <label class="label status-label status-label-blue">Testiando</label>
                        @elseif ($bill->status == 3)
                            <label class="label status-label status-label-green">Completado</label>
                        @endif
                    </td>
                    <td><a href="{{ route('client.bills.detail') }}"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>



<!-- Pestaña de Cliente --><!--
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
                @foreach ($client as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                    @if (!is_null($item->photo))
                        <img class="rounded-circle" width="50px" height="50px" src="{{ $item->photo }}" />
                    @else
                        <img class="rorounded-circleund" width="50px" height="50px" src="{{ asset('images/valdusoft/valdusoft.png') }}" />
                    @endif
                    </td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href="#"><i class="fa fa-eye mr-1 action-icon"></i></a>
                       
                    </td>
                </tr>
                @endforeach
                                </tbody>
                                            </table>
                                        </div>
                                    </div>-->





                                    <!-- Pestaña de Hosting --><!--
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
                @foreach ($hostings as $hosting)
                <tr>
                    <td>{{ $hosting->url }}</td>
                    <td>{{ date('d-m-Y', strtotime($hosting->create_date)) }}</td>
                    <td>{{ $hosting->user->name }} {{ $hosting->user->last_name }}</td>
                    <td>
                        {{ (is_null($hosting->due_date)) ? 'Dato no disponible' : date('d-m-Y', strtotime($hosting->due_date)) }}
                    </td>
                    <td>
                        <a href="#"><i class="fa fa-eye mr-1 action-icon"></i></a>
                    </td>
                </tr>
                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                    </div>
        

 

-->
<!--  MODAL DEL CLIENTE  -->

<div class="modal fade" id="prestamo" aria-hidden="true"  tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Generar Factura</strong></h5>
        <button class="close" style="margin-right:10px; margin-top:1px;" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

    
     <table class="table">
     <thead class="thead-light text-center">
           <th class="col-2">DESCRIPCIÓN</th>
           <th class="col-3">UNIDADES</th>
           <th class="col-3">PRECIO UNITARIO</th>
           <th class="" style="margin-left:50px;">PRECIO</th>
           </thead>
</table>

         
     <div class="container ">
 <div class="row "> 
   <div class="col " >
     <input class="col form-control" type="text"  id="" style="margin-left:px;">
   </div>
   <div class="col">
   <input class="col form-control" type="text"  id="" style="margin-left:;">

   </div>
   <div class="col">
   <input class="col form-control" type="text"  id="" style="margin-left:;">

   </div>
   <div class="col">
   <input class="col form-control" type="text"  id="" style="margin-left:45px;">

   
 </div>
 <div class="col">

 <a href="#" class="float-right"><img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png') }}" alt="Agregar Tecnología" height="40" width="40">
 </div>
 
</div>

        <br>
         <br>                  
     
<ul class="list list-group-flush float mr-3">
  <li class="list-group-item"><strong>TOTAL PARCIAL</strong></li>
  <li class="list-group-item"><strong>DESCUENTO</strong></li>
  <li class="list-group-item"><strong>PAGADO</strong></li>

</ul>

     </div>
           </div>

      <div class="modal-footer">

        <button class="btn btn-primary" data-target="#exampleModalToggle2" data-toggle="modal" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>

@endsection





11:58