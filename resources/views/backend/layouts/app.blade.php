
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        @yield('style')

    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light mt-2">
                    <span class="logo-lg">
                        <img src="{{ asset('larasGarden/image/laras_garden.png') }}" alt="" height="80">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo_sm.png') }}" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo_sm_dark.png') }}" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar="">

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item mt-3">Navigation</li>

                        <li class="side-nav-item">
                            <a href="{{ route('dashboard') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboard </span>
                            </a>
                        </li> 

                        <li class="side-nav-item">
                            <a href="{{ route('hero.index') }}" class="side-nav-link">
                                <i class="uil-presentation-lines-alt"></i>
                                <span> Hero </span>
                            </a>
                        </li> 

                        <li class="side-nav-item">
                            <a href="{{ route('about.index') }}" class="side-nav-link">
                                <i class="uil-copy-alt"></i>
                                <span> About Us </span>
                            </a>
                        </li> 

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Product </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('categoryProduct.index') }}">Category</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('product.index') }}">Items</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('chef.index') }}" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span> Chef </span>
                            </a>
                        </li> 

                        <li class="side-nav-item">
                            <a href="{{ route('event.index') }}" class="side-nav-link">
                                <i class="uil-calendar-alt"></i>
                                <span> Event </span>
                            </a>
                        </li> 

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarNews" aria-expanded="false" aria-controls="sidebarNews" class="side-nav-link">
                                <i class="uil-newspaper"></i>
                                <span> News </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarNews">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('categories.index') }}">Categories</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tags.index') }}">Tags</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('post.index') }}">Post</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('gallery.index') }}" class="side-nav-link">
                                <i class="uil-images"></i>
                                <span> Gallery </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('user.index') }}" class="side-nav-link">
                                <i class="uil-user"></i>
                                <span>User</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{ route('unisharp.lfm.show') }}" class="side-nav-link">
                                <i class="uil-folder-plus"></i>
                                <span> File Manager </span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name">Soeng Souy</span>
                                        <span class="account-position">Founder</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        @yield('content')
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- bundle -->
        <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
        <script>
            @if(session() -> has('success'))
    
            Swal.fire({
                icon: 'success',
                title: 'BERHASIL!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            })
    
            @elseif(session() -> has('error'))
    
            Swal.fire({
                icon: 'error',
                text: 'GAGAL!',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 10000
            })
    
            @endif
    
        </script>
        @yield('js')
        
    </body>
</html>
