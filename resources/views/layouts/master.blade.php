<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hospital </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

    <link href="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ asset('vendor/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('vendor/jquery-asColorPicker/css/asColorPicker.min.css') }}" rel="stylesheet">
    <!-- Material color picker -->
    <link href="{{ asset('vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/pickadate/themes/default.date.css') }}">


    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">


</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">

                <a href="index.html" class="brand-logo">
                   {{-- <img class="logo-abbr" src="{{ asset('images/focus.png') }}" alt="" width="100%"> --}}
                   {{--   <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="">
                    <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt=""> --}}
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
       <x-top/>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
     <x-sidebar/>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        @yield('contenu')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>


    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


    <script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/select2-init.js') }}"></script>



    <script src="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- clockpicker -->
    <script src="{{ asset('vendor/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
    <!-- asColorPicker -->
    <script src="{{ asset('vendor/jquery-asColor/jquery-asColor.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-asGradient/jquery-asGradient.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js') }}"></script>
    <!-- Material color picker -->
    <script src="{{ asset('vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <!-- pickdate -->
    <script src="{{ asset('vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('vendor/pickadate/picker.date.js') }}"></script>



    <!-- Daterangepicker -->
    <script src="{{ asset('js/plugins-init/bs-daterange-picker-init.js') }}"></script>
    <!-- Clockpicker init -->
    <script src="{{ asset('js/plugins-init/clock-picker-init.js') }}"></script>
    <!-- asColorPicker init -->
    <script src="{{ asset('js/plugins-init/jquery-asColorPicker.init.js') }}"></script>
    <!-- Material color picker init -->
    <script src="{{ asset('js/plugins-init/material-date-picker-init.js') }}"></script>
    <!-- Pickdate -->
    <script src="{{ asset('js/plugins-init/pickadate-init.js') }}"></script>






</body>

</html>
