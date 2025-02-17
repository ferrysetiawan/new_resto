<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Favicons -->
  <link href="{{ asset('larasGarden/image/favicon.png') }}" rel="icon">

  <link rel="stylesheet" href="{{ asset('larasGarden/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('larasGarden/vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('larasGarden/vendor/glightbox/css/glightbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('larasGarden/vendor/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css">
  <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
  <link rel="stylesheet" href="{{ asset('larasGarden/vendor/animate/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('larasGarden/vendor/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('larasGarden/style/font-awesome.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('larasGarden/style/util.css') }}">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"> -->
  <link rel="stylesheet" href="{{ asset('larasGarden/style/style.css') }}">

  @yield('style')

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1BQS560ZGY"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-1BQS560ZGY');
  </script>
  <title>Laras Garden Resto</title>
</head>

<body>
    <header id="header">
        <div class="container d-flex align-items-center justify-content-between">

        <a href="index.html"><img class="logo" width="100px" src="{{ asset('larasGarden/image/logo.svg') }}"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                <li><a class="nav-link" href="#about">Tentang Kami</a></li>
                <li><a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="{{ route('menu.index') }}">Menu</a></li>
                <li><a class="nav-link" href="#team">Tim</a></li>
                @if ($countEvent >= 1)
                <li><a class="nav-link" href="#event">Acara</a></li>
                @endif
                @if ($countNews >= 1)
                <li><a class="nav-link" href="#news">Berita</a></li>
                @endif
                <li><a class="nav-link" href="#gallery">Galeri</a></li>
                <li><a class="nav-link" href="#reservation">Hubungi Kami</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        </div>
    </header>
  @yield('content')
  <!-- section footer -->
  <footer>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 col-xs-12">
          <div class="right-text-content">
            <ul class="social-icons">
              <li><a href="https://www.facebook.com/profile.php?id=100092845063856"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="https://www.instagram.com/larasgardenresto/"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="logo">
            <a href="index.html"><img src="{{ asset('larasGarden/image/laras_garden.png') }}" width="150px" alt=""></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-12">
          <div class="left-text-content">
            <p>© Copyright Laras Garden Resto
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end section footer -->
  <script src="{{ asset('larasGarden/vendor/jquery/jquery-min.3.6.0.js') }}"></script>
  <script src="{{ asset('larasGarden/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('larasGarden/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('larasGarden/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('larasGarden/vendor/slick/slick.min.js') }}"></script>
  <!-- <script src="/vendor/countdowntime/countdowntime.js"></script> -->
  <script src="{{ asset('larasGarden/js/slick-custom.js') }}"></script>
  <script src="{{ asset('larasGarden/js/app.min.js') }}"></script>
  <script src="{{ asset('larasGarden/js/main.js') }}"></script>
  <script src="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js"></script>
  {{-- <script src="{{ asset('larasGarden/js/ticker.js') }}"></script> --}}
  @yield('js')
  <script>
    const galleryLightbox = GLightbox({
      selector: '.gallery-lightbox'
    });

    $("#headline .owl-carousel").owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:2
        },
        1200:{
            items:3
        }
    }
});
  </script>
  <script>
    document.addEventListener('readystatechange', event => {
      if (event.target.readyState === "complete") {
        var clockdiv = document.getElementsByClassName("clockdiv");
        var countDownDate = new Array();
        for (var i = 0; i < clockdiv.length; i++) {
          countDownDate[i] = new Array();
          countDownDate[i]['el'] = clockdiv[i];
          countDownDate[i]['time'] = new Date(clockdiv[i].getAttribute('data-date')).getTime();
          countDownDate[i]['days'] = 0;
          countDownDate[i]['hours'] = 0;
          countDownDate[i]['seconds'] = 0;
          countDownDate[i]['minutes'] = 0;
        }

        var countdownfunction = setInterval(function () {
          for (var i = 0; i < countDownDate.length; i++) {
            var now = new Date().getTime();
            var distance = countDownDate[i]['time'] - now;
            countDownDate[i]['days'] = Math.floor(distance / (1000 * 60 * 60 * 24));
            countDownDate[i]['hours'] = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            countDownDate[i]['minutes'] = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            countDownDate[i]['seconds'] = Math.floor((distance % (1000 * 60)) / 1000);

            if (distance < 0) {
              countDownDate[i]['el'].querySelector('.days').innerHTML = '00';
              countDownDate[i]['el'].querySelector('.hours').innerHTML = '00';
              countDownDate[i]['el'].querySelector('.minutes').innerHTML = '00';
              countDownDate[i]['el'].querySelector('.seconds').innerHTML = '00';
            } else {
                if (countDownDate[i]['days'] < 10) {
                    countDownDate[i]['el'].querySelector('.days').innerHTML = '0'+countDownDate[i]['days'];
                } else {
                    countDownDate[i]['el'].querySelector('.days').innerHTML = countDownDate[i]['days'];
                }
                if (countDownDate[i]['hours'] < 10) {
                    countDownDate[i]['el'].querySelector('.hours').innerHTML = '0'+countDownDate[i]['hours'];
                } else {
                    countDownDate[i]['el'].querySelector('.hours').innerHTML = countDownDate[i]['hours'];
                }
                if (countDownDate[i]['minutes'] < 10) {
                    countDownDate[i]['el'].querySelector('.minutes').innerHTML = '0'+countDownDate[i]['minutes'];
                } else {
                    countDownDate[i]['el'].querySelector('.minutes').innerHTML = countDownDate[i]['minutes'];
                }
                if (countDownDate[i]['seconds'] < 10) {
                    countDownDate[i]['el'].querySelector('.seconds').innerHTML = '0'+countDownDate[i]['seconds'];
                } else {
                    countDownDate[i]['el'].querySelector('.seconds').innerHTML = countDownDate[i]['seconds'];
                }
            }

          }
        }, 1000);
      }
    });
  </script>
</body>

</html>
