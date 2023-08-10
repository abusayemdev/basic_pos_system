<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}" defer></script>

         <!-- Fontfaces CSS-->
        <link href="{{asset('public/admin/css/font-face.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('public/admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('public/admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('public/admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="{{asset('public/admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="{{asset('public/admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('public/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('public/admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('public/admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('public/admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('public/admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('public/admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="{{asset('public/admin/css/theme.css')}}" rel="stylesheet" media="all">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}" defer></script>

        


    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

                    <!-- Jquery JS-->
    <script src="{{asset('public/admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('public/admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('public/admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('public/admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('public/admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('public/admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('public/admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('public/admin/js/main.js')}}"></script>




    </body>
</html>
