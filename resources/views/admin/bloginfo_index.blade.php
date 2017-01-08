@extends('admin/base')

@section('main')
<ol class="breadcrumb">
    <li><span class="text-primary">配置信息</span></li>
    <li class="active">博客配置</li>
</ol>

<div style="width:800px;">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td><b>顶部 logo</b></td>
                <td><img src="{{ url($bloginfo->header_logo) }}" /></td>
            </tr>

            <tr>
                <td><b>顶部标题</b></td>
                <td>{{ $bloginfo->header_title }}</td>
            </tr>

            <tr>
                <td><b>顶部副标题</b></td>
                <td>{{ $bloginfo->header_subtitle }}</td>
            </tr>

            <tr>
                <td><b>微语</b></td>
                <td>{{ $bloginfo->sidebar_motto }}</td>
            </tr>

            <tr>
                <td><b>微语来源</b></td>
                <td>{{ $bloginfo->sidebar_motto_sub }}</td>
            </tr>

            <tr>
                <td><b>文章分类最多显示</b></td>
                <td>{{ $bloginfo->sidebar_cates_size }}</td>
            </tr>

            <tr>
                <td><b>文章归档最多显示</b></td>
                <td>{{ $bloginfo->sidebar_archives_size }}</td>
            </tr>

            <tr>
                <td><b>文章标签最多显示</b></td>
                <td>{{ $bloginfo->sidebar_tags_size }}</td>
            </tr>

            <tr>
                <td><b>文章列表每页显示</b></td>
                <td>{{ $bloginfo->boxes_max_size }}</td>
            </tr>

            <tr>
                <td><b>微博主页链接</b></td>
                <td>{{ $bloginfo->footer_weibo_url }}</td>
            </tr>

            <tr>
                <td><b>博主 github 链接</b></td>
                <td>{{ $bloginfo->footer_github_url }}</td>
            </tr>

            <tr>
                <td><b>博主微信链接</b></td>
                <td>{{ $bloginfo->footer_wechat_url }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
