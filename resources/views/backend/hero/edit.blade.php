@extends('backend.layouts.app')

@section('title', 'Hero')

@section('style')
<!-- Datatables css -->
<link href="{{ asset('backend/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hero</a></li>
                    <li class="breadcrumb-item active">Edit Hero</li>
                </ol>
            </div>
            <h4 class="page-title">Hero</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('hero.update', $hero->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Title Hero</label>
                        <input type="text" value="{{ old('judul_hero') ? old('judul_hero') : $hero->judul_hero }}" name="judul_hero" class="form-control" placeholder="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Background</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button id="button-background" data-input="input_post_background"
                                    class="btn btn-primary" type="button">
                                    Browse
                                </button>
                            </div>
                            <input id="input_post_background" name="gambar" value="{{ old('gambar') ? old('gambar') : asset($hero->gambar) }}" type="text" class="form-control" placeholder="" readonly />
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <input type="text" name="deskripsi" value="{{ old('deskripsi') ? old('deskripsi') : $hero->deskripsi }}" class="form-control" placeholder="">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

<script>
     //event : input thumbnail
     $('#button-thumbnail').filemanager('image');

     $('#button-background').filemanager('image');
</script>
@endsection
