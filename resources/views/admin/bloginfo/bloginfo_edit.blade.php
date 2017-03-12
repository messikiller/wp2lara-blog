@extends('admin/base')

@section('main')
<ol class="breadcrumb">
    <li><span class="text-primary">配置信息</span></li>
    <li class="active">博客配置</li>
</ol>

<div class="container-fluid">
    <form class="form-horizontal" action="/admin/bloginfo/update" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="input-header_logo" class="col-sm-1">顶部logo</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[header_logo]" value="{{ $bloginfo->header_logo }}" id="input-header_logo" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-header_title" class="col-sm-1">顶部标题</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[header_title]" value="{{ $bloginfo->header_title }}" id="input-header_title" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-header_subtitle" class="col-sm-1">顶部副标题</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[header_subtitle]" value="{{ $bloginfo->header_subtitle }}" id="input-header_subtitle" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-sidebar_motto" class="col-sm-1">微语</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[sidebar_motto]" value="{{ $bloginfo->sidebar_motto }}" id="input-sidebar_motto" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-sidebar_motto_sub" class="col-sm-1">微语来源</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[sidebar_motto_sub]" value="{{ $bloginfo->sidebar_motto_sub }}" id="input-sidebar_motto_sub" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-sidebar_cates_size" class="col-sm-1">分类列表最多显示</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[sidebar_cates_size]" value="{{ $bloginfo->sidebar_cates_size }}" id="input-sidebar_cates_size" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-sidebar_archives_size" class="col-sm-1">归档列表最多显示</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[sidebar_archives_size]" value="{{ $bloginfo->sidebar_archives_size }}" id="input-sidebar_archives_size" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-sidebar_tags_size" class="col-sm-1">标签云最多显示</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[sidebar_tags_size]" value="{{ $bloginfo->sidebar_tags_size }}" id="input-sidebar_tags_size" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-boxes_max_size" class="col-sm-1">文章列表每页显示</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[boxes_max_size]" value="{{ $bloginfo->boxes_max_size }}" id="input-boxes_max_size" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-footer_github_url" class="col-sm-1">博主github链接</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[footer_github_url]" value="{{ $bloginfo->footer_github_url }}" id="input-footer_github_url" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-footer_wechat_url" class="col-sm-1">博主微信链接</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[footer_wechat_url]" value="{{ $bloginfo->footer_wechat_url }}" id="input-footer_wechat_url" />
            </div>
        </div>

        <div class="form-group">
            <label for="input-footer_weibo_url" class="col-sm-1">博主微博链接</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="bloginfo[footer_weibo_url]" value="{{ $bloginfo->footer_weibo_url }}" id="input-footer_weibo_url" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-1 col-md-5">
                <button type="submit" class="btn btn-success">提交</button>
            </div>
        </div>
    </form>
</div>
@endsection
