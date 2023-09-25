@extends('backend.layouts.app')

@section('title')
    Edit Category Product
@endsection

@section('content')
    <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Category</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form autocomplete="off" action="{{ route('categoryProduct.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="nama_kategori">Category</label>
                        <input type="text" class="form-control {{$errors->first('nama_kategori')
                        ? "is-invalid": ""}}" value="{{ $category->nama_kategori }}" id="nama_kategori" name="nama_kategori" placeholder="Enter nama kategori">
                        <div class="invalid-feedback">
                            {{$errors->first('nama_kategori')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="slug">Slug</label>
                        <input type="text" class="form-control {{$errors->first('slug')
                        ? "is-invalid": ""}}" id="slug" value="{{ $category->slug }}" name="slug" placeholder="Auto Generate" readonly>
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
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    //event : input background
    $('#button-image').filemanager('image');
</script>
<script>
    $(function () {
        function generateSlug(value) {
            return value.trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, '-')
                .replace(/-+/g, '-').replace(/^-|-$/g, "");
        }

        //event: input title
        $('#nama_kategori').change(function(){
            let nama_kategori = $(this).val();
            $('#slug').val(generateSlug(nama_kategori));
        });
    });

</script>
@endsection