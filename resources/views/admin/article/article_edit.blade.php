@extends('admin/base')

@section('own-css')
{!! editor_css() !!}
@endsection

@section('main')

<ol class="breadcrumb">
    <li><span class="text-primary">文章管理</span></li>
    <li class="active">发布文章</li>
</ol>

<div class="container-fluid">

    <form class="form-horizontal" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
          <label for="input-title" class="col-sm-1">文章标题</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="article[title]" id="input-title" value="{{ $article->title }}">
          </div>
        </div>

        <div class="form-group">
          <label for="input-title" class="col-sm-1">分类</label>
          <div class="col-md-10">
            <select class="form-control" name="article[cate]" id="input-cate">
                <option value="0">请选择</option>
                @foreach ($cates as $cate)
                <option value="{{ $cate->Id }}"
                    @if ($article->cate_id == $cate->Id)
                    selected="selected"
                    @endif
                >{{ $cate->name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="input-title" class="col-sm-1">标签</label>
          <div class="col-md-10">
            <select class="form-control chosen-select" name="article[tag][]" id="input-tag" multiple="multiple">
                @foreach ($tags as $tag)
                <option value="{{ $tag->Id }}"
                    @foreach ($article->tags as $article_tag)
                        @if ($article_tag->Id == $tag->Id)
                        selected="selected"
                        @endif
                    @endforeach
                >{{ $tag->name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1">发布时间</label>
            <div class="col-md-10">
                <input type="text" name="article[published_at]" class="form-control form-datetime" value="{{ $article->published_at }}" />
            </div>
        </div>

        <div class="form-group" style="height: 100px;">
            <label for="input-summary" class="col-sm-1">摘要</label>
            <div class="col-md-5" style="height: 100%;">
                <textarea
                    class="form-control"
                    name="article[summary]"
                    id="input-summary"
                    oninput="preview_content(this.id, 'preview-summary');"
                    style="height: 100%; resize: none;"
                >{{ $article->summary_original }}</textarea>
            </div>
            <div class="col-md-5" id="preview-summary" style="height: 100%;overflow-y: scroll;border: 1px dashed #555;background-color:#555;color:#ffffff;border-radius:3px;padding:10px;"></div>
        </div>

        <div class="form-group">
            <div class="editormd editormd-vertical" id="mdeditor">
                <textarea class="form-control" name="article[content]" id="input-content" style="display:none;">{{ $article->content_original }}</textarea>
            </div>
        </div>

      <div class="form-group">
        <div class="col-sm-offset-1 col-sm-10">
          <button type="submit" class="btn btn-lg btn-success">提交</button>
        </div>
      </div>
    </form>

</div>

@endsection

@section('own-js')
{!! editor_js() !!}
{!! editor_config('mdeditor') !!}
<script type="text/javascript">
function preview_content(src_id, preview_id)
{
    var input = $('#'+src_id).val();
    $('#'+preview_id).html(markdown.toHTML(input));
}
window.onload = preview_content('input-summary', 'preview-summary');

$(document).ready(function(){
    $(".form-datetime").datetimepicker({
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        format: "yyyy-mm-dd hh:ii:ss"
    });
});
</script>
@endsection
