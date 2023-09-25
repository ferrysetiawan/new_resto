@extends('backend.layouts.app')

@section('title', 'Edit Chef')

@section('style')

@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Chef</a></li>
                    <li class="breadcrumb-item active">Edit Chef</li>
                </ol>
            </div>
            <h4 class="page-title">Chef</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form autocomplete="off" action="{{ route('chef.update', $chef->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control {{$errors->first('nama') ? "is-invalid": ""}}" placeholder="Nama" value="{{ old('nama') ? old('nama') : $chef->nama }}">
                        <div class="invalid-feedback">
                            {{$errors->first('nama')}}
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
                            <input id="input_post_background" name="gambar" value="{{ old('gambar') ? old('gambar') : asset($chef->gambar) }}" type="text" class="form-control {{$errors->first('gambar') ? "is-invalid": ""}}" placeholder="" readonly />
                            <div class="invalid-feedback">
                                {{$errors->first('gambar')}}
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="posisi">Posisi</label>
                        <input type="text" name="posisi" class="form-control {{$errors->first('posisi') ? "is-invalid": ""}}" placeholder="Posisi" value="{{ old('posisi') ? old('posisi') : $chef->posisi }}">
                        <div class="invalid-feedback">
                            {{$errors->first('posisi')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="facebook">Facebook</label>
                        <input type="text" name="facebook" class="form-control {{$errors->first('facebook') ? "is-invalid": ""}}" placeholder="" value="{{ old('facebook') ? old('facebook') : $chef->facebook }}">
                        <div class="invalid-feedback">
                            {{$errors->first('facebook')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="instagram">Instagram</label>
                        <input type="text" name="instagram" class="form-control {{$errors->first('instagram') ? "is-invalid": ""}}" placeholder="" value="{{ old('instagram') ? old('instagram') : $chef->instagram }}">
                        <div class="invalid-feedback">
                            {{$errors->first('instagram')}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="twitter">Twitter</label>
                        <input type="text" name="twitter" class="form-control {{$errors->first('twitter') ? "is-invalid": ""}}" placeholder="" value="{{ old('twitter') ? old('twitter') : $chef->twitter }}">
                        <div class="invalid-feedback">
                            {{$errors->first('twitter')}}
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
        $(document).ready(function () {
            //event : input background
            $('#button-background').filemanager('image');
    });
    </script>
@endsection
