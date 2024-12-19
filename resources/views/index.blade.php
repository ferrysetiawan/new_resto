@extends('layouts.global')

@section('style')
<link rel="stylesheet" href="{{ asset('larasGarden/style/util.min.css') }}">
@endsection

@section('content')
<section class="bg0">
    <div class="">
        <div class="row m-rl--1">
            @foreach ($news as $key => $item)
                @if ($key == 0)
                <!-- Artikel Utama -->
                <div class="col-md-6 p-rl-1 p-b-2 p-t-2">
                    <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url({{ asset($item->thumbnail) }});">
                        <a href="{{ route('news.show', $item->slug) }}" class="dis-block how1-child1 trans-03"></a>
                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                            <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                Business
                            </a>
                            <h3 class="how1-child2 m-t-14 m-b-10">
                                <a href="{{ route('news.show', $item->slug) }}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                    {{ $item->judul }}
                                </a>
                            </h3>
                            <span class="how1-child2">
                                <span class="f1-s-4 cl11">Admin</span>
                                <span class="f1-s-3 cl11 m-rl-3">-</span>
                                <span class="f1-s-3 cl11">Feb 16</span>
                            </span>
                        </div>
                    </div>
                </div>
                @elseif ($key > 0 && $key <= 2)
                <!-- Artikel Kecil Samping Kiri -->
                <div class="col-sm-6 col-lg-3 p-rl-1 p-b-2">
                    <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url({{ asset($item->thumbnail) }});">
                        <a href="{{ route('news.show', $item->slug) }}" class="dis-block how1-child1 trans-03"></a>
                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                            <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                Life Style
                            </a>
                            <h3 class="how1-child2 m-t-14">
                                <a href="{{ route('news.show', $item->slug) }}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                    {{ $item->judul }}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                @elseif ($key > 2)
                <!-- Artikel Kecil Samping Kanan -->
                <div class="col-sm-6 col-lg-3 p-rl-1 p-b-2">
                    <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url({{ asset($item->thumbnail) }});">
                        <a href="{{ route('news.show', $item->slug) }}" class="dis-block how1-child1 trans-03"></a>
                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                            <a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                Culture
                            </a>
                            <h3 class="how1-child2 m-t-14">
                                <a href="{{ route('news.show', $item->slug) }}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                    {{ $item->judul }}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<section id="hero" class="d-flex align-items-center" style="background: url('{{ asset($heroTitle->gambar) }}') top center no-repeat;background-size:cover">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <h1>{{ $heroTitle->judul_hero }}</h1>
                <h2>{{ $heroTitle->deskripsi }}</h2>
                <a href="#food_menu" class="btn-get-started scrollto">Explore Menu</a>
            </div>
        </div>
        <div class="col-lg-12 col-12 mt-auto d-flex justify-content-end flex-column flex-lg-row event">
            <h5 class="text-white">
                <strong>OPEN DAILY</strong><br>
                11.00 - 22.00 Sun-Thu<br>
                11.00 - 23.00 Fri - Sat
            </h5>
            <span class="d-none d-lg-block mx-3 garis-vertikal"></span>
            <div class="location-wrap mx-3 py-3 py-lg-0">
                <h5 class="text-white">
                    <strong>LIVE MUSIC</strong><br>
                    Saturday | 20.00 - 23.00<br>
                    Sunday   | 11.00 - 15.00
                </h5>
            </div>
    </div>
    </div>
</section>
<section class="section-padding-about section" id="about">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-sm-5 img-bg d-flex shadow align-items-center justify-content-center justify-content-md-end img-2"
                    style="background-image: url({{ asset($about->gambar) }}); background-size: cover;">

                </div>
                <div class="col-sm-7 py-5 pl-md-0 pl-4">
                    <div class="heading-section pl-lg-5 ml-md-5">
                        <span class="subheading-about">
                            Tentang Kami
                        </span>
                        <h2>
                            Selamat datang di Restoran kami
                        </h2>
                    </div>
                    <div class="pl-lg-5 ml-md-5">
                        <p>{!! $about->deskripsi !!}</p>
                        <h3 class="mt-5">Menu Spesial</h3>
                        <div class="row">
                            @foreach ($specialRecipe as $item)
                            <div class="col-4">
                                <a href="#" class="thumb-menu">
                                    <img class="img-fluid img-cover" src="{{ asset($item->gambar) }}" />
                                    <h6 class="pt-2">{{ $item->judul }}</h6>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section menu -->
