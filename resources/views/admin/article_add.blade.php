@extends('admin/base')

@section('main')

<div style="width:800px;">

    <form class="form-horizontal">
      <div class="form-group">
        <label for="input-title" class="col-sm-2">文章标题</label>
        <div class="col-md-6 col-sm-10">
          <input type="text" class="form-control" id="input-title">
        </div>
      </div>

      <div class="form-group">
        <label for="input-summary" class="col-sm-2">摘要</label>
        <div class="col-md-6 col-sm-10">
            <textarea rows="8" cols="40" class="form-control" id="input-summary"></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">提交</button>
        </div>
      </div>
    </form>

</div>

<div id="app">

</div>

@endsection

@section('own-js')
<script src="{{ asset('js/main.js') }}"></script>
@endsection
