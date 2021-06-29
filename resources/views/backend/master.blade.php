<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="{{asset('/')}}">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <title> Quản Trị ! | </title>
        <!-- Bootstrap -->
        <link href="public/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="public/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!-- NProgress -->
        <link href="public/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="public/backend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="public/backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="public/backend/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="public/backend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="public/backend/build/css/custom.min.css" rel="stylesheet">
        <link href="public/backend/css/style.css" rel="stylesheet">
        
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
               
                @include('backend.layouts.sidebar')
                <!-- top navigation -->
                @include('backend.layouts.header')
                <!-- /top navigation -->
                <!-- page content -->
               @yield('content')
                <!-- /page content -->
                <!-- footer content -->
                @include('backend.layouts.footer')
                <!-- /footer content -->
            </div>
        </div>
        <!-- jQuery -->
        <script src="public/backend/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="public/backend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="public/backend/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="public/backend/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="public/backend/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="public/backend/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="public/backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="public/backend/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="public/backend/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="public/backend/vendors/Flot/jquery.flot.js"></script>
        <script src="public/backend/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="public/backend/vendors/Flot/jquery.flot.time.js"></script>
        <script src="public/backend/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="public/backend/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="public/backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="public/backend/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="public/backend/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="public/backend/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="public/backend/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="public/backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="public/backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="public/backend/vendors/moment/min/moment.min.js"></script>
        <script src="public/backend/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="public/backend/build/js/custom.min.js"></script>
        {{-- ckeditor --}}
        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
        {{-- style js --}}
        <script src="public/backend/js/script.js"></script>
        
    </body>
</html>