<section id="food_menu" class="section-mainmenu p-t-70 p-b-70 bg1-pattern">
    <div class="container">
        <div class="row p-t-20 p-b-70">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div class="section-heading">
                    <span class="subheading-menu">Menu Kami</span>
                    <h2>Menu Makanan Lezat</h2>
                </div>
            </div>
        </div>
        @foreach ($product as $no=>$item)
            @php
                $rowCount = $product->count();
                $kode = '01';
                if ($rowCount > 0) {
                    if ($no < 9) {
                        $kode = "0".''.($no + 1);
                    } else {
                        $kode = "".''.($no + 1);
                    }
                }

            @endphp
            @if ($item->id % 2 == 1)
            <div class="row mt-5">
                <div class="col-lg-6 col-md-6 align-self-center py-5">
                    <h2 class="special-number">{{ $kode }}.</h2>
                    <div class="dishes-text">
                        <h3><span>{{ $item->category->nama_kategori }}</span><br> {{ $item->nama_produk }}</h3>
                        <p class="pt-3">{!! $item->deskripsi !!}</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6 align-self-center mt-4 mt-md-0">
                    <img src="{{ asset($item->gambar) }}" alt="" class="img-fluid shadow w-100">
                </div>
            </div>
            @else
            <div class="row mt-5">
                <div class="col-lg-5 col-md-6 align-self-center order-2 order-md-1 mt-4 mt-md-0">
                    <img src="{{ asset($item->gambar) }}" alt="" class="img-fluid shadow w-100">
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-6 align-self-center order-1 order-md-2 py-5">
                    <h2 class="special-number">{{ $kode }}.</h2>
                    <div class="dishes-text">
                        <h3><span>{{ $item->category->nama_kategori }}</span><br> {{ $item->nama_produk }}</h3>
                        <p class="pt-3">{!! $item->deskripsi !!}</p>
                    </div>
                </div>
            </div>
            @endif

        @endforeach
        {{-- <div class="row">
            <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
                @foreach ($categoryProduct as $item)
                    @if ($item->id % 2 == 1)
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            {{ $item->nama_kategori }}
                        </h3>
                        @foreach ($item->product as $product)
                        <div class="menu-item">
                            <div class="menu-img">
                                <img src="{{ $product->gambar }}" alt="Image">
                            </div>
                            <div class="menu-text">
                                <h3><span>{{ $product->nama_produk }}</span> <strong>{{ $product->harga }}</strong></h3>
                                <p>{!! $product->deskripsi !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
                @foreach ($categoryProduct as $item)
                    @if ($item->id % 2 == 0)
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            {{ $item->nama_kategori }}
                        </h3>

                        <!-- Item mainmenu -->
                        <div class="menu-item">
                            <div class="menu-img">
                                <img src="majoo_menu/spesial lele(done)/lele bakar.png" alt="Image">
                            </div>
                            <div class="menu-text">
                                <h3><span>Mini cheese Burger</span> <strong>$9.00</strong></h3>
                                <p>Lorem ipsum dolor sit amet elit. Phasel nec preti facil</p>
                            </div>
                        </div>
                    </div>
                    @endif

                @endforeach
            </div>
        </div> --}}
    </div>
</section>
<!-- end sectio nmenu -->
<!-- section chef -->
<section id="team" class="chef">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div class="section-heading">
                    <span class="subheading-chef">Tim Kami</span>
                    <h2>Berkenalan dengan tim kami</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($chefs as $chef)
            <div class="col-lg-4">
                <div class="chef-item">
                    <div class="thumb">
                        <div class="overlay"></div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <img src="{{ asset($chef->gambar) }}" alt="Chef #1">
                    </div>
                    <div class="down-content">
                        <h4>{{ $chef->nama }}</h4>
                        <span>{{ $chef->posisi }}</span>
                    </div>
                </div>
            </div>
            @empty

            @endforelse

        </div>
    </div>
</section>
<!-- end section chef -->
<!-- section event -->
@if ($countEvent >= 1)
<section class="section-event" id="event">
    <div class="wrap-slick2">
        <div class="slick2">
            @foreach ($events as $event)
            <div class="item-slick2 item1-slick2" style="background-image: url('{{ asset($event->background) }}');">
                <div class="wrap-content-slide2 p-t-115 p-b-208">
                    <div class="container">
                        <!-- - -->
                        <div class="title-event t-center m-b-52">
                            <span class="tit2 p-l-15 p-r-15">
                                Akan Datang
                            </span>

                            <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                Acara
                            </h3>
                        </div>

                        <!-- Block2 -->
                        <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="zoomIn">
                            <!-- Pic block2 -->
                            <a href="#" class="wrap-pic-blo2 bg1-blo2"
                                style="background-image: url('{{ asset($event->thumbnail) }}');">
                                <div class="time-event size10 txt6 effect1">
                                    <span class="txt-effect1 flex-c-m t-center">
                                        {{ \Carbon\Carbon::parse($event->tanggal)->isoFormat('dddd, D MMMM Y') }} -
                                        {{ \Carbon\Carbon::parse($event->tanggal)->format('H:i') }} WIB
                                    </span>
                                </div>
                            </a>

                            <!-- Text block2 -->
                            <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                <h4 class="tit7 t-center m-b-10">
                                    {{ $event->nama_event }}
                                </h4>

                                <p class="t-center">
                                    {{ $event->summary }}
                                </p>

                                <div class="clockdiv flex-sa-m flex-w w-full m-t-40" data-date="{{ $event->tanggal }}">

                                    <div class="size11 flex-col-c-m">
                                        <span id="days" class="dis-block t-center txt7 m-b-2 days">
                                            00
                                        </span>

                                        <span class="dis-block t-center txt8">
                                            Days
                                        </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                        <span class="dis-block t-center txt7 m-b-2 hours">
                                            00
                                        </span>

                                        <span class="dis-block t-center txt8">
                                            Hours
                                        </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                        <span id="minutes" class="dis-block t-center txt7 m-b-2 minutes">
                                            00
                                        </span>

                                        <span class="dis-block t-center txt8">
                                            Minutes
                                        </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                        <span id="seconds" class="dis-block t-center txt7 m-b-2 seconds">
                                            00
                                        </span>

                                        <span class="dis-block t-center txt8">
                                            Seconds
                                        </span>
                                    </div>
                                </div>


                                <a href="{{ route('events.detail',$event->slug) }}" class="txt4 m-t-40">
                                    Lihat Detail
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="wrap-slick2-dots"></div>
    </div>
</section>
@endif
<!-- end section event -->
<!-- section news -->

{{-- @if ($countNews >= 1)
<section class="ftco-section bg-light" id="news">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center">
                <span class="subheading">Berita Kami</span>
                <h2>Berita Terbaru</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($news as $item)
            <div class="col-md-4 d-flex">
                <div class="blog-entry justify-content-end">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{ asset($item->thumbnail) }});">
                    </a>
                    <div class="text p-4 float-right d-block">
                        <div class="d-flex align-items-center pt-2 mb-4">
                            <div class="one">
                                <span class="day">{{ $item->created_at->format('d') }}</span>
                            </div>
                            <div class="two">
                                <span class="yr">{{ $item->created_at->format('Y') }}</span>
                                <span class="mos">{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('MMMM') }}</span>
                            </div>
                        </div>
                        <h3 class="heading mt-2"><a href="{{ route('news.show', $item->slug) }}">{{ $item->judul }}</a></h3>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-md-12 text-center">
                <a href="{{ route('news.index') }}" class="btn btn-info px-4 py-2">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
