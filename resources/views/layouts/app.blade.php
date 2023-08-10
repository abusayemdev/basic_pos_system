<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

    
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">



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
        <link href="{{asset('public/admin/vendor/toastr/toastr.css')}}" rel="stylesheet">
        
        <!-- Main CSS-->
        <link href="{{asset('public/admin/css/theme.css')}}" rel="stylesheet" media="all">

     
        <link rel="stylesheet" type="text/css" 
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')



            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>


            <!-- Jquery JS-->
    <script src="{{asset('public/admin/vendor/jquery-3.6.0.min.js')}}"></script>
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
    <script src="{{asset('public/admin/vendor/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/sweetalert/sweetalert.min.js')}}"></script>
    </script>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


            <!-- Scripts -->
            <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Main JS-->
    <script src="{{asset('public/admin/js/main.js')}}"></script>

    @if(Session::has('message'))
        <script>
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
            </script>
        @endif


        <script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        swal({
            title: "Are you sure?",
            text: "Once deleted, this will be deleted permanently!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
                swal("File has been deleted!", {
                icon: "success",
                });

            } else {
                swal("File is safe!");
            }
        });

    });

</script>


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


       
    </body>
</html>
