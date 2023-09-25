@extends('backend.layouts.app')

@section('title')
    Edit Tag News
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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tag</a></li>
                    <li class="breadcrumb-item active">Edit Tag</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Tag</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form autocomplete="off" action="{{ route('tags.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="title">Tag</label>
                        <input type="text" class="form-control {{$errors->first('title')
                        ? "is-invalid": ""}}" value="{{ $tag->title }}" id="title" name="title" placeholder="Enter nama kategori">
                        <div class="invalid-feedback">
                            {{$errors->first('title')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="slug">Slug</label>
                        <input type="text" class="form-control {{$errors->first('slug')
                        ? "is-invalid": ""}}" id="slug" value="{{ $tag->slug }}" name="slug" placeholder="Auto Generate" readonly>
                        <div class="invalid-feedback">
                            {{$errors->first('slug')}}
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        function generateSlug(value) {
            return value.trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, '-')
                .replace(/-+/g, '-').replace(/^-|-$/g, "");
        }

        //event: input title
        $('#title').change(function(){
            let title = $(this).val();
            $('#slug').val(generateSlug(title));
        });
    });

</script>
@endsection