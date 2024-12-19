@extends('layouts.global')

@section('content')
    <section class="menu">
        @foreach ($categories as $category)
            <div class="container section-title" data-aos="fade-up">
                <h1>{{ $category->nama_kategori }}</h1>
                <span class="line"></span>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($category->product as $item)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
                            <div class="menu-item">
                                <img src="{{ asset($item->thumbnail) }}" class="img-fluid" alt="...">
                                <div class="menu-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h1>{{ $item->nama_produk }}</h1>
                                        <p class="price">{{ $item->harga }}</p>
                                    </div>
                                    <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere
                                        quia quae dolores dolorem tempore.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>
@endsection

@section('js')
    <script>
        // Fungsi untuk mengonversi angka menjadi format singkat
        function formatToK(value) {
        if (value >= 1000) {
            let formatted = (value / 1000).toFixed(value % 1000 !== 0 ? 1 : 0); // Menentukan apakah perlu ada desimal
            return formatted + 'k';
        }
        return value; // Jika kurang dari 1000, tetap tampilkan angkanya
        }

        // Seleksi semua elemen dengan kelas "price"
        const prices = document.querySelectorAll('.price');

        // Iterasi setiap elemen dan ubah teksnya
        prices.forEach(price => {
        const originalValue = parseInt(price.textContent, 10); // Ambil angka dari teks
        price.textContent = formatToK(originalValue); // Ubah ke format singkat
        });
    </script>
@endsection
