<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>admin</title>
<link rel="stylesheet" href="{{ asset('assets/css/admin_base.css') }}">
<style type="text/css">
*{
    font-family: "Helvetica Neue",Helvetica,Tahoma,Arial,'Microsoft Yahei','Hiragino Sans GB','WenQuanYi Micro Hei',sans-serif;
}

body{
    background-color: #eff0f4;
    padding: 15px;
}
</style>
<style type="text/css">
    @yield('own-css')
</style>
</head>
<body>

@yield('main')

<script type="text/javascript" src="{{ asset('assets/js/admin_base.js') }}"></script>
<script type="text/javascript">
    $('html').niceScroll({styler:"fb",cursorcolor:"#65cea7", cursorwidth: '6', cursorborderradius: '0px', background: '#424f63', spacebarenabled:false, cursorborder: '0'});
</script>
<script type="text/javascript">
    @yield('own-js')
</script>
</body>
</html>
