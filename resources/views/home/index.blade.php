@extends('layouts/home_main')

@section('main')

<div id="boxes">

<!-- @for($i=1; $i<=10; $i++)
    <div class="box">

        <div class="box-header">
            <a href="#">他们的文字中，体会到自己的人生</a>
        </div>

        <div class="box-divider"></div>

        <div class="box-body">
            <p>有很长一段时间对文字有着特殊的感觉，就是特以做客类的App，旨在可以去关注自己喜欢的一些作者。从他们的文字中，体会到自己的人生。</p>
            <p>有很长一段时间去关注自己喜欢的一些作者。从他们的文字中，体会到自己的人生。</p>
        </div>

        <div class="box-footer">
            <div class="box-meta-container">
                <span class="box-meta">
                    <i class="fa fa-tags"></i>&nbsp;标签：
                    <span class="label label-badge label-primary">Primary</span>
                    <span class="label label-badge label-success">Success</span>
                    <span class="label label-badge label-info">Info</span>
                    <span class="label label-badge" style="font-weight:bold;">&middot;&middot;&middot;</span>
                </span>
                <span class="box-meta"><i class="fa fa-eye"></i>&nbsp;浏览：56</span>
                <span class="box-meta"><i class="fa fa-clock-o"></i>&nbsp;发表：三天前</span>
            </div>
            <div class="box-view-btn-container">
                <a href="#" class="btn btn-primary btn-md"><i class="fa fa-search"></i>&nbsp;阅读全文</a>
            </div>
        </div>

    </div>
@endfor -->

@foreach($articles['data'] as $article)
<div class="box">

    <div class="box-header">
        <a href="{{ url('articles/view/'.$article['Id']) }}">{{ $article['title'] }}</a>
    </div>

    <div class="box-divider"></div>

    <div class="box-body">
        <p>{{ $article['summary'] }}</p>
    </div>

    <div class="box-footer">
        <div class="box-meta-container">
            <span class="box-meta">
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
            <span class="box-meta"><i class="fa fa-eye"></i>&nbsp;浏览：{{ $article['read_num'] }}</span>
            @inject('carbon', 'Carbon\Carbon')
            <span class="box-meta"><i class="fa fa-clock-o"></i>&nbsp;发表：{{ $carbon->createFromFormat('Y-m-d H:i:s', $article['published_at'])->diffForHumans() }}</span>
        </div>
        <div class="box-view-btn-container">
            <a href="{{ url('articles/view/'.$article['Id']) }}" class="btn btn-primary btn-md"><i class="fa fa-search"></i>&nbsp;阅读全文</a>
        </div>
    </div>

</div>
@endforeach

<div class="container-fluid text-center">

        <ul class="pager pager-loose pager-pills">
            <li class="previous
                @if ($articles['prev_page_url'] == null)
                disabled
                @endif
            "><a href="{{ $articles['prev_page_url'] }}">«&nbsp;上一页</a></li>

            @for ($p = 1; $p <= $articles['last_page']; $p++)
            <li class="
                @if ($p == $articles['current_page'])
                active
                @endif
            "><a href="{{ url('/articles') }}?page={{ $p }}"
            @if ($p == $articles['current_page'])
            style="background-color: #3498db;border-color: #3498db;``"
            @endif
            >{{ $p }}</a></li>
            @endfor

            <li class="next
                @if ($articles['next_page_url'] == null)
                disabled
                @endif
            "><a href="{{ $articles['next_page_url'] }}">»&nbsp;下一页</a></li>
        </ul>

</div>

</div>


@endsection
