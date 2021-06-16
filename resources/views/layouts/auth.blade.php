<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
    @include('layouts.partials.style')

    @stack('styles')
</head>

<body @stack('body-atribute')>

    @yield('content')

    @include('layouts.partials.scripts')

    @stack('scripts')

</body>

</html>