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

    <form class="form-horizontal">
        <div class="form-group">
          <label for="input-title" class="col-sm-1">文章标题</label>
          <div class="col-md-10">
            <input type="text" class="form-control" name="article[title]" id="input-title">
          </div>
        </div>

        <div class="form-group">
          <label for="input-title" class="col-sm-1">分类</label>
          <div class="col-md-10">
            <select class="form-control" name="article[cate]" id="input-cate">
                <option value="0">请选择</option>
                @foreach ($cates as $cate)
                <option value="{{ $cate->Id }}">{{ $cate->name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="input-title" class="col-sm-1">标签</label>
          <div class="col-md-10">
            <select class="form-control chosen-select" name="article[tag]" id="input-tag" multiple="true">
                @foreach ($tags as $tag)
                <option value="{{ $tag->Id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group" style="height: 100px;">
            <label for="input-summary" class="col-sm-1">摘要</label>
            <div class="col-md-5" style="height: 100%;">
                <textarea class="form-control" name="article[summary]" id="input-summary" oninput="preview_content(this.id, 'preview-summary')" style="height: 100%; resize: none;"></textarea>
            </div>
            <div class="col-md-5" id="preview-summary" style="height: 100%;overflow-y: scroll;border: 1px dashed #555;"></div>
        </div>

        <div class="form-group">
            <div class="editormd editormd-vertical" id="mdeditor">
                <textarea class="form-control" name="article[content]" id="input-content" style="display:none;"></textarea>
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
</script>
@endsection
