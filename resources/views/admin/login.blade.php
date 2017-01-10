<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="ThemeBucket">
<link rel="shortcut icon" href="#" type="image/png">

<title>Login</title>

<link href="{{ elixir('assets/css/admin_frame.css') }}" rel="stylesheet">
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" method="post" action="{{ url('/admin/check') }}">
        {{ csrf_field() }}
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">登陆系统</h1>
            <img src="{{ asset('assets/images/header-logo.jpg') }}" class="img-circle" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" name="user[name]" class="form-control" placeholder="用户名" autofocus>

            <input type="password" name="user[password]" class="form-control" placeholder="密码">

            <button class="btn btn-login btn-block" type="submit"><span style="font-size: 18px;"><i class="fa fa-sign-in"></i>&nbsp;登陆</span></button>

        </div>
    </form>

</div>

<script src="{{ elixir('assets/js/admin_frame.js') }}"></script>
</body>
</html>
