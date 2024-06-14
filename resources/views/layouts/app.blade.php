<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('public/vendor/font-awesome/css/all.min.css') }}" />
    @yield('css')
	<link rel="stylesheet" href="{{ asset('public/css/site.css') }}" />
	
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	@yield('javascript')
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('admin.home') }}">
                    <i class="fa-solid fa-store"></i> {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Quản lý cửa hàng
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('admin.loaisanpham') }}"><i class="fa-solid fa-diagram-project"></i> Loại sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('admin.hangsanxuat') }}"><i class="fa-solid fa-industry"></i> Hãng sản xuất</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('admin.sanpham') }}"><i class="fa-solid fa-box"></i> Sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('admin.tinhtrang') }}"><i class="fa-solid fa-list-check"></i> Tình trạng</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('admin.donhang') }}"><i class="fa-solid fa-bag-shopping"></i> Đơn hàng</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Quản lý bài viết
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.chude') }}"><i class="fa-solid fa-list-check"></i> Chủ đề</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.baiviet') }}"><i class="fa-solid fa-newspaper"></i> Bài viết</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.binhluanbaiviet') }}"><i class="fa-solid fa-comments"></i> Bình luận</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.nguoidung') }}"><i class="fa-solid fa-user-group"></i> Tài khoản</a>
                        </li>

                    </ul>
                    <!-- Right side of Navbar -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Đăng ký</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#nguoidung" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user-large"></i> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-to-bracket"></i>  Đăng xuất
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="pt-3">
            @yield('content')
        </main>
		
        <hr class="shadow-sm" />
        <footer>Bản quyền &copy; {{ date('Y') }} bởi {{ config('app.name', 'Laravel') }}.</footer>
    </div>
</body>
</html>