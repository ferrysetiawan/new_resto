@extends('layouts.news')

@section('title')
    {{ $post->judul }}
@endsection

@section('content')
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>News</h2>
            <ol>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('news.index') }}">berita</a></li>
                <li>Detail Berita</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-8 entries">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="{{ asset($post->thumbnail) }}" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a href="blog-single.html">{{ $post->judul }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                    href="blog-single.html">{{ $post->user->name }}</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                    href="blog-single.html"><time datetime="2020-01-01">{{ \Carbon\Carbon::parse($post->created_at)->isoFormat('D MMMM Y') }}</time></a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        {!! $post->content !!}

                    </div>
                    <div class="entry-footer">
                        <i class="bi bi-folder"></i>
                        <ul class="cats">
                            @foreach ($post->kategori as $item)
                            <li><a href="{{ route('news.category', $item->slug) }}">{{ $item->nama_kategori }}</a></li>
                            @endforeach
                        </ul>

                        <i class="bi bi-tags"></i>
                        <ul class="tags">
                            @foreach ($post->tag as $item)
                                <li><a href="{{ route('news.tag', $item->slug) }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                      </div>
                </article><!-- End blog entry -->
            </div><!-- End blog entries list -->

            @include('news.partial.sidebar')

        </div>

    </div>
</section>
@endsection
