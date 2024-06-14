<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View; // Dùng cho view composer bên dưới
use App\Models\LoaiSanPham;

class AppServiceProvider extends ServiceProvider
{

	public function register(): void
	{
		//
	}
	
	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
        // View composer chia sẻ dữ liệu tất cả các view mà không cần truyền khi mỗi lần gọi
        View::composer('*', function ($view) {
            $nav_lsp = LoaiSanPham::all(); // lấy để hiển thị loại sản phẩm trên thanh navbar
                $view->with('nav_lsp', $nav_lsp);
        });

		Schema::defaultStringLength(191);
		//Paginator::useBootstrapFour();
		Paginator::useBootstrapFive();
	}
}