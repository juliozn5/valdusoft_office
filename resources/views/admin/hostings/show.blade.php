@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')
@push('scripts')
<script>

function edithosting($hosting) {
    $("#hosting_id").val($hosting.id);
    $("#hosting_url").val($hosting.url);
    $("#date").val($hosting.create_date);
    $("#client option[value=" + $hosting.user_id + "]").attr("selected", true);
    $("#date_end").val($hosting.due_date);
    $("#date_end").val($hosting.years);
    $("#price").val($hosting.price);
    
}

function renovarhosting($hosting) {
$("#renewal_hosting").val($hosting.renewal_hosting);
$("#renewal_price").val($hosting.renewal_price);
}

</script>
@endpush
@include('layouts.partials.navbar')
@include('layouts.partials.sidebar')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <div class="content-header-title float-left" style="padding: 0.5rem 0 0.5rem 1rem !important"><strong>Hostings</strong></div>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.hostings.list') }}">Hostings</a></li>
                                <li class="breadcrumb-item">Detalle del Hosting</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
        <div class="card-body">
            <div class="card-header">
                <div class="h3 col-md-4 col-sm-12">{{$hosting->url}}</div>
                <div>
                  <a type="button" class="btn btn-hos_show mr-1 center" style="background-color:#FF4D00;color: white;" id="btn-guardar" href="https://162.241.102.58:2096/" target="_blank"><img src="{{asset('images/valdusoft/admin.png')}}" alt="" class="mr-1">Ir al Cpanel</a> 
                  <div class="btn btn-hos_show mr-1 center" style="background-color: #06B054;color: white;" href="#renovar" data-toggle="modal" onclick="renovarhosting({{$hosting}});"><img src="{{asset('images/valdusoft/refresh.png')}}" width="18px" alt="" style="margin-right:5px;">Renovar</div>
                  <div class="btn btn-hos_show btn-primary center" href="#edit" data-toggle="modal" onclick="edithosting({{$hosting}});"><img src="{{asset('images/valdusoft/Group.png')}}" alt=""style="margin-right:5px;" >Editar</div>
                </div>
          </div>
       </div>
       <div class="pl-2 pr-2 mt-5">
            <div class="row mt-3 pl-2 pr-2">
                <div class="col-md-3 col-sm-1">
                    <div class="project-detail-titles">Fecha de Inicio</div>
                        <div class="mt-1 project-detail-dates">
                            <img src="{{ asset('images/svg/calendar.svg')}}">
                            <span>{{ date('d/m/Y', strtotime($hosting->create_date))}}</span>
                        </div>
                  </div>
                  <div class="col-md-3 col-sm-1">
                        <div class="project-detail-titles">Fecha de Vencimiento</div>
                            <div class="mt-1 project-detail-dates">
                                <img src="{{ asset('images/svg/calendar.svg')}}">
                                {{-- <span>{{date('d/m/Y', $hosting->renewal_hosting)}}</span> --}}
                                <span>{{date('d/m/Y', strtotime($hosting->due_date) )}}</span>
                            </div>
                        </div>
                  </div> 
              </div>
              <div class="pl-2 pr-2 mt-5">
                  <div class="row mt-3 pl-2 pr-2">
                      <div class="col-md-3 col-sm-1">
                          <div class="project-detail-titles">Precio</div>
                              <div class="mt-1 project-detail-dates">
                                    <span>{{$hosting->price}}$</span>
                              </div>
                         </div>
                         <div class="col-md-3 col-sm-1">
                             <div class="project-detail-titles">Precio de Renovacion</div>
                                 <div class="mt-1 project-detail-dates">
                                     <span>{{$hosting->renewal_price}}$</span>
                                 </div>
                              </div>
                         </div> 
                      </div>
                      <div class="pl-2 pr-2 mt-3">
                          <div class="row mt-3 pl-2 pr-2">
                              <div class="col-md-3 col-sm-1">
                                  <div class="project-detail-titles">Cliente</div>
                                     <div class="mt-1 project-detail-dates">
                                         <span>{{$hosting->user->name}}</span>
                                     </div>
                                  </div>
                              </div>
                          </div>
                          <div class="pl-2 pr-2 mt-3 mb-3">
                                <div class="row mt-3 pl-2 pr-2">
                                   <div class="col-md-12 col-sm-1">
                                        <div class="project-detail-titles">Integración con cPanel</div>
                                            <div class="mt-1 project-detail-dates">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <span><strong>Usuarios:</strong> trovimo</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span><strong>Contraseña:</strong> trovimo2021*</span>
                                                    </div>
                                              </div>
                                          </div>
                                     </div>
                                  </div>
                              </div>
                          </div>
                     </div>
                  </div>
               </div>
          </div>
      </div>
  </div>
</div>
<!--  MODAL EDITAR HOSTING  -->
<div class="modal  fade text-left " id="edit" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title">Editar Hosting</h5>
                <button class="close" style="margin-right:10px; margin-top:1px;" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('admin.hostings.update') }}" method="POST">
                @csrf
                <input type="hidden" name="hosting_id" id="hosting_id"value="{{$hosting->id}}">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="hosting_url"><strong>Dominio</strong></label>
                                <input name="hosting_url" id="hosting_url" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="date"><strong>Fecha</strong></label>
                                <input type="date" name="date" id="date" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="client"><strong>Cliente</strong></label>
                                <select name="client" id="client" class="form-control">
                                    <option value="" selected disabled>Seleccione un cliente...</option>
                                        @foreach ($client as $item)
                                            <option value="{{ $item->id }}">{{ $item->name}} </option> 
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="date_end">Cantidad de años</label>
                                        <select name="date_end" id="date_end" class="form-control" required>
                                            <option value="" selected disabled>Seleccione los años para el hosting...</option>
                                            <option value="1" id="date_end">1 Año</option>
                                            <option value="2" id="date_end">2 Años</option>
                                            <option value="3" id="date_end">3 Anos</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="price"><strong>Precio</strong></label>
                                    <input name="price" id="price" class="form-control">
                                </div>
                        </div>
                    </div>
                </div>                        
                <br><br>                                    
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                </div>
          </form>        
      </div>
   </div>
</div>
<!--  MODAL RENOVAR HOSTING  -->
<div class="modal  fade text-left " id="renovar" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title">Renovar Hosting</h5>
                <button class="close" style="margin-right:10px; margin-top:1px;" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('admin.hostings.renewal') }}" method="POST">
                @csrf
                <input type="hidden" name="hosting_id" id="hosting_id" value="{{$hosting->id}}">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">   
                            <div class="col-md-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="renewal_hosting">Cantidad de la renovacion</label>
                                    <select name="renewal_hosting" id="renewal_hosting" class="form-control" required>
                                        <option value="" selected disabled>Seleccione los años para la renovacion...</option>
                                        <option value="1" id="renewal_hosting">1 Año</option>
                                        <option value="2" id="renewal_hosting">2 Años</option>
                                        <option value="3" id="renewal_hosting">3 Anos</option>
                                   </select>
                                </div>                    
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="renewal_price"><strong>Precio de Renovacion</strong></label>
                                <input name="renewal_price" id="renewal_price" class="form-control">
                           </div>
                        </div>
                    </div>
                </div>                        
                <br><br>                                    
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
                </div>
          </form>        
      </div>
  </div>
</div>
@endsection