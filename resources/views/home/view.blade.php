@extends('layouts/home_main')

@section('main')

<div id="content">

    <article class="article">
      <header>
        <h1 class="text-center">
            {{ $article->title }}
        </h1>
        <dl class="dl-inline">
            <dt>发布于：</dt>
            <dd>{{ $article->published_at }}</dd>

            <dt>最后修订：</dt>
            <dd>{{ $article->updated_at }}</dd>
          <dt></dt>
          <dd class="pull-right">
              @foreach ($article->tags as $tag)
              <span class="label" style="background-color: {{ $tag->color }};">
                  {{ $tag->name }}
              </span>&nbsp;
              @endforeach
          </dd>
        </dl>
        <section class="abstract">
          <p>
              <strong>摘要：</strong>
              {!! $article->summary !!}
          </p>
        </section>
      </header>

      <section class="content">
          {!! $article->content !!}
      </section>

      <footer>
          <p class="text-muted">
              <i class="fa fa-rss"></i>
              &nbsp;分享：
              <span class="footer-meta social-share"
                  data-url="{{ url('articles/view/'.$article['Id']) }}"
                  data-source="{{ $article['title'] }}"
                  data-title="{{ $article['title'] }}"
                  data-description="{{ $article['summary'] }}"
                  data-image="{{ asset('assets/images/header-logo.jpg') }}"
                  data-disabled="diandian"
              ></span>
        </p>
      </footer>
    </article>

</div>

@endsection
