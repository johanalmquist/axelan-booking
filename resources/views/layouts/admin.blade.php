<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Axelan | Admin </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('css/admin/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('css/admin/font-awesome/css/font-awesome.min.css') }}">
    <!-- jQuery custom content scroller -->
    <link rel="stylesheet" href="{{ URL::asset('css/admin/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.8.0/sweetalert2.css">
    <link rel="stylesheet" href="{{ URL::asset('css/admin/custom.min.css') }}">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('admin.includes.side-menu')
        @include('admin.includes.top-menu')

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                @yield('content')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ URL::asset('js/admin/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('js/admin/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('js/admin/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ URL::asset('js/admin/nprogress/nprogress.js') }}"></script>
<!-- jQuery custom content scroller -->
<script src="{{ URL::asset('js/admin/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.8.0/sweetalert2.common.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.8.0/sweetalert2.js"></script>
<script src="{{ URL::asset('js/admin/custom.min.js') }}"></script>
@yield('scripts')
@include('includes.messages')
</body>
</html>