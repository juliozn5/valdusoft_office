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
        <section class="hosting">

            <h3 class="card-title mb-2">Holidays</h3>


            <!-- END: Content-->
            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>
            @endsection