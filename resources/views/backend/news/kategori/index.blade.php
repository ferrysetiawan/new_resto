@extends('backend.layouts.app')

@section('title', 'Category News')

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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">News</a></li>
                    <li class="breadcrumb-item active">Post</li>
                </ol>
            </div>
            <h4 class="page-title">Post</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table dt-responsive nowrap w-100" id="basic-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $no=>$item)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-warning px-4">Edit</a>
                                    <button onclick="destroy(this.id)" id="{{$item->id}}" class="btn btn-danger px-4">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Datatables js -->
<script src="{{ asset('backend/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>

<!-- Datatable Init js -->
<script src="{{ asset('backend/assets/js/pages/demo.datatable-init.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.dataTables_filter input').after('<a href="{{ route('categories.create') }}" class="btn btn-info ms-2">Create</a>')
    });

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
                    url: `categories/destroy/${id}`,
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
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        })
    }
</script>
@endsection
