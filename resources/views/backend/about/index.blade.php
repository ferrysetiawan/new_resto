@extends('backend.layouts.app')

@section('title', 'About')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </div>
            <h4 class="page-title">About</h4>
        </div>
    </div>
</div>

<div class="row"></div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-bordered mb-3">
                <li class="nav-item">
                    <a href="#home-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                        <span class="d-none d-md-block">About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                        <span class="d-none d-md-block">Special Recipe</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show active" id="home-b1">
                    @forelse ($abouts as $about)
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <img src="{{ asset($about->gambar) }}" style="display: block; height:auto; width:100%"
                                alt="">
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Judul</th>
                                            <th>:</th>
                                            <td>{{ $about->judul }}</td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <th>:</th>
                                            <td>{!! $about->deskripsi !!}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('about.edit', $about->id) }}"
                                        class="btn btn-warning col-12">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="judul">Judul</label>
                            <input type="text" name="judul"
                                class="form-control {{$errors->first('judul') ? "is-invalid": ""}}" placeholder="Judul"
                                value="{{ old('judul') }}">
                            <div class="invalid-feedback">
                                {{$errors->first('judul')}}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Foto </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button id="button-background" data-input="input_post_background"
                                        class="btn btn-primary" type="button">
                                        Browse
                                    </button>
                                </div>
                                <input id="input_post_background" name="gambar" value="{{ old('gambar') }}" type="text"
                                    class="form-control {{$errors->first('gambar') ? "is-invalid": ""}}" placeholder=""
                                    readonly />
                                <div class="invalid-feedback">
                                    {{$errors->first('gambar')}}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nama_event">Deskripsi</label>
                            <textarea id="input_post_content" name="deskripsi"
                                class="form-control {{$errors->first('deskripsi') ? "is-invalid": ""}}" id="" cols="5"
                                rows="5"></textarea>
                            <div class="valid-feedback">
                                {{$errors->first('deskripsi')}}
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                    @endforelse
                </div>
                <div class="tab-pane" id="profile-b1">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="mb-2">
                                <label class="form-label" for="judul">Product Name</label>
                                <input type="text" id="judul" name="judul" class="form-control {{$errors->first('judul') ? "is-invalid": ""}}" placeholder="Judul" value="{{ old('judul') }}">
                                <div class="invalid-feedback">
                                    {{$errors->first('judul')}}
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="">Image</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <button id="button-gambar" data-input="input_post_thumbnail"
                                            class="btn btn-primary" type="button">
                                            Browse
                                        </button>
                                    </div>
                                    <input id="input_post_thumbnail" name="gambar" value="{{ old('gambar') }}" type="text"
                                        class="form-control {{$errors->first('gambar') ? "is-invalid": ""}}" placeholder=""
                                        readonly />
                                    <div class="invalid-feedback">
                                        {{$errors->first('gambar')}}
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info col-12 add-image">Submit</button>
                        </div>
                        <div class="col-12 col-md-8">
                            <table id="dataTable" class="table table-image table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Image</th>
                                                    <th>File Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($specialRecipes as $no=>$item)
                                                <tr>
                                                    <td>{{ $no + 1 }}</td>
                                                    @if (file_exists(public_path($item->gambar)))
                                                    <td><a class="gallery-lightbox" href="{{ $item->gambar }}"><img
                                                                src="{{ $item->gambar }}" width="100px" alt=""></a></td>
                                                    @endif
                                                    <td>{{ $item->judul }}</td>
                                                    <td>
                                                        <button onclick="destroy(this.id)" id="{{$item->id}}"
                                                            class="btn btn-danger px-4">Delete</button>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Data tidak tersedia</td>
                                                </tr>
                                                @endforelse

                                            </tbody>
                                        </table>
                        </div>
                    </div>
                </div>
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
        $('#button-background').filemanager('image');

        $('#button-gambar').filemanager('image');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.add-image').click(function () {
            var image = $('#input_post_thumbnail').val();
            var judul = $('#judul').val();

            $.ajax({
                url: '{{ route('specialRecipe.store') }}',
                type: 'POST',
                data: {
                    judul: $('#judul').val(),
                    image: $('#input_post_thumbnail').val()
                },
                success: function (response) {
                    if (response.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'BERHASIL!',
                            text: 'DATA BERHASIL DISIMPAN!',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(function () {
                            $(".table-image").load(location.href + ' .table-image'),
                            $("#input_post_thumbnail").val(""),
                            $("#judul").val("")
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'GAGAL!',
                            text: 'DATA GAGAL DIUBAH!',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(function () {
                            $(".table-image").load(location.href + ' .table-image'),
                            $("#input_post_thumbnail").val(""),
                            $("#judul").val("")
                        });
                    }
                }
            });
        })

        

    });
</script>
<script>
    function destroy(id) {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            Swal.fire({
                title: 'APAKAH KAMU YAKIN ?',
                text: "INGIN MENGHAPUS DATA INI!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'BATAL',
                confirmButtonText: 'YA, HAPUS!',
            }).then((result) => {
                if (result.isConfirmed) {
                    //ajax delete
                    jQuery.ajax({
                        url: `about/destroy/${id}`,
                        data: {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function () {
                                    $(".table-image").load(location.href + ' .table-image')
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function () {
                                    $(".table-image").load(location.href + ' .table-image')
                                });
                            }
                        }
                    });
                }
            })
    }
</script>
@endsection
