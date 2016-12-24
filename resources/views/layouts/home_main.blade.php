<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="x-pjax-version" content="{{ elixir('assets/css/index.css') }}">
<title>messikiller&#039;s blog - 折而不挠，终不为下</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}" media="screen"/>
<link rel="stylesheet" href="{{ elixir('assets/css/index.css') }}" media="screen" charset="utf-8">
</head>
<body style="background-color: #eff3f5;" id="pjax-container">

@include('layouts/home_header')

@include('layouts/home_navbar')

<div id="main">
    <div class="container">
        <div class="row">

            <div class="col-md-8">

                @yield('main')

            </div>

            <div class="col-md-4">

                @include('layouts.home_sidebar')

            </div>

        </div>
    </div>
</div>

@include('layouts/home_footer')

<script type="text/javascript" src="{{ elixir('assets/js/index.js') }}"></script>
</body>
</html>
