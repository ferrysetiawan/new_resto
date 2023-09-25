@extends('backend.layouts.app')

@section('title')
    Show Post News
@endsection

@section('content')
    <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">News</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Post</a></li>
                    <li class="breadcrumb-item active">Show Post</li>
                </ol>
            </div>
            <h4 class="page-title">Show Post</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <img src="{{ asset($post->thumbnail) }}" style="display: block; height:auto; width:100%" alt="">
                <!-- title -->
                <h2 class="my-1">
                    
                    {{ $post->judul }}
                </h2>
                <!-- categories -->
                @foreach ($post->kategori as $item)
                    <span class="badge bg-primary">{{ $item->nama_kategori }}</span>
                @endforeach

                <!-- content -->
                <div class="py-1">
                    {!! $post->content !!}
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('post.index') }}" class="btn btn-primary mx-1" role="button">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection