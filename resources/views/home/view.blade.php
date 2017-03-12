@extends('layouts/home_main')

@section('main')

<div id="content">

    <article class="article">
      <header>
        <h1 class="text-center">
            {{ $article->title }}
        </h1>
        <dl class="dl-inline">
            <dt><i class="fa fa-calendar"></i>&nbsp;&nbsp;发布：</dt>
            <dd>{{ date('Y-m-d', strtotime($article->published_at)) }}</dd>

            <dt><i class="fa fa-eye"></i>&nbsp;&nbsp;浏览：</dt>
            <dd>{{ $article->read_num }}</dd>

            <dt><i class="fa fa-tags"></i>&nbsp;&nbsp;标签：</dt>
            <dd>
                @if (count($article->tags) == 0)
                    无
                @elseif (count($article->tags) > 0 && count($article->tags) <= 3)
                    @foreach ($article->tags as $tag)
                    <span class="label" style="background-color: {{ $tag->color }};">
                        {{ $tag->name }}
                    </span>&nbsp;
                    @endforeach
                @elseif (count($article->tags) > 0 && count($article->tags) <= 3)
                    @foreach ($article->tags as $tag)
                    <span class="label" style="background-color: {{ $tag->color }};">
                        {{ $tag->name }}
                    </span>&nbsp;
                    @endforeach
                    <span class="label" style="background-color: #adadad;">
                        <i class="icon icon-ellipsis-h"></i>
                    </span>
                @endif
            </dd>

            <dt><i class="fa fa-list-ul"></i>&nbsp;&nbsp;分类：</dt>
            <dd>
                @if (empty($article->cate))
                    <span>无</span>
                @else
                    <span class="label" style="background-color: {{ $article->cate->color }};">
                        {{ $article->cate->name }}
                    </span>
                @endif
            </dd>

            @if ($AUTH->isAuthed())
            <dt><i class="fa fa-edit"></i>&nbsp;&nbsp;</dt>
            <dd>
                <a href="{{ url('admin/article/' . $article->Id . '/edit') }}">编辑文章</a>
            </dd>
            @endif
        </dl>
        <section class="abstract">
              {!! $article->summary !!}
        </section>
      </header>

      <section class="content">
          {!! $article->content !!}
      </section>

      <footer>
          <p class="text-muted">
              <i class="fa fa-share-alt"></i>
              &nbsp;分享：
              <span class="footer-meta social-share"
                  data-url="{{ url('articles/view/' . $article->Id) }}"
                  data-source="{{ $article->title }}"
                  data-title="{{ $article->title }}"
                  data-description="{{ $article->summary }}"
                  data-image="{{ asset('assets/images/header-logo.jpg') }}"
                  data-disabled="diandian"
              ></span>
        </p>
      </footer>
    </article>

</div>

<div id="comments">
    <div id="SOHUCS" sid="{{ $article->Id }}"></div>
</div>

@endsection

@section('own-js')
<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
window.changyan.api.config({
    appid: '{{ env('SOHU_CHANGYAN_COMMENT_APPID') }}',
    conf: '{{ env('SOHU_CHANGYAN_COMMENT_CONF') }}'
});

$(function(){
    $('#content .content p > img').each(function(){
        var a_ele = $("<a data-fancybox='images'></a>");
        a_ele.attr({
            href: $(this).attr('src')
        });
        $(this).wrap(a_ele).addClass('img-responsive');;
    });
    $('[data-fancybox]').fancybox({
    	image : {
    		protect: true
    	}
    });
});
</script>

@endsection
