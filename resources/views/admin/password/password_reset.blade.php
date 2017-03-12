@extends('admin/base')

@section('main')
<ol class="breadcrumb">
    <li><span class="text-primary">系统管理</span></li>
    <li class="active">重置密码</li>
</ol>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid">
    <form class="form-horizontal" method="post" action="/admin/bloginfo/password">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="input-password" class="col-sm-1">新密码</label>
            <div class="col-md-5">
                <input type="password" class="form-control" name="password" id="input-password" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-confirm" class="col-sm-1">确认密码</label>
            <div class="col-md-5">
                <input type="password" class="form-control" name="password_confirmation" id="input-confirm" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
                <button type="submit" class="btn btn-success">确定</button>
            </div>
        </div>
    </form>
</div>

@endsection
