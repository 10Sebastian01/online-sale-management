<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#ffffff" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title', 'Trang chủ') - {{ config('app.name', 'Laravel') }}</title>
    
    <title>Trang chủ</title>
    
    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/img/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/img/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/img/favicon-16x16.png') }}" />

    
    <!-- CSS -->
    <link rel="stylesheet" media="screen" href="{{ asset('public/vendor/simplebar/simplebar.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/vendor/tiny-slider/tiny-slider.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/vendor/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/vendor/drift-zoom/drift-basic.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/vendor/lightgallery/lightgallery-bundle.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/css/theme.min.css') }}" />

</head>

<body class="handheld-toolbar-enabled">
    <main class="page-wrapper">
        <header class="shadow-sm">
            <div class="navbar-sticky bg-light">
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="{{ route('frontend.home') }}">
                            <img src="{{ asset('public/img/logo-dark.png') }}" width="142" />
                        </a>
                        <a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="{{ route('frontend.home') }}">
                            <img src="{{ asset('public/img/logo-dark.png') }}" width="74" />
                        </a>
                        <div class="input-group d-none d-lg-flex mx-4">
                            <input class="form-control rounded-end pe-5" type="text" placeholder="Tìm kiếm" />
                            <i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
                        </div>
                        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a class="navbar-tool navbar-stuck-toggler" href="#menu">
                                <span class="navbar-tool-tooltip">Mở rộng menu</span>
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                            </a>


<!-- Login area -->
                            @guest
                            <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{ route('user.dangnhap') }}">
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                                <div class="navbar-tool-text ms-n3"><small>Xin chào</small>Khách hàng</div>
                            </a>
                            @else
                            <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{ route('user.home') }}">
                                <li class="nav-item dropdown" style="list-style-type: none">
                                    <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                                    <div class="navbar-tool-text ms-n3">
                                        <small>Xin chào</small>{{ Auth::user()->name }}
                                    </div>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-right-to-bracket"></i>  Đăng xuất
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </a>
                            @endguest

<!-- Giỏ hàng -->
                            <div class="navbar-tool ms-3">
                                <a class="navbar-tool-icon-box bg-secondary" href="{{ route('frontend.giohang') }}">
                                    <span class="navbar-tool-label">{{ Cart::count() ?? 0 }}</span><i class="navbar-tool-icon ci-cart"></i>
                                </a>
                                <a class="navbar-tool-text" href="{{ route('frontend.giohang') }}"><small>Giỏ hàng</small>{{ Cart::priceTotal() ?? 0}}đ</a>
                            </div>


                        </div>
                    </div>
                </div>
                
                <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <div class="input-group d-lg-none my-3">
                                <i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                                <input class="form-control rounded-start" type="text" placeholder="Tìm kiếm" />
                            </div>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link ps-lg-0" href="{{ route('frontend.home') }}">
                                        <i class="ci-home me-2"></i>Trang chủ
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('frontend.sanpham') }}" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="ci-gift me-2"></i>Sản phẩm</a>
                                    <ul class="dropdown-menu">
                                        @foreach($nav_lsp as $navlsp)
                                            <li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => $navlsp->tenloai_slug]) }}">{{ $navlsp->tenloai }}</a></li>
                                        @endforeach
{{--                                        <li><a class="dropdown-item" href="#">Máy tính bảng</a></li>--}}
{{--                                        <li><a class="dropdown-item" href="#">Máy tính xách tay</a></li>--}}
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.baiviet') }}"><i class="ci-globe me-2"></i>Tin tức</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.tuyendung') }}"><i class="ci-loudspeaker me-2"></i>Tuyển dụng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.lienhe') }}"><i class="ci-support me-2"></i>Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
    </main>
    
    <footer class="footer bg-dark">
        <div class="pt-5 bg-darker">
            <div class="container">
                <div class="row pb-2">
                    <div class="col-md-6 text-center text-md-start mb-4">
                        <div class="text-nowrap mb-4">
                            <a class="d-inline-block align-middle mt-n1 me-3" href="#"><img class="d-block" src="{{ asset('public/img/footer-logo-light.png') }}" width="117" /></a>
                        </div>
                        <div class="widget widget-links widget-light">
                            <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="#">Trang chủ</a></li>
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="#">Sản phẩm</a></li>
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="#">Tin tức</a></li>
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="#">Tuyển dụng</a></li>
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-end mb-4">
                        <div class="mb-3">
                            <a class="btn-social bs-light bs-twitter ms-2 mb-2" href="#"><i class="ci-twitter"></i></a>
                            <a class="btn-social bs-light bs-facebook ms-2 mb-2" href="#"><i class="ci-facebook"></i></a>
                            <a class="btn-social bs-light bs-instagram ms-2 mb-2" href="#"><i class="ci-instagram"></i></a>
                            <a class="btn-social bs-light bs-pinterest ms-2 mb-2" href="#"><i class="ci-pinterest"></i></a>
                            <a class="btn-social bs-light bs-youtube ms-2 mb-2" href="#"><i class="ci-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-4 fs-xs text-light opacity-50 text-center text-md-start">Bản quyền © 2023 bởi Cartzilla.</div>
            </div>
        </div>
    </footer>
    
    <a class="btn-scroll-top" href="#top" data-scroll>
        <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
        <i class="btn-scroll-top-icon ci-arrow-up"></i>
    </a>
    
    <script src="{{ asset('public/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/vendor/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('public/vendor/tiny-slider/tiny-slider.js') }}"></script>
    <script src="{{ asset('public/vendor/smooth-scroll/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('public/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('public/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/vendor/shufflejs/shuffle.min.js') }}"></script>
    <script src="{{ asset('public/vendor/lightgallery/lightgallery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/lightgallery/plugins/fullscreen/lg-fullscreen.min.js') }}"></script>
    <script src="{{ asset('public/vendor/lightgallery/plugins/zoom/lg-zoom.min.js') }}"></script>
    <script src="{{ asset('public/vendor/lightgallery/plugins/video/lg-video.min.js') }}"></script>
    <script src="{{ asset('public/vendor/drift-zoom/Drift.min.js') }}"></script>
    <script src="{{ asset('public/js/theme.min.js') }}"></script>

</body>
</html>