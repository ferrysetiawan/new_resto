@extends('backend.layouts.global')

@section('title')
    Post
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Post Page</h1>
        <span class="ml-auto">
            <form autocomplete="off" action="" method="GET" class="d-flex flex-row align-items-center flex-wrap form-row">
                <div class="col">
                    <div class="input-group mx-1 align-items-center">
                        <label class="form-label mr-2">Status</label>
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
        </span>
    </div>

    <div class="section-body">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Data Post</h3>
                        <a href="{{ route('post.create') }}" class="btn btn-light"><i
                            class="bi-plus-circle me-2"></i>Create Post</a>
                    </div>
                    <div class="">
                        <div class="card-body" style="background-color: #f8f8f8 !important">
                            @forelse ($posts as $post)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5>{{ $post->judul }}</h5>
                                    <p>
                                        {{ $post->description }}...
                                    </p>
                                    <div class="float-right">
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
                            <div class="card-footer float-right">
                                    {{ $posts->links('pagination::bootstrap-4') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
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
                        url: `artikel/${id}`,
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
