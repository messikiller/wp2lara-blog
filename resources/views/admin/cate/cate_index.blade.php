@extends('admin/base')

@section('main')
<ol class="breadcrumb">
    <li><span class="text-primary">分类管理</span></li>
    <li class="active">分类列表</li>
</ol>

<div class="container-fluid" style="margin-bottom: 15px;">
    <a href="/admin/cate/create" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;添加新分类</a>
</div>

<div class="container-fluid">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>序号</th>
                <th>分类名称</th>
                <th>分类颜色</th>
                <th>排序值</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            @foreach ($cates[0] as $key => $cate)
                <tr class="parent">
                    <td>{{ $index++ }}</td>
                    <td>
                        <b>{{ $cate->name }}</b>
                        @if (isset($cates[$cate->Id]) && $cates[$cate->Id]->count() > 0)
                            <a href="javascript:;" class="btn btn-default btn-xs btn-collapse pull-right"><i class="fa fa-angle-down"></i></a>
                        @endif
                    </td>
                    <td>
                        <span class="label label-default" style="background-color: {{ $cate->color }}">{{ $cate->color }}</span>
                    </td>
                    <td>{{ $cate->order_num }}</td>
                    <td>{{ $cate->created_at }}</td>
                    <td>
                        <a href="/admin/cate/{{ $cate->Id }}/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>&nbsp;编辑</a>
                        <a href="/admin/cate/{{ $cate->Id }}/delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;删除</a>
                    </td>
                </tr>
                <div>
                @if (isset($cates[$cate->Id]))
                    @foreach ($cates[$cate->Id] as $k => $chid)
                    <tr class="child">
                        @if ($k == 0)
                        <td rowspan="{{ $cates[$cate->Id]->count() }}"></td>
                        @endif
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;∟{{ $chid->name }}</td>
                        <td>
                            <span class="label label-default" style="background-color: {{ $chid->color }}">{{ $chid->color }}</span>
                        </td>
                        <td>{{ $chid->order_num }}</td>
                        <td>{{ $chid->created_at }}</td>
                        <td>
                            <a href="/admin/cate/{{ $chid->Id }}/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>&nbsp;编辑</a>
                            <a href="/admin/cate/{{ $chid->Id }}/delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;删除</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('own-js')
<script type="text/javascript">
$(document).ready(function(){
    $('.btn-collapse').click(function(){
        $(this).parents('tr.parent').nextUntil('tr.parent').toggle();
        if ($(this).children('i.fa').is('.fa-rotate-90')) {
            $(this).children('i.fa').removeClass('fa-rotate-90');
        } else {
            $(this).children('i.fa').removeClass('fa-rotate-90').addClass('fa-rotate-90');
        }
    });
});
</script>
@endsection
