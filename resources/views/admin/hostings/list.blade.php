@extends('layouts.app')

@section('content')
@push('body-atribute')
class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"
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
                        <h2 class="content-header-title float-left mb-0">Hosting</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.hostings.list') }}">Hosting</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">

            <div id="table-head">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-1">Hosting</h3>
                            <a href="{{ route('admin.hostings.create') }}" class="btn btn-primary mb-2 waves-effect waves-light"> Agregar nuevo hosting</a>
                        </div>

                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr class="">
                                            <th>DOMINIO</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>CLIENTE</th>
                                            <th>AÑOS</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hostings as $hosting)
                                        <tr>
                                            <th scope="row">{{ $hosting->url }}</th>
                                            <td>{{ date('d-m-Y', strtotime($hosting->start_date)) }}</td>
                                            <td>
                                                {{$hosting->user->name}}
                                            </td>
                                            <td>
                                                {{$hosting->due_date}}
                                            </td>
                                            <td>
                                                <a href="{{route('admin.hostings.detail')}}" class="mr-2" ><img id="bottom"src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                                 <a href=""><img id="bottom"src="{{asset('images/icons/Group.png')}}" alt=""></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>




@endsection