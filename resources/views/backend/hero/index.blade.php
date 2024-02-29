@extends('backend.layouts.global')

@section('title', 'Hero')

@section('style')
<!-- Datatables css -->
<link href="{{ asset('backend/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Hero</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Judul Hero</th>
                                    <th>Background</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($heroes as $hero)
                                    <tr>
                                        <td>{!! $hero->judul_hero !!}</td>
                                        <td><img src="{{ asset($hero->gambar) }}" width="150px" alt=""></td>
                                        <td>{{ $hero->deskripsi }}</td>
                                        <td width="20%"><a href="{{ route('hero.edit', $hero->id) }}" class="btn btn-warning px-5">Edit</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="3">Data Masih Kosong</td>
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">Create</button></td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Hero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addTeacherForm" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Title Hero</label>
                        <input type="text" name="judul_hero" class="form-control" placeholder="">
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
                            <input id="input_post_background" name="gambar" value="{{ old('gambar') }}" type="text" class="form-control" placeholder="" readonly />
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" placeholder="">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add_teacher">Submit Form</button>
            </div>
        </div>
    </div>
</div>

{{-- @include('backend.hero.addmodal') --}}
@endsection



@section('js')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

<script>
     //event : input thumbnail
     $('#button-thumbnail').filemanager('image');

     $('#button-background').filemanager('image');

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
</script>

<script type="text/javascript">
    $(document).on('click','.add_teacher',function(e){
            e.preventDefault();
  			let formData= new FormData($('#addTeacherForm')[0]);
  			$.ajax({
  				method:'POST',
  				url:"{{route('hero.store')}}",
  				data:formData,
  				cache:false,
                contentType: false,
                processData: false,
  				success:function(response){
                    if (response.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DITAMBAHKAN!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                    } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DITAMBAHKAN!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
  			});
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
