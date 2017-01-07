@extends('admin/base')

@section('main')

<ol class="breadcrumb">
    <li><span class="text-primary">文章管理</span></li>
    <li class="active">发布文章</li>
</ol>

<div class="container-fluid">

    <form class="form-horizontal">
        <div class="form-group">
          <label for="input-title" class="col-sm-1">文章标题</label>
          <div class="col-md-5">
            <input type="text" class="form-control" id="input-title">
          </div>
        </div>

        <div class="form-group">
          <label for="input-title" class="col-sm-1">分类</label>
          <div class="col-md-5">
            <select class="form-control" id="input-cate">
                <option value="0">请选择</option>
                @foreach ($cates as $cate)
                <option value="{{ $cate->Id }}">{{ $cate->name }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="input-title" class="col-sm-1">标签</label>
          <div class="col-md-5">
            <select class="form-control chosen-select" id="input-tag" multiple="true">
                @foreach ($tags as $tag)
                <option value="{{ $tag->Id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
          </div>
        </div>

      <div class="form-group" style="height: 150px;">
        <label for="input-summary" class="col-sm-1">摘要</label>
        <div class="col-md-5" style="height: 100%;">
            <textarea class="form-control" id="input-summary" oninput="preview_content(this.id, 'preview-summary')" style="height: 100%; resize: none;"></textarea>
        </div>
        <div class="col-md-5" id="preview-summary" style="height: 100%;overflow-y: scroll;border: 1px dashed #555;"></div>
      </div>

      <div class="form-group" style="height: 500px;">
        <label for="input-summary" class="col-sm-1">内容
            <a href="#" class="btn btn-default btn-xs" id="max"><i class="fa fa-expand"></i></a>
        </label>
        <div class="col-md-5" style="height: 100%;">
            <textarea class="form-control" id="input-content" oninput="preview_content(this.id, 'preview-content')" style="height: 100%; resize: none;"></textarea>
        </div>
        <div class="col-md-5" id="preview-content" style="height: 100%;overflow-y: scroll;border: 1px dashed #555;"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-1 col-sm-10">
          <button type="submit" class="btn btn-success">提交</button>
        </div>
      </div>
    </form>

</div>

@endsection

@section('own-js')
<script type="text/javascript">
function preview_content(src_id, preview_id)
{
    var input = $('#'+src_id).val();
    $('#'+preview_id).html(markdown.toHTML(input));
}

var h_window = $(window).outerHeight();
var w_window = $(window).outerWidth();

$('#max').click(function(){
    $('#input-content').css({
        width: w_window / 2,
        height: h_window,
        position: 'fixed',
        top: '0px',
        left: '0px'
    });

    $('#preview-content').css({
        width: w_window / 2,
        height: h_window,
        position: 'fixed',
        top: '0px',
        right: '0px',
        background: '#ffffff'
    });
});
</script>
@endsection
