@extends('layouts.app')

@push('body-atribute')
    class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush


@section('content')

  <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body mb-5 mt-2">
                {{-- Sección de Proyectos --}}
                <div class="card">
                    <h5 class="card-title">Renovación</h5>
                     <h4 class="text-center">Seleccione el método de pago</h4>
                <div class="d-flex justify-content-center p-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="billetera" onchange="javascript:showContent()">
                        <label class="form-check-label" for="inlineRadio1">Billetera</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="bancolombia" onchange="javascript:showContent2()">
                        <label class="form-check-label" for="inlineRadio2">Bancolombia</label>
                    </div>
                </div>
                <form class="form form-vertical" action="{{ route('save-invoices') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <input type="hidden" id="payment_type" name="payment_type"> 
                    <input type="hidden" id="user_id" name="user_id"> 

                        @include('client.partialShow.bancolombia')
                        @include('client.partialShow.billetera')

                      <div style="padding-left: 69%;">
                        <button type="button" class="btn btn-secondary" pa>Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Renovacion</button>
                      </div>    
                </form>
            </div>
        </div>
    </div>                 
 @include('client.partials.js')
@endsection