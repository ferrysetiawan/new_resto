@extends('backend.layouts.global')

@section('title', 'Product')

@section('style')

@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Spesial Menu</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table dt-responsive nowrap w-100" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Spesial</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $no=>$product)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td><img src="{{ asset($product->gambar) }}" width="100px" alt=""></td>
                                    <td>{{ $product->nama_produk }}</td>
                                    <td>{{ $product->category->nama_kategori }}</td>
                                    <td>{{ $product->harga }}</td>
                                    <td>
                                        <label class="custom-switch mt-2">
                                            <input
                                                type="checkbox"
                                                name="custom-switch-checkbox"
                                                class="custom-switch-input toggle-status"
                                                data-id="{{ $product->id }}"
                                                {{ $product->is_spesial ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning px-4">Edit</a>
                                        <button onclick="destroy(this.id)" id="{{$product->id}}"
                                            class="btn btn-danger px-4">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<!-- Datatables js -->

<script>
    $(document).ready(function () {
        $(".toggle-status").on('change', function () {
            let productId = $(this).data('id'); // ID Produk
            let isSpesial = $(this).is(':checked') ? 1 : 0; // Status (1 jika checked, 0 jika tidak)

            // Kirim AJAX untuk mengupdate database
            $.ajax({
                url: `{{ url('dashboard/product/productitems/update-status') }}`, // Endpoint untuk update status
                type: 'POST',
                data: {
                    id: productId,
                    is_spesial: isSpesial,
                    _token: '{{ csrf_token() }}' // CSRF token
                },
                success: function (response) {
                    if (response.status === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Status berhasil diubah!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Status gagal diubah!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat mengubah status!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        });
        $("#basic-datatable").DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                    destroy: true,
                    responsive: true
        });
        $('.dataTables_filter input').after('<a href="{{ route('product.create') }}" class="btn btn-info ml-2">Create</a>')
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
                    url: `productitems/destroy/${id}`,
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
