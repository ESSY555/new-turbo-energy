<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="resources/css/logout.css">

<link rel="stylesheet" href="{{asset('Admin/css/material-dashboard.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  
<div class="wrapper">
    @include('layouts.inc.sidebar')

    <div class="main-content">
        @include('layouts/inc/Adminnav')
        <div class="content">
@yield('content')
        </div>
        @include('layouts.inc.adminfooter')
    </div>
</div>


    <script src="{{asset('Admin/js/popper.min.js')}}"></script>
    <script src="{{asset('Admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Admin/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('Admin/js/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('Admin/js/chartjs.min.js')}}"></script>

</body>
</html>
 