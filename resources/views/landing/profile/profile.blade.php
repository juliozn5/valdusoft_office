@extends('layouts.app')

@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
@endpush

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="card-employes content-body">

            <div class="comments-area col-4">
            <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img class="img-profile" src="{{ asset('images/ilustracion clientes.svg') }}" alt="">
                        </div>
                        <div class="desc ml-2">
                            <h5><a>Gregorio Zambrano</a></h5>
                            <p class="comment">
                                gregorio_zambano@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        <strong>Proyectos asignados</strong>
        <div class="margin-pa mt-40">
            <div class="container circulo">
            <h3><a href="#" class="content-circle">P1</a><h3>
            </div>
            <div class="container circulop2">
                <h3><a href="#" class="content-circle">P2</a><h3>
                </div>
                <div class="container circulop3">
                    <h3><a href="#" class="content-circle">P3</a><h3>
                    </div>
        </div>

        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-white">
                    <tr>
                        <th>Fecha de naciemiento</th>
                        <th>Fecha de ingreso</th>
                        <th>Proximas vacaciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><i class="feather icon-clipboard"></i>02/10/1987</td>
                        <td><i class="feather icon-clipboard"></i>01/02/2021</td>
                        <td><i class="feather icon-clipboard"></i>01/02/2022</td>
                   <tr>
                </tbody>
            </table>
        </div>
        
        <strong>Skills</strong>

        <div class="button-group-area mt-40">
            <a href="#" class="genric-btn skills circle">PHP</a>
            <a href="#" class="genric-btn skills circle">Vue</a>
            <a href="#" class="genric-btn skills circle">Laravel</a>
            <a href="#" class="genric-btn skills circle">React</a>
            <a href="#" class="genric-btn skills circle">lonic</a>
        </div>


        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-white">
                    <tr>
                        <th>Curriculumk Vitae</th>
                    </tr>
                </thead>
    
                <tbody>
                    <tr>
                        <td>CV_gregorio_zambrano.pdf</td>
                   <tr>
                </tbody>
            </table>
        </div>
    
    
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="thead-white">
                    <tr>
                        <th>Precio por hora</th>
                        <th>Cuenta Uphold</th>
                    </tr>
                </thead>
    
                <tbody>
                    <tr>
                        <th>$4 USD</th>
                        <td>gregorio_zambano@gmail.com</td>
                   <tr>
                </tbody>
            </table>
        </div>
        

        </div>
    </div>
    
</div>

@endsection