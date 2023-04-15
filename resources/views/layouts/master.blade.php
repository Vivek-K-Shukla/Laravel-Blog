<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

      <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body>
@include('layouts.inc.admin-navbar')

<div id="layoutSidenav">
@include('layouts.inc.admin-sidebar')

<div id="layoutSidenav_content">
<main>
@yield('content')
</main>

@include('layouts.inc.admin-footer')
</div>
</div>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>