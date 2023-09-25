<div class="col-lg-4">

    <div class="sidebar">

        <h3 class="sidebar-title">Search</h3>
        <div class="sidebar-item search-form">
            <form action="{{ route('news.search') }}" method="GET">
                <input type="text" name="keyword" value="{{ request()->get('keyword') }}">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End sidebar search formn-->

        <h3 class="sidebar-title">Categories</h3>
        <div class="sidebar-item categories">
            <ul>
                @foreach ($categories as $item)
                    <li><a href="{{ route('news.category', $item->slug) }}">{{ $item->nama_kategori }} <span>({{ $item->post->count() }})</span></a></li>
                @endforeach
            </ul>
        </div><!-- End sidebar categories-->

        <h3 class="sidebar-title">Recent Posts</h3>
        <div class="sidebar-item recent-posts">
            @foreach ($recentPost as $item)
                <div class="post-item clearfix">
                    <img src="{{ asset($item->thumbnail) }}" alt="">
                    <h4><a href="{{ route('news.show', $item->slug) }}">{{ $item->judul }}</a></h4>
                    <time datetime="2020-01-01">{{ $item->created_at->format('M d, Y') }}</time>
                </div>
            @endforeach
        </div><!-- End sidebar recent posts-->

        <h3 class="sidebar-title">Tags</h3>
        <div class="sidebar-item tags">
            <ul>
                @foreach ($tags as $item)
                    <li><a href="{{ route('news.tag', $item->slug) }}">{{ $item->title }}</a></li>
                @endforeach
            </ul>
        </div><!-- End sidebar tags-->

    </div><!-- End sidebar -->

</div><!-- End blog sidebar -->