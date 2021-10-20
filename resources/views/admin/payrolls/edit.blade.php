@extends('layouts.app')

@push('body-atribute')
   class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@push('scripts')
   <script>
      $(".hours").on("change", function(){
         let id = $(this).attr("id").split("_");

         let total = parseFloat($("#price_per_hour_"+id[1]).val()) * parseFloat($("#hours_"+id[1]).val());
         $("#data_total_"+id[1]).html(total + parseFloat($("#bond_amount_"+id[1]).val()) +"$");
         $("#total_"+id[1]).val(total);
      });

      function addBond($number){
         $("#modal-user-number").val($number);
      }

      $("#add_bond_form").submit(function(event){
         event.preventDefault();

         let number = $("#modal-user-number").val();
         $("#bond_"+number).val(1);
         $("#bond_amount_"+number).val($("#modal-amount").val());
         $("#bond_description_"+number).val($("#modal-description").val());

         let total = parseFloat($("#total_"+number).val()) + parseFloat($("#bond_amount_"+number).val());
         $("#data_total_"+number).html(total+"$");

         $("#modal-amount").val("");
         $("#modal-description").val("");
         $("#addBondModal").modal("hide");
         $("#addBondLink-"+number).addClass("hidden");
         $("#showBondLink-"+number).removeClass("hidden");
      });
      
      $("#update_bond_form").submit(function(event){
         event.preventDefault();

         let number = $("#modal-user-number2").val();
         $("#bond_amount_"+number).val($("#modal-amount2").val());
         $("#bond_description_"+number).val($("#modal-description2").val());

         let total = parseFloat($("#total_"+number).val()) + parseFloat($("#bond_amount_"+number).val());
         $("#data_total_"+number).html(total+"$");

         $("#modal-amount2").val("");
         $("#modal-description2").val("");
         $("#showBondModal").modal("hide");
      });

      function showBond($number){
         $("#modal-user-number2").val($number);
         $("#modal-amount2").val($("#bond_amount_"+$number).val());
         $("#modal-description2").val($("#bond_description_"+$number).val());
      }

      function deleteBond(){
         let number = $("#modal-user-number2").val();
         $("#bond_"+number).val(0);
         $("#bond_amount_"+number).val("0");
         $("#bond_description_"+number).val("");

         $("#data_total_"+number).html($("#total_"+number).val()+"$");

         $("#modal-amount2").val("");
         $("#modal-description2").val("");
         $("#showBondModal").modal("hide");
         $("#showBondLink-"+number).addClass("hidden");
         $("#addBondLink-"+number).removeClass("hidden");
      }
   </script>
@endpush

