@extends('admin/base')

@section('main')

<ol class="breadcrumb">
    <li><span class="text-primary">分类管理</span></li>
    <li class="active">编辑分类</li>
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
    <form class="form-horizontal" method="post" action="/admin/cate/{{ $cate->Id }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="input-name" class="col-sm-1">分类名称</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="cate[name]" id="input-name" value="{{ $cate->name }}" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-order_num" class="col-sm-1">排序值</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="cate[order_num]" id="input-order_num" value="{{ $cate->order_num }}" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-pid" class="col-sm-1">父级分类</label>
            <div class="col-md-5">
                <select class="form-control" name="cate[pid]" id="input-pid">
                    <option value="0"
                    @if ($cate->pid == 0)
                        selected="selected"
                    @endif
                    >顶级分类</option>
                    @foreach ($parent_cates as $parent)
                    <option value="{{ $cate->Id }}"
                    @if ($cate->pid == $parent->Id)
                        selected="selected"
                    @endif
                    >&nbsp;∟{{ $parent->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="input-color" class="col-sm-1">分类颜色</label>
            <div class="col-md-5">
                <div class="input-group">
                    <input type="text" class="form-control" id="input-color" name="cate[color]"
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
                    value="{{ $cate->color }}"
                    placeholder="请输入16进制颜色值，例如 #FF00DD">
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
