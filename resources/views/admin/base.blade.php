<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>admin</title>
<link rel="stylesheet" href="{{ elixir('assets/css/admin_base.css') }}">
<style type="text/css">
*{
    font-family: "Helvetica Neue",Helvetica,Tahoma,Arial,'Microsoft Yahei','Hiragino Sans GB','WenQuanYi Micro Hei',sans-serif;
}

body{
    background-color: #ffffff;
    padding: 15px;
}
</style>

@yield('own-css')

</head>
<body>

@yield('main')

<script type="text/javascript" src="{{ elixir('assets/js/admin_base.js') }}"></script>

@yield('own-js')

</body>
</html>
