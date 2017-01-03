@extends('admin/base')

@section('own-css')
<style>
.article-title{
    display: block;
    width: 200px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
</style>
@endsection

@section('main')

<ol class="breadcrumb">
    <li><span class="text-primary">文章管理</span></li>
    <li class="active">文章列表</li>
</ol>

<div class="container-fluid" style="margin-bottom: 15px;">
    <a href="/admin/article/add" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;发布新文章</a>
</div>

<div class="container-fluid">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>序号</th>
                <th>标题</th>
                <th>标签</th>
                <th>分类</th>
                <th>状态</th>
                <th>发布时间</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $index++ }}</td>
                <td>
                    <a href="{{ url('articles/view', ['Id' => $article->Id]) }}" data-toggle="tooltip" title="{{ $article->title }}" target="blank" class="article-title">{{ $article->title }}</a>
                </td>
                <td>
                    @if (count($article->tags))
                        @foreach ($article->tags as $tag)
                        <span class="label label-badge" style="background-color: {{ $tag->color }}">{{ $tag->name }}</span>
                        @endforeach
                    @else
                        无
                    @endif
                </td>
                <td>
                    @if (count($article->cates))
                        @foreach ($article->cates as $cate)
                        <span class="label" style="background-color: {{ $cate->color }}">{{ $cate->name }}</span>
                        @endforeach
                    @else
                        无
                    @endif
                </td>
                <td>
                    @if ($article->is_hidden == 0)
                    <span class="text-success">显示</span>
                    @elseif ($article->is_hidden == 1)
                    <span class="text-danger">隐藏</span>
                    @endif
                </td>
                <td>{{ $article->published_at }}</td>
                <td>{{ $article->created_at }}</td>
                <td>
                    <a href="/admin/article/edit/{{ $article->Id }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>&nbsp;编辑</a>
                    @if ($article->is_hidden == 1)
                    <a href="/admin/article/act/show/Id/{{ $article->Id }}" class="btn btn-danger btn-sm"><i class="fa fa-eye"></i>&nbsp;显示</a>
                    @else
                    <a href="/admin/article/act/hide/Id/{{ $article->Id }}" class="btn btn-danger btn-sm"><i class="fa fa-eye-slash"></i>&nbsp;隐藏</a>
                    @endif
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
