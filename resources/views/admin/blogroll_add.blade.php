@extends('admin/base')

@section('main')

<ol class="breadcrumb">
    <li><span class="text-primary">友链管理</span></li>
    <li class="active">添加链接</li>
</ol>

<div class="container-fluid">
    <form class="form-horizontal">

        <div class="form-group">
            <label for="input-title" class="col-sm-1">链接标题</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="input-title" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-title" class="col-sm-1">链接地址</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="input-link" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
                <button type="submit" class="btn btn-success">提交</button>
            </div>
        </div>

    </form>
</div>

@endsection
