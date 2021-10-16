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
                                            <th>FECHA DE RENOVACION</th>      
                                            <th>AÑOS</th>
                                            <th>ESTADO</th>
                                            <th>ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($hostings as $item)
                                        <tr>
                                            <td>{{ $item->url }}</td>
                                            <td>{{ date('d/m/Y', strtotime($item->create_date))}}</td>
                                            <td>{{ date('d/m/Y', strtotime($item->due_date))}}</td>
                                            <td>{{ $item->years }}</td>
                                            <td>
                                                <a href="{{route('client.hosting.showHosting', $item->id)}}"><img id="bottom" src="{{asset('images/icons/Vector.png')}}" alt=""></a>
                                            </td>
                                            {{-- @foreach($variable as $key => $value)
                                              <td>
                                                  @if ($client->status == 0)
                                                     <label class="label status-label status-label-purple">Activo</label>
                                                  @elseif ($client->status == 1)
                                                     <label class="label status-label status-label-gray">Inactivo</label>
                                                  @endif
                                              </td>  
                                            @endforeach --}}
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
@endsection