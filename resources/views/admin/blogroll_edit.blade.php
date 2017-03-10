@extends('admin/base')

@section('main')

<ol class="breadcrumb">
    <li><span class="text-primary">友链管理</span></li>
    <li class="active">添加链接</li>
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
    <form class="form-horizontal" method="post" action="/admin/blogroll/{{ $blogroll->Id }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-1">链接标题</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="blogroll[title]" value="{{ $blogroll->title }}" id="input-title" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1">链接地址</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="blogroll[link]" value="{{ $blogroll->link }}" id="input-link" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1">排序值</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="blogroll[order_num]" value="{{ $blogroll->order_num }}" id="input-order_num" />
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
