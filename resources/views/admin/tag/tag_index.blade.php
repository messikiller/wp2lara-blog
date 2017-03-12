@extends('admin/base')

@section('main')
<ol class="breadcrumb">
    <li><span class="text-primary">标签管理</span></li>
    <li class="active">标签列表</li>
</ol>

<div class="container-fluid" style="margin-bottom: 15px;">
    <a href="/admin/tag/create" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;添加新标签</a>
</div>

<div class="container-fluid">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>序号</th>
                <th>标签名称</th>
                <th>标签颜色</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = ($tags->currentPage() - 1) * ($tags->perPage()) + 1; ?>
            @foreach ($tags as $tag)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $tag->name }}</td>
                <td>
                    <span class="label label-default" style="background-color: {{ $tag->color }};">{{ $tag->color }}</span>
                </td>
                <td>{{ $tag->created_at }}</td>
                <td>
                    <a href="/admin/tag/{{ $tag->Id }}/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>&nbsp;编辑</a>
                    <a href="/admin/tag/{{ $tag->Id }}/delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;删除</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination">

    {!! $pagination !!}

</div>
@endsection