@endif --}}

<!-- end section news -->
<!-- section gallery -->
<section class="gallery" id="gallery">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 text-center">
                <div class="heading-section">
                    <span class="subheading-gallery">Galeri Kami</span>
                    <h2>sebuah koleksi gambar untuk melengkapi kenangan</h2>
                </div>
            </div>
        </div>
        <div class="grid-gallery">
            @foreach ($galleries as $item)
            <div class="grid-item">
                <a href="{{ asset($item->gambar) }}" class="gallery-lightbox">
                    <img src="{{ asset($item->gambar) }}" />
                </a>
            </div>
            @endforeach
          </div>
    </div>
</section>
<!-- end section gallery -->
<!-- section contact -->
<section class="section" id="reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Hubungi Kami</h6>
                        <h2>Di sini Anda bisa melakukan pemesanan</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Nomor Telepon</h4>
                                <span><a href="tel:6281398059979">0813-9805-9979</a><br></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Emails</h4>
                                <span><a href="mailto:larasgardenresto@gmail.com">larasgardenresto@gmail.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <form id="contact" action="{{ route('kontak.store') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Table Reservation</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="nama_pemesan" type="text" id="name" placeholder="Nama Anda" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Alamat Email Anda" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="phone" type="text" id="phone" placeholder="Nomor Telepon" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <div id="filterDate2">
                                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                                        <input name="date" id="date" type="date" class="form-control"
                                            placeholder="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div id="filterDate2">
                                    <div class="input-group time" data-time-format="H:i">
                                        <input name="time" id="time" type="text" class="form-control"
                                            placeholder="Waktu Reservasi" onfocus="(this.type='time')" onblur="(this.type='text')">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="jumlah_tamu" type="text" id="phone" placeholder="Jumlah Tamu*" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <fieldset>
                                    <textarea name="message" rows="6" id="message" placeholder="Pesan"
                                        required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button-icon">Buat Pesanan</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section gallery -->
@endsection
