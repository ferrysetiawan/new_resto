@extends('backend.layouts.app')

@section('title')
    Create Post News
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                    <li class="breadcrumb-item active">Create Post</li>
                </ol>
            </div>
            <h4 class="page-title">Create Post</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                            <div class="row d-flex align-items-stretch">
                                <div class="col-md-8">
                                    <!-- title -->
                                    <div class="mb-3">
                                        <label for="input_post_title" class="font-weight-bold">
                                            Title
                                        </label>
                                        <input id="input_post_title" value="{{ old('judul') }}" name="judul" type="text"
                                            class="form-control {{$errors->first('judul') ? "is-invalid": ""}}" placeholder="" />
                                            <div class="invalid-feedback">
                                                {{$errors->first('judul')}}
                                            </div>
                                    </div>
                                    <!-- slug -->
                                    <div class="mb-3">
                                        <label for="input_post_slug" class="font-weight-bold">
                                            Slug
                                        </label>
                                        <input id="input_post_slug" value="{{ old('slug') }}" name="slug" type="text"
                                        class="form-control {{$errors->first('slug') ? "is-invalid": ""}}" placeholder="" readonly />
                                        <div class="invalid-feedback">
                                            {{$errors->first('slug')}}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="font-weight-bold">
                                            Description
                                        </label>
                                        <textarea name="description" placeholder=""
                                        class="form-control {{$errors->first('description') ? "is-invalid": ""}}" rows="5">{{ old('description') }}</textarea>
                                        <div class="invalid-feedback">
                                            {{$errors->first('description')}}
                                        </div>
                                    </div>
                                    <!-- thumbnail -->
                                    <div class="mb-3">
                                        <label for="input_post_thumbnail" class="font-weight-bold">
                                            Thumbnail
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button id="button-image" data-input="input_post_thumbnail"
                                                    class="btn btn-primary" type="button">
                                                    Browse
                                                </button>
                                            </div>
                                            <input id="input_post_thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" type="text" class="form-control {{$errors->first('thumbnail') ? "is-invalid": ""}}" placeholder="" readonly />
                                            <div class="invalid-feedback">
                                                {{$errors->first('thumbnail')}}
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- content -->
                                    <div class="mb-3">
                                        <label for="input_post_content" class="font-weight-bold">
                                            Content
                                        </label>
                                        <textarea id="input_post_content" name="content" placeholder=""
                                        class="form-control {{$errors->first('content') ? "is-invalid": ""}}" rows="20">{{ old('content') }}</textarea>
                                        <div class="invalid-feedback">
                                            {{$errors->first('content')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- catgeory -->
                                    <div class="mb-3">
                                        <label for="input_post_description" class="font-weight-bold">
                                            Category
                                        </label>
                                        <div class="form-control overflow-auto {{$errors->first('category') ? "is-invalid": ""}}" style="height: 500px">
                                            <!-- List category -->
                                            <ul class="ps-1 my-1" style="list-style: none;">
                                                @foreach ($categories as $category)
                                                <li class="mb-3 form-check my-1">
                                                    @if (old('category') && in_array($category->id, old('category')))
                                                        <input class="form-check-input" value="{{ $category->id }}"
                                                        type="checkbox" name="category[]" checked>
                                                    @else
                                                        <input class="form-check-input" value="{{ $category->id }}"
                                                        type="checkbox" name="category[]">
                                                    @endif
                                                    <label class="form-check-label">{{ $category->nama_kategori }}</label>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <!-- List category -->
                                        </div>
                                        <div class="invalid-feedback">
                                            {{$errors->first('category')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- tag -->
                                    <div class="mb-3">
                                        <label for="select_post_tag" class="font-weight-bold">
                                            Tag
                                        </label>
                                        <select id="select_post_tag" name="tag[]" data-placeholder="" class="custom-select w-100"
                                            multiple>
                                        </select>
                                    </div>
                                    <!-- status -->
                                    <div class="mb-3">
                                        <label for="select_post_status" class="font-weight-bold">
                                            Status
                                        </label>
                                        <select id="select_post_status" name="status" class="form-control {{$errors->first('status') ? "is-invalid": ""}}">
                                            <option value="draft"{{ old('status') === 'draft' ? 'selected' : NULL}}>Draft</option>
                                            <option value="publish" {{ old('status') === 'publish' ? 'selected' : NULL}}>Publish</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {{$errors->first('status')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="float-end">
                                        <a class="btn btn-warning px-4" href="{{ route('post.index') }}">Back</a>
                                        <button type="submit" class="btn btn-primary px-4">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
            $('#button-image').filemanager('image');

            function generateSlug(value) {
            return value.trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, '-')
                .replace(/-+/g, '-').replace(/^-|-$/g, "");
        }

        //event: input title
        $('#input_post_title').change(function () {
            let categories = $(this).val();
            $('#input_post_slug').val(generateSlug(categories));
        });
    });
    </script>
    <script>
        //select2 tag
        $('#select_post_tag').select2({
        allowClear: true,
        ajax: {
            url: "{{ route('tags.select') }}",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                    return {
                        text: item.title,
                        id: item.id
                    }
                    })
                };
            }
        }
        });
    </script>

@endsection