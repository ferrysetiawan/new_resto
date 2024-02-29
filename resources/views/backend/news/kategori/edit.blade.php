@extends('backend.layouts.global')

@section('title')
    Edit Category News
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Category News</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form autocomplete="off" action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
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
    </div>
</section>
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
        $('#nama_kategori').change(function(){
            let nama_kategori = $(this).val();
            $('#slug').val(generateSlug(nama_kategori));
        });
    });

</script>
@endsection
