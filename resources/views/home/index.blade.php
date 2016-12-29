@extends('layouts/home_main')

@section('main')

<div id="boxes">

@foreach($articles['data'] as $article)
<div class="box">

    <div class="box-header">
        <div class="box-header-title">
            <a href="{{ url('articles/view/'.$article['Id']) }}">{{ $article['title'] }}</a>
        </div>
    </div>

    <div class="box-divider"></div>

    <div class="box-body">
        <p>{!! $article['summary'] !!}</p>
    </div>

    <div class="box-footer">
        <div class="box-footer-meta">

            <div class="footer-meta meta-container">

                @inject('carbon', 'Carbon\Carbon')
                <span class="footer-meta pubtime-meta">
                    <i class="fa fa-calendar"></i>
                    {{ $carbon->createFromFormat('Y-m-d H:i:s', $article['published_at'])->diffForHumans() }}
                </span>

                <span>&nbsp;/&nbsp;</span>

                <span class="footer-meta view-meta">
                    <i class="fa fa-eye"></i>
                    {{ $article['read_num'] }}
                </span>

                <span>&nbsp;/&nbsp;</span>

                <span class="footer-meta cate-meta">
                    <?php $counter = count($article['cates']); ?>
                    @if($counter > 0)
                        <?php $index = 1; ?>
                        @foreach($article['cates'] as $cate)
                            <span class="label label-badge label-cate">
                                <i class="fa fa-list-ul"></i>
                                {{ $cate['name'] }}
                            </span>
                            @if ($counter > 2 && $index == 2)
                                <span class="label label-badge label-cate">&middot;&middot;&middot;</span>
                                <?php break; ?>
                            @endif
                            <?php $index++; ?>
                        @endforeach
                    @else
                        <span>未分类</span>
                    @endif

                </span>

                <span>&nbsp;/&nbsp;</span>

                <span class="footer-meta tag-meta">
                    <?php $counter = count($article['tags']); ?>
                    @if($counter > 0)
                        <?php $index = 1; ?>
                        @foreach($article['tags'] as $tag)
                            <span class="label label-tag">
                                <i class="ion-pricetag"></i>
                                {{ $tag['name'] }}
                            </span>
                            @if ($counter > 2 && $index == 2)
                                <span class="label label-tag" style="font-weight:bold;">&middot;&middot;&middot;</span>
                                <?php break; ?>
                            @endif
                            <?php $index++; ?>
                        @endforeach
                    @else
                        <span>无标签</span>
                    @endif
                </span>

            </div>

            <div class="footer-meta btn-view-container">
                <a href="{{ url('articles/view/'.$article['Id']) }}" class="btn btn-primary btn-view"><i class="fa fa-search"></i>&nbsp;阅读全文</a>
            </div>

        </div>
    </div>

</div>
@endforeach

<div class="pagination">

    <ul class="pager pager-loose pager-pills" style="display: inline-block;">
        <li class="previous
            @if ($articles['prev_page_url'] == null)
            disabled
            @endif
        "><a href="{{ $articles['prev_page_url'] }}"><i class="icon-double-angle-left"></i>&nbsp;上一页</a></li>

        @if ($articles['last_page'] <= $articles['per_page'])
            @for ($p = 1; $p <= $articles['last_page']; $p++)
            <li class="
                @if ($p == $articles['current_page'])
                active
                @endif
            ">
                <a href="{{ url('/articles') }}?page={{ $p }}">
                    {{ $p }}
                </a>
            </li>
            @endfor
        @else
            @for ($p = 1; $p <= $articles['per_page']; $p++)
            <li class="
                @if ($p == $articles['current_page'])
                active
                @endif
            ">
                <a href="{{ url('/articles') }}?page={{ $p }}">
                    {{ $p }}
                </a>
            </li>
            @endfor
            <li><a href="javascript:;">&middot;&middot;&middot;</a></li>
            <li class="
                @if ($articles['current_page'] == $articles['last_page'])
                active
                @endif
            ">
                <a href="{{ url('/articles') }}?page={{ $articles['last_page'] }}">
                    {{ $articles['last_page'] }}
                </a>
            </li>
        @endif

        <li class="next
            @if ($articles['next_page_url'] == null)
            disabled
            @endif
        "><a href="{{ $articles['next_page_url'] }}">下一页&nbsp;<i class="icon-double-angle-right"></i></a></li>
    </ul>

</div>

</div>


@endsection
