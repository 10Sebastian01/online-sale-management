<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LoaiSanPham;

class ShareData
{
    public function handle(Request $request, Closure $next): Response
    {
//        $nav_lsp = LoaiSanPham::all();
//        view()->share('nav_lsp', $nav_lsp);
        return $next($request);
    }
}
