@extends('layouts/home_main')

@section('main')

<div id="boxes">

@foreach($articles['data'] as $article)
<div class="box">

    <div class="box-header">

        <div class="box-header-title">
            <a href="{{ url('articles/view/'.$article['Id']) }}">{{ $article['title'] }}</a>
        </div>

        <div class="box-header-meta">
            <span class="header-meta cate-meta">
                <i class="fa fa-list-ul"></i>
                &nbsp;分类：
                @if (count($article['cates']) == 0)

                    <span>无</span>

                @elseif (count($article['cates']) >0 && count($article['cates']) <= 3)

                    @foreach($article['cates'] as $cate)
                    <span class="label label-badge" style="background-color: {{ $cate['color'] }}">{{ $cate['name'] }}</span>
                    @endforeach

                @elseif (count($article['cates']) > 3)

                    @for ($i = 0; $i <= 2; $i++)
                        <span class="label label-badge" style="background-color: {{         $article['cates'][$i]['color'] }}">{{ $article['cates'][$i]['name'] }}</span>
                    @endfor
                    <span class="label label-badge label-default" style="font-weight:bold;">&middot;&middot;&middot;</span>

                @endif
            </span>

            <span class="header-meta view-meta">
                <i class="fa fa-eye"></i>&nbsp;
                浏览：{{ $article['read_num'] }}
            </span>

            @inject('carbon', 'Carbon\Carbon')
            <span class="header-meta pubtime-meta">
                <i class="fa fa-calendar"></i>
                &nbsp;发表：
                {{ $carbon->createFromFormat('Y-m-d H:i:s', $article['published_at'])->diffForHumans() }}
            </span>
        </div>

    </div>

    <div class="box-divider"></div>

    <div class="box-body">
        <p>{!! $article['summary'] !!}</p>
    </div>

    <div class="box-footer">
        <div class="box-footer-meta">

            <div class="footer-meta tags-meta">
                <i class="fa fa-tags"></i>
                &nbsp;标签：
                @if (count($article['tags']) == 0)

                    <span>无</span>

                @elseif (count($article['tags']) >0 && count($article['tags']) <= 5)

                    @foreach($article['tags'] as $tag)
                    <span class="footer-tag" style="
                        background-color: {{ $tag['color'] }};
                        border-color: {{ $tag['color'] }};
                    ">{{ $tag['name'] }}</span>
                    @endforeach

                @elseif (count($article['tags']) > 5)

                    @for ($i = 0; $i <= 4; $i++)
                        <span class="footer-tag" style="
                            background-color: {{ $article['tags'][$i]['color'] }};
                            border-color: {{ $article['tags'][$i]['color'] }};
                        ">{{ $article['tags'][0]['name'] }}</span>
                    @endfor

                    <span class="footer-tag" style="font-weight:bold;">&middot;&middot;&middot;</span>

                @endif
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
        "><a href="{{ $articles['prev_page_url'] }}"><i class="icon-double-angle-left"></i></a></li>

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

        <li class="next
            @if ($articles['next_page_url'] == null)
            disabled
            @endif
        "><a href="{{ $articles['next_page_url'] }}"><i class="icon-double-angle-right"></i></a></li>
    </ul>

</div>

</div>


@endsection