@section('content')
   <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
         <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
               <div class="row breadcrumbs-top">
                  <div class="col-12">
                     <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important">
                        Modificar Nómina
                     </div>
                     <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                           <li class="breadcrumb-item"><a href="#">Financiero</a></li>
                           <li class="breadcrumb-item"><a href="{{ route('admin.payrolls.list') }}">Nóminas</a>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      {{-- Pestaña generar Nomina --}}
      <div class="content-body">
         <div id="table-head table-responsive">
            <div class="col">
               <div class="card" id="card-head1">
                    <form action="{{ route('admin.payrolls.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="payroll_id" value="{{ $payroll->id }}">
                        <div class="row p-2">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                <label for="date">Fecha de inicio</label>
                                <input type="date" class="form-control" name="start_date" value="{{ $payroll->start_date }}" required>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                <label for="dead_line">Fecha de cierre</label>
                                <input type="date" class="form-control" name="dead_line" value="{{ $payroll->dead_line }}" required>
                            </div>
                        </div>
                     
                        <div class="card-header">
                            <h3 class="card-title mb-1">Empleados en la nómina</h3>
                        </div>
                        
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light ">
                                        <tr>
                                            <th>EMPLEADO</th>
                                            <th>CANT. DE HORAS</th>
                                            <th>COSTO DE HORA</th>
                                            <th>TOTAL</th>
                                            <th>BONO</th>
                                            <th>PRESTAMO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $cont = 0; @endphp
                                        @foreach ($payroll->payrolls_employee as $payroll_employee)
                                            @php $cont++; @endphp
                                            <input type="hidden" name="payrolls_employees_count" value="{{ $cont }}">
                                            <input type="hidden" name="payroll_employee_id_{{ $cont }}" value="{{ $payroll_employee->id }}">
                                            <tr>
                                                <td scope="row">{{ $payroll_employee->user->name }} {{ $payroll_employee->user->last_name }}</td>
                                                <td>   
                                                    <input type="text" class="col-7 form-control hours" name="hours_{{ $cont }}" id="hours_{{ $cont }}" value="{{ $payroll_employee->total_hours }}">  
                                                </td>
                                                <td>
                                                    <input type="hidden" name="price_per_hour_{{ $cont }}" id="price_per_hour_{{ $cont }}" value="{{ $payroll_employee->price_by_hour }}">
                                                    <b>{{$payroll_employee->price_by_hour}} $</b>
                                                </td>
                                                <td>
                                                   <input type="hidden" name="total_{{ $cont }}" id="total_{{ $cont }}" value="{{ $payroll_employee->total_amount }}">
                                                   <b id="data_total_{{ $cont }}">
                                                      @if (!is_null($payroll_employee->bond))
                                                         {{ $payroll_employee->total_amount + $payroll_employee->bond->amount }} $
                                                      @else
                                                         {{ $payroll_employee->total_amount }} $
                                                      @endif
                                                   </b>
                                                </td>
                                                <td>
                                                   @if (!is_null($payroll_employee->bond))
                                                      <input type="hidden" name="bond_{{ $cont }}" id="bond_{{ $cont }}" value="1">
                                                      <input type="hidden" name="bond_amount_{{ $cont }}" id="bond_amount_{{ $cont }}" value="{{ $payroll_employee->bond->amount }}">
                                                      <input type="hidden" name="bond_description_{{ $cont }}" id="bond_description_{{ $cont }}" value="{{ $payroll_employee->bond->description }}">
                                                   @else
                                                      <input type="hidden" name="bond_{{ $cont }}" id="bond_{{ $cont }}" value="0">
                                                      <input type="hidden" name="bond_amount_{{ $cont }}" id="bond_amount_{{ $cont }}" value="0">
                                                      <input type="hidden" name="bond_description_{{ $cont }}" id="bond_description_{{ $cont }}">
                                                   @endif
         
                                                   <a @if (!is_null($payroll_employee->bond)) class="hidden" @endif href="#addBondModal" data-toggle="modal" onclick="addBond({{ $cont }});" id="addBondLink-{{ $cont }}" title="Agregar Bono">
                                                      <img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png')}}" alt="Agregar Bono" height="40" width="40">
                                                   </a>
                                                   <a @if (is_null($payroll_employee->bond)) class="hidden" @endif href="#showBondModal" data-toggle="modal" onclick="showBond({{ $cont }});" id="showBondLink-{{ $cont }}" title="Ver Bono">
                                                      <img class="rounded-circle" src="{{ asset('images/svg/coin.svg')}}" alt="Ver Bono" height="40" width="40">
                                                   </a>
                                                </td>    
                                                <td>
                                                    <a href="#prestamo" data-toggle="modal">
                                                        <img class="rounded-circle" src="{{ asset('images/icons/plus-circle.png') }}" alt="Agregar Tecnología" height="40" width="40">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="bottom float-right p-2">
                                    <button type="submit" class="btn btn-primary ">ACTUALIZAR</button>
                                </div
                            </div>
                        </div>
                    </form>
                </div>
            </div>
         </div>
      </div>
   </div>

   {{--   MODAL PARA AGREGAR BONO  --}} 
   <div class="modal fade" id="addBondModal" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Generar Bono </strong></h5>
               <button class="close" style="margin-right:10px; margin-top:1px;" data-dismiss="modal">&times;</button>
            </div>  
            <form id="add_bond_form">
               <div class="modal-body"> 
                  <input type="hidden" id="modal-user-number">
                  <p>Monto</p>
                  <input type="text" class=" form-control" id="modal-amount" required>
                  <br>
                  <p>Concepto</p>
                  <input type="text" class=" form-control" id="modal-description" required>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-primary">CARGAR BONO</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   {{--   MODAL PARA VER BONO  --}} 
   <div class="modal fade" id="showBondModal" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Detalles del Bono </strong></h5>
               <button class="close" style="margin-right:10px; margin-top:1px;" data-dismiss="modal">&times;</button>
            </div>  
            <form id="update_bond_form">
               <div class="modal-body"> 
                  <input type="hidden" id="modal-user-number2">
                  <p>Monto</p>
                  <input type="text" class=" form-control" id="modal-amount2" required>
                  <br>
                  <p>Concepto</p>
                  <input type="text" class=" form-control" id="modal-description2" required>
               </div>
               <div class="modal-footer">
                  <a class="btn btn-danger text-white" onclick="deleteBond();">ELIMINAR BONO</a>
                  <button class="btn btn-primary">ACTUALIZAR BONO</button>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection