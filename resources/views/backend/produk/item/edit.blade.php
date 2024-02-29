@extends('backend.layouts.global')

@section('title', 'Edit Product')

@section('style')

@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Spesial Menu</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label" for="nama_produk">Product Name</label>
                                <input type="text" name="nama_produk" class="form-control {{$errors->first('nama_produk') ? "is-invalid": ""}}" placeholder="Product Name" value="{{ old('nama_produk') ? old('nama_produk') : $product->nama_produk }}">
                                <div class="invalid-feedback">
                                    {{$errors->first('nama_produk')}}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Category</label>
                                <select name="category_id" id="" class="form-control {{ $errors->first('category_id') ? "is-invalid": ""}}">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id === $category->id ? "selected" : null}}>{{ $category->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{$errors->first('category_id')}}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Gambar </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="button-gambar" data-input="input_post_background"
                                            class="btn btn-primary" type="button">
                                            Browse
                                        </button>
                                    </div>
                                    <input id="input_post_background" name="gambar" value="{{ old('gambar') ? old('gambar') : asset($product->gambar) }}" type="text" class="form-control {{$errors->first('gambar') ? "is-invalid": ""}}" placeholder="" readonly />
                                    <div class="invalid-feedback">
                                        {{$errors->first('gambar')}}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="harga">Price</label>
                                <input type="number" name="harga" class="form-control {{$errors->first('harga') ? "is-invalid": ""}}" placeholder="Product Price" value="{{ old('harga') ? old('harga') : $product->harga }}">
                                <div class="invalid-feedback">
                                    {{$errors->first('harga')}}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="nama_event">Description</label>
                                <textarea id="input_post_content" name="deskripsi" class="form-control {{$errors->first('deskripsi') ? "is-invalid": ""}}" id="" cols="5" rows="5">{{ old('deskripsi') ? old('deskripsi') : $product->deskripsi }}</textarea>
                                <div class="valid-feedback">
                                    {{$errors->first('deskripsi')}}
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
    <script src="{{ asset('backend/assets/tinymce5/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script src="{{ asset('backend/assets/tinymce5/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#input_post_content").tinymce({
                relative_urls: false,
                language: "en",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern",
                ],
                toolbar1: "fullscreen preview",
                toolbar2: "insertfile undo redo | styleselect | fontselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",


                file_picker_callback(callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document
                        .getElementsByTagName('body')[0].clientWidth
                    let y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight

                    let cmsURL = "{{ route('unisharp.lfm.show') }}" + '?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinymce.activeEditor.windowManager.openUrl({
                        url: cmsURL,
                        title: 'Laravel File manager',
                        width: x * 0.8,
                        height: y * 0.8,
                        onMessage: (api, message) => {
                            callback(message.content, {
                                text: message.text
                            })
                        }
                    })
                }
            });

            //event : input background
            $('#button-gambar').filemanager('image');

        });
    </script>
@endsection
