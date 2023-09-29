@extends('layouts.news')

@section('style')
    <link rel="stylesheet" href="{{ asset('larasGarden/style/pagination.css') }}">
@endsection

@section('content')
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>News</h2>
            <ol>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('news.index') }}">Berita</a></li>
                <li>Kategori : {{ $tag->title }}</li>
            </ol>
        </div>

    </div>
</section>
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            @forelse ($posts as $post)
            <article class="article">

              <div class="article-img">
                <img src="{{ asset($post->thumbnail) }}" alt="" class="img-fluid">
              </div>

              <h2 class="article-title">
                <a href="{{ route('news.show', $post->slug) }}">{{ $post->judul }}</a>
              </h2>

              <div class="article-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{ $post->user->name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html">{{ $post->created_at->format('M d, Y') }}</a></li>
                </ul>
              </div>

              <div class="article-content">
                <p>
                  {{ $post->description }}
                </p>
                <div class="read-more">
                  <a href="{{ route('news.show', $post->slug) }}">Read More</a>
                </div>
              </div>

            </article>
            @empty

                <img src="{{ asset('frontend/img/not-found.png') }}" alt="" class="img-fluid">

            @endforelse
              {{ $posts->links('pagination::bootstrap-4') }}
          </div><!-- End blog entries list -->

          @include('news.partial.sidebar')

        </div>

      </div>
</section>
@endsection
