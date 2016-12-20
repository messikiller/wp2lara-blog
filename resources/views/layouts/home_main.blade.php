<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>messikiller&#039;s blog - 折而不挠，终不为下</title>
<link rel="stylesheet" href="{{ asset('assets/css/index.min.css') }}" media="screen" charset="utf-8">
</head>
<body style="background-color: #eff3f5;">

@include('layouts/home_header')

@include('layouts/home_navbar')

<div id="main">
    <div class="container">
        <div class="row">

            @yield('main')

        </div>
    </div>
</div>

@include('layouts/home_footer')

<script type="text/javascript" src="{{ asset('assets/js/index.min.js') }}"></script>
</body>
</html>
