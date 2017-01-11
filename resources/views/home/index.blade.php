@extends('layouts/home_main')

@section('main')

<div id="boxes">

@foreach($articles as $article)
<div class="box">

    <div class="box-header">
        <div class="box-header-title">
            <a href="{{ url('articles/view/'.$article->Id) }}">{{ $article->title }}</a>
        </div>
    </div>

    <div class="box-divider"></div>

    <div class="box-body">
        <p>{!! $article->summary !!}</p>
    </div>

    <div class="box-footer">
        <div class="box-footer-meta">

            <div class="footer-meta meta-container">

                @inject('carbon', 'Carbon\Carbon')
                <span class="footer-meta pubtime-meta">
                    <i class="fa fa-calendar"></i>
                    {{ $carbon->createFromFormat('Y-m-d H:i:s', $article->published_at)->diffForHumans() }}
                </span>

                <span>&nbsp;/&nbsp;</span>

                <span class="footer-meta view-meta">
                    <i class="fa fa-eye"></i>
                    {{ $article->read_num }}
                </span>

                <span>&nbsp;/&nbsp;</span>

                <span class="footer-meta cate-meta">

                    @if (empty($article->cate))
                        <span>未分类</span>
                    @else
                        <span class="label label-badge label-cate">
                            <i class="fa fa-list-ul"></i>
                            {{ $article->cate->name }}
                        </span>
                    @endif

                </span>

                <span>&nbsp;/&nbsp;</span>

                <span class="footer-meta tag-meta">
                    <?php $counter = count($article->tags); ?>
                    @if($counter > 0)
                        <?php $index = 1; ?>
                        @foreach($article->tags as $tag)
                            <span class="label label-tag">
                                <i class="ion-pricetag"></i>
                                {{ $tag->name }}
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
                <a href="{{ url('articles/view/'.$article->Id) }}" class="btn btn-primary btn-view"><i class="fa fa-search"></i>&nbsp;阅读全文</a>
            </div>

        </div>
    </div>

</div>
@endforeach

<div class="pagination">

    {!! $pagination !!}

</div>

</div>


@endsection
