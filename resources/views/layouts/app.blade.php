<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Sistem Pencetakan Kartu Spp</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('app.css')}}">
        <script src="https://cdn.tailwindcss.com"></script>
        @yield('style')
    </head>
    <body style="font-family: 'Inter', sans-serif; background-color:#e5e6e7">

        <!-- Header -->
            @include('layouts.header')
        <!-- End Header -->
        <!--Sidebar-->
            @include('layouts.sidebar')
        <!--End Sidebar-->
        <!-- Content -->
        <div class="ml-[240px] p-3">
            @yield('content')
        </div>
        <!-- End Content -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
        @yield('script')
    </body>
</html>
