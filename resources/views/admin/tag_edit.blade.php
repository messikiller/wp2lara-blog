@extends('admin/base')

@section('main')

<ol class="breadcrumb">
    <li><span class="text-primary">标签管理</span></li>
    <li class="active">添加标签</li>
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
    <form class="form-horizontal" method="post" action="/admin/tag/{{ $tag->Id }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="input-name" class="col-sm-1">标签名称</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="tag[name]" id="input-name" value="{{ $tag->name }}" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-color" class="col-sm-1">标签颜色</label>
            <div class="col-md-5">
                <div class="input-group">
                    <input type="text" class="form-control" id="input-color" name="tag[color]"
                    data-provide="colorpicker"
                    data-wrapper="input-group-btn"
                    data-pull-menu-right="true"
                    data-icon="tint"
                    <?php
                        $faker = Faker\Factory::create();
                        $colors = [];
                        for ($i=0; $i < 54; $i++) {
                            $colors[] = $faker->hexcolor;
                        }
                        $colors = implode(',', $colors);
                    ?>
                    data-colors="{{ $colors }}"
                    placeholder="请输入16进制颜色值，例如 #FF00DD" value="{{ $tag->color }}">
                </div>
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
