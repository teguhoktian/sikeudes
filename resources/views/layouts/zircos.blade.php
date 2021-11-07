<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Desa">
    <meta name="author" content="Hoki Teguh Oktian">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- App title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    @yield('styles')

    <!-- App css -->
    <link href="template/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="template/css/core.css" rel="stylesheet" type="text/css" />
    <link href="template/css/components.css" rel="stylesheet" type="text/css" />
    <link href="template/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="template/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="template/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="template/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="template/plugins/switchery/switchery.min.css">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="template/js/modernizr.min.js"></script>

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">


        @include('layouts.zircos-topbar')
        @include('layouts.zircos-sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                @yield('content')
            </div> <!-- content -->

            <footer class="footer text-right">
                {{ date('Y') }} © SIDESA by RainSoft.id
            </footer>

        </div>

    </div>
    <!-- END wrapper -->



    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="template/js/jquery.min.js"></script>
    <script src="template/js/bootstrap.min.js"></script>
    <script src="template/js/detect.js"></script>
    <script src="template/js/fastclick.js"></script>
    <script src="template/js/jquery.blockUI.js"></script>
    <script src="template/js/waves.js"></script>
    <script src="template/js/jquery.slimscroll.js"></script>
    <script src="template/js/jquery.scrollTo.min.js"></script>
    <script src="template/plugins/switchery/switchery.min.js"></script>

    <!-- App js -->
    <script src="template/js/jquery.core.js"></script>
    <script src="template/js/jquery.app.js"></script>

    @yield('javascript')

</body>

</html>