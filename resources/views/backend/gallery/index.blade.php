@extends('backend.layouts.app')

@section('title')
    Gallery
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </div>
            <h4 class="page-title">Gallery</h4>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <label class="form-label"> Thumbnail </label>
            </div>
            <div class="col-12 col-md-10 col-lg-10">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <button id="button-thumbnail" data-input="input_post_thumbnail"
                            class="btn btn-primary" type="button">
                            Browse
                        </button>
                    </div>
                    <input id="input_post_thumbnail" name="gambar" value="{{ old('gambar') }}" type="text" class="form-control {{$errors->first('gambar') ? "is-invalid": ""}}" placeholder="" readonly />
                    <div class="invalid-feedback">
                        {{$errors->first('gambar')}}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2 col-lg-2">
                <button type="submit" class="btn btn-info col-12 add-image">Submit</button>
            </div>
        </div>
        <div class="row card-image">
        @forelse ($galleries as $gambar)
        
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset($gambar->gambar) }}" style="display: block; height: auto; width: 100%;" alt="">
                    </div>
                    <div class="card-footer">
                        <button onclick="destroy(this.id)" id="{{$gambar->id}}"
                            class="btn btn-danger col-12">Delete</button>
                    </div>
                </div>
            </div>
        
        @empty
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        Gambar Belum Dimasukkan
                    </div>
                </div>
            </div>
        @endforelse
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

<script>
     //event : input thumbnail
     $('#button-thumbnail').filemanager('image');

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
</script>

<script type="text/javascript">
    //update hero end
    $('.add-image').click(function () {
        var gambar = $('#input_post_thumbnail').val();

        $.ajax({
            url: '{{ route('gallery.store') }}',
            type: 'POST',
            data: {
                product_id: $('#product_id').val(),
                gambar: $('#input_post_thumbnail').val()
            },
            success: function (response) {
                if (response.status == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'BERHASIL!',
                        text: 'DATA BERHASIL DITAMBAHKAN!',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function () {
                        $(".card-image").load(location.href + ' .card-image'),
                        $("#input_post_thumbnail").val("")
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'GAGAL!',
                        text: 'DATA GAGAL DIUBAH!',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function () {
                        $('#input_post_thumbnail')[0].reset(),
                        $(".card-image").load(location.href + ' .card-image');
                    });
                }
            }
        });
    })
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
                    url: `hero/destroy/${id}`,
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
                                $(".card-image").load(location.href + ' .card-image');
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                $(".card-image").load(location.href + ' .card-image');
                            });
                        }
                    }
                });
            }
        })
    }

</script>
@endsection