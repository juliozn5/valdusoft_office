@extends('layouts.app')

@section('content')

@include('layouts.partials.navbar')

@include('layouts.partials.sidebar')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
​
        <div class="content-body">
​
            <div id="table-head">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-1">Proyectos</h3>
                        </div>
​
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr class="">
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>FECHA DE INICIO</th>
                                             <th>FECHA DE ENTREGA</th>
                                            <th>ESTADO</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <th scope="row">{{ $project->id }}</th>
                                                <td>{{ $project->name }}</td>
                                                <td>{{ date('d-m-Y', strtotime($project->start_date)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($project->ending_date)) }}</td>
                                           </tr>
                                           <td><a href="{{ route('employee.bills.details') }}"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a></td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
​
                            <div class="mr-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
​
@endsection