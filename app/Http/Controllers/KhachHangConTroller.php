<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\DatHangThanhCongEmail;
use Illuminate\Support\Facades\Mail;
use Cart;

class KhachHangConTroller extends Controller
{
      public function getHome()
      {
            if(Auth::check())
            {
                  $nguoidung = NguoiDung::find(Auth::user()->id);
                  return view('user.home', compact('nguoidung'));
            }
            else
                  return redirect()->route('user.dangnhap');   
      }

      public function getDatHang()
      {
            if(Auth::check())
                 return view('user.dathang');
           else
                 return view('user.dangnhap');
     }

     public function postDatHang(Request $request)
     {
       // Kiểm tra
       $this->validate($request, [
             'diachigiaohang' => ['required', 'string', 'max:255'],
             'dienthoaigiaohang' => ['required', 'string', 'max:255'],
       ]);

 // Lưu vào đơn hàng
       $dh = new DonHang();
       $dh->nguoidung_id = Auth::user()->id;
       $dh->tinhtrang_id = 1; // Đơn hàng mới
       $dh->diachigiaohang = $request->diachigiaohang;
       $dh->dienthoaigiaohang = $request->dienthoaigiaohang;
       $dh->save();
       // Lưu vào đơn hàng chi tiết
       foreach(Cart::content() as $value)
       {
           $ct = new DonHang_ChiTiet();
           $ct->donhang_id = $dh->id;
           $ct->sanpham_id = $value->id;
           $ct->soluongban = $value->qty;
           $ct->dongiaban = $value->price;
           $ct->save();
        }

        try 
        {
            Mail::to(Auth::user()->email)->send(new DatHangThanhCongEmail($dh));
              
        } catch (Exception $e) 
        {
              return $e->getMessage();
        }
      return redirect()->route('user.dathangthanhcong');
      }

 public function getDatHangThanhCong()
 {
      Cart::destroy();
       return view('user.dathangthanhcong');
 }

 public function getDonHang($id = '')
 {
       return view('user.donhang');
 }

 public function postDonHang(Request $request, $id)
 {

 }

 public function getHoSoCaNhan()
 {
      return redirect()->route('user.home');     
 }

      public function postHoSoCaNhan(Request $request)
      {
       $id = Auth::user()->id;

       $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:nguoidung,email,' . $id],
            'password' => ['confirmed'],
      ]);
       $orm = NguoiDung::find($id);
       $orm->name = $request->name;
       $orm->username = Str::before($request->email, '@');
       $orm->email = $request->email;
       if(!empty($request->password)) $orm->password = Hash::make($request->password);

       $orm->save();
       return redirect()->route('user.home')->with('success', 'Đã cập nhật thông tin thành công.');
 }

 public function postDangXuat(Request $request)
 {
       return redirect()->route('frontend.home');
 }

}
