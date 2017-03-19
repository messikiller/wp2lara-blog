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
        <p class="siblings-link">
            @if(! empty($article->prev()))
                <a href="{{ url('/view', $article->prev()->Id) }}" class="sibling prev-link" data-toggle="tooltip" data-placement="top" title="{{ $article->prev()->title }}">
                    <i class="fa fa-chevron-left"></i>&nbsp;
                    上一篇：{{ $article->prev()->title }}
                </a>
            @else
                <a href="javascript:void(0);" class="sibling prev-link empty-sibling">
                    <i class="fa fa-chevron-left"></i>&nbsp;
                    当前已经是最新的文章
                </a>
            @endif

            @if(! empty($article->next()))
                <a href="{{ url('/view', $article->next()->Id) }}" class="sibling next-link" data-toggle="tooltip" data-placement="top" title="{{ $article->next()->title }}">
                    下一篇：{{ $article->next()->title }}
                    &nbsp;<i class="fa fa-chevron-right"></i>
                </a>
            @else
                <a href="javascript:void(0);" class="sibling next-link empty-sibling">
                    当前已经是最后一篇文章
                    &nbsp;<i class="fa fa-chevron-right"></i>
                </a>
            @endif
        </p>

        <p class="copyright-info">
            <b>本文链接</b>：<a href="javascript:void(0);" id="original-link"  data-clipboard-text="{!! url('/view', $article->Id) !!}">{!! url('/view', $article->Id) !!}</a>，欢迎转载，传播请注明来源
            <i class="fa fa-creative-commons"></i>&nbsp;<a href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh" target="_blank">创意共享3.0许可证</a>
        </p>

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

    $('#original-link').tooltip({
        title: '点击复制到剪贴板'
    });

    var clipboard = new Clipboard('#original-link');
    clipboard.on('success', function(e){
        $('#original-link').tooltip('destroy');
        $('#original-link').tooltip('show', '已复制！');
    });
});

</script>

@endsection
