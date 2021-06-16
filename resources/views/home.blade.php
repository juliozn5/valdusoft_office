@extends('layouts.auth')

@push('body-atribute')
class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page  pace-done"
    data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout"
@endpush

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body position-relative">
            <section class="row flexbox-container bg-body">
                <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4 d-flex justify-content-center"
                    style="z-index: 2;">
                    <div class="container">

                        <div class="bg-auth p-2 text-white rounded">
                            <div class="card-header">
                                <img class="img-fluid center-block logo-center pl-2 pr-2" width="250px" height="230px"
                                    src="{{ asset('images/valdusoft/logo.png') }}" />
                            </div>
                            <h3 class="font-weight-bold text-white text-center pr-2 pl-2 ">Bienvenido al Backoffice</h3>
                            <h3 class="pl-2 pr-2 pt-0 text-white text-center"><b class="text-info">{{ Auth::user()->name }}</b></h3>
                            <div class="card-content">
                                <div class="card-body pt-1 row justify-content-center">
                                    @if ( Auth::user()->profile_id == 0)
                                    <a href="#" class="btn btn-primary">Para poder entrar al Backoffice necesitas un Rol</a>
                                    @elseif ( Auth::user()->profile_id == 1)
                                    <a href="{{ route('admin.home') }}" class="btn btn-primary">Entrar al Backoffice</a>
                                    @elseif ( Auth::user()->profile_id == 2)
                                    <a href="{{ route('client.home') }}" class="btn btn-primary">Entrar al Backoffice</a>
                                    @elseif ( Auth::user()->profile_id == 3)
                                    <a href="{{ route('employes.home') }}" class="btn btn-primary">Entrar al Backoffice</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <img class="img-auth" width="650px" height="500px" style="z-index: 1;" src="{{ asset('images/logo-fondo.png') }}" />
</div>

@endsection
