<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 */
	protected function redirectTo(Request $request): ?string
	{
		//return $request->expectsJson() ? null : route('login');
        if (! $request->expectsJson()) {
            // Kiểm tra nếu URL hiện tại bắt đầu bằng '/admin'
            if (str_contains($request->url(), '/khach')) {
                return route('user.dangnhap'); // Chuyển hướng đến trang đăng nhập của admin
            } else {
                return route('login'); // Chuyển hướng đến trang đăng nhập chung
            }
        }
	}
}