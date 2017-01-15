<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>admin</title>
  <link href="{{ elixir('assets/css/admin_frame.css') }}" rel="stylesheet">
</head>

<body class="sticky-header">

<section>

    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="/admin"><img src="{{ asset('assets/images/adminex-logo.png') }}" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="/admin"><img src="{{ asset('assets/images/adminex-icon.png') }}" alt=""></a>
        </div>
        <!--logo and iconic logo end-->


        <div class="left-side-inner">

            <!--sidebar nav start-->
            @include('layouts/admin_sidebar')
            <!--sidebar nav end-->

        </div>
    </div>

    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>

            <div class="menu-right">
                <ul class="notification-menu">
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('assets/images/header-logo.jpg') }}" alt="" />
                            {{ $AUTH->getUserInfo('username') }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="/logout"><i class="fa fa-sign-out"></i> 退出</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!--body wrapper start-->
        <iframe class="wrapper" frameborder="0" src="/admin/bloginfo" name="content"></iframe>
        <!--body wrapper end-->
    </div>
    <!-- main content end-->
</section>

<script type="text/javascript" src="{{ elixir('assets/js/admin_frame.js') }}"></script>
</body>
</html>
