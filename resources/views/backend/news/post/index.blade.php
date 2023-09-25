@extends('backend.layouts.app')

@section('title', 'Post News')

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
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <form autocomplete="off" action="" method="GET" class="d-flex flex-row align-items-center flex-wrap form-row">
                            <div class="col">
                                <div class="input-group mx-1 align-items-center">
                                    <label class="form-label me-2">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="publish" {{ $statusSelected == "publish" ? "selected" : "" }}>Publish</option>
                                        <option value="draft" {{ $statusSelected == "draft" ? "selected" : "" }}>Draft</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="submit">Apply</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mx-1">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control ms-2"
                                        placeholder="Search for posts">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="submit">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <span class="float-end">
                            <a href="{{ route('post.create') }}" class="btn btn-success" role="button">
                                Add new
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @forelse ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>{{ $post->judul }}</h5>
                        <p>
                            {{ $post->description }}...
                        </p>
                        <div class="float-end">
                            <!-- detail -->
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-primary" role="button">
                                view
                            </a>
                            <!-- edit -->
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-info" role="button">
                                edit
                            </a>
                            <!-- delete -->
                                <button onclick="destroy(this.id)" id="{{$post->id}}" type="submit" class="btn btn-sm btn-danger">
                                    delete
                                </button>
                        </div>
                    </div>
                </div>
                @empty
                    @if (request()->get('keyword'))
                    <p class="text-center">'{{request()->get('keyword')}}' tidak ditemukan</p>
                    @else
                    <p class="text-center">data tidak tersedia</p>
                    @endif

                @endforelse

            </div>
            @if ($posts->hasPages())
                <div class="card-footer">
                        {{ $posts->links('pagination::bootstrap-5') }}
                </div>
            @endif
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
                    url: `post/destroy/${id}`,
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
