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
            <span class="header-meta">
                <i class="fa fa-tags"></i>&nbsp;标签：
                @if (count($article['tags']) == 0)

                    <span>无</span>

                @elseif (count($article['tags']) >0 && count($article['tags']) <= 3)

                    @foreach($article['tags'] as $tag)
                    <span class="label label-badge" style="background-color: {{ $tag['color'] }}">{{ $tag['name'] }}</span>
                    @endforeach

                @elseif (count($article['tags']) > 3)

                    <span class="label label-badge" style="background-color: {{ $article['tags'][0]['color'] }}">{{ $article['tags'][0]['name'] }}</span>
                    <span class="label label-badge" style="background-color: {{ $article['tags'][1]['color'] }}">{{ $article['tags'][1]['name'] }}</span>
                    <span class="label label-badge" style="background-color: {{ $article['tags'][2]['color'] }}">{{ $article['tags'][2]['name'] }}</span>
                    <span class="label label-badge label-default" style="font-weight:bold;">&middot;&middot;&middot;</span>

                @endif
            </span>

            <span class="header-meta">
                <i class="fa fa-eye"></i>&nbsp;
                浏览：{{ $article['read_num'] }}
            </span>

            @inject('carbon', 'Carbon\Carbon')
            <span class="header-meta">
                <i class="fa fa-clock-o"></i>
                &nbsp;发表：
                {{ $carbon->createFromFormat('Y-m-d H:i:s', $article['published_at'])->diffForHumans() }}
            </span>
        </div>

    </div>

    <div class="box-divider"></div>

    <div class="box-body">
        <p>{{ $article['summary'] }}</p>
    </div>

    <div class="box-footer">
        <div class="box-footer-meta">

            <div class="footer-meta social-share"
            data-url="{{ url('articles/view/'.$article['Id']) }}"
            data-source="{{ $article['title'] }}"
            data-title="{{ $article['title'] }}"
            data-description="{{ $article['summary'] }}"
            data-image="{{ asset('assets/images/header-logo.jpg') }}"
            data-disabled="diandian"
            ></div>

            <div class="footer-meta btn-view-container">
                <a href="{{ url('articles/view/'.$article['Id']) }}" class="btn btn-primary btn-view"><i class="fa fa-search"></i>&nbsp;阅读全文</a>
            </div>

        </div>
    </div>

</div>
@endforeach

<div class="container-fluid text-center">

        <ul class="pager">
            <li class="previous
                @if ($articles['prev_page_url'] == null)
                disabled
                @endif
            "><a href="{{ $articles['prev_page_url'] }}"><i class="fa fa-long-arrow-left"></i></a></li>

            @for ($p = 1; $p <= $articles['last_page']; $p++)
            <li class="
                @if ($p == $articles['current_page'])
                active
                @endif
            "><a href="{{ url('/articles') }}?page={{ $p }}"
            @if ($p == $articles['current_page'])
            style="background-color: #3498db; border-color: #3498db;"
            @endif
            >{{ $p }}</a></li>
            @endfor

            <li class="next
                @if ($articles['next_page_url'] == null)
                disabled
                @endif
            "><a href="{{ $articles['next_page_url'] }}"><i class="fa fa-long-arrow-right"></i></a></li>
        </ul>

</div>

</div>


@endsection
