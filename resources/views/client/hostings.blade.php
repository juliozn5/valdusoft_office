@extends('layouts.app')

@section('content')

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
                    </div>
                </div>
            </div>
            </div> 


        <div class="content-body">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-2">Hosting</h3>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light text-center">
                                        <tr>
                                            <th>DOMINIO</th>
                                            <th>FECHA DE INICIO</th>
                                            <th>CLIENTES</th>
                                            <th>AÑOS</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($hostings as $item)
                                        <tr>
                                            <td>{{ $item->url }}</td>
                                            <td>{{ $item->create_date }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->years }}</td>
                                            <td>
                                                <a href="{{route('client.projects.detail')}}"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mr-3">
                                {{ $hostings->links() }}
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
@endsection