<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Npontu Support Team App</title>

    <!-- Favicons -->
    <link href="{{asset('img/npontu.png')}}" rel="icon">
    <link href="{{asset('img/npontu.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <!--external css-->
    <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/gritter/css/jquery.gritter.css')}}" />
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{asset('lib/chart-master/Chart.js')}}"></script>

</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">

        <!--logo start-->
        <a href="/dashboard" class="logo"><b>NPONTU</b></a>
{{--        <img src="{{asset('img/npontu.png')}}">--}}
        <!--logo end-->

        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="login.html">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="/profile"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
                <h5 class="centered">Sam Soffes</h5>
                <li class="mt">
                    <a class="active" href="/dashboard">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/profile">
                        <i class="fa fa-user"></i>
                        <span>My Profile </span>
                    </a>
                </li>
                <li>
                    <a href="/activities">
                        <i class="fa fa-event"></i>
                        <span>Activities </span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        @yield('content')
        @yield('profile')
        @yield('activities')
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <p>
                &copy; Copyrights <strong> Npontu Limited</strong>
            </p>
        </div>
    </footer>
    <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('lib/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('lib/jquery.sparkline.js')}}"></script>
<!--common script for all pages-->
<script src="{{asset('lib/common-scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/gritter-conf.js')}}"></script>
<!--script for this page-->
<script src="{{asset('lib/sparkline-chart.js')}}"></script>
<script src="{{asset('lib/zabuto_calendar.js')}}"></script>
<script src="{{asset('js/script.js')}}" type="application/javascript"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>

</html>
