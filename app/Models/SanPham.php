<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SanPham extends Model
{
	protected $table = 'sanpham';
	
	protected $fillable = [
		'loaisanpham_id',
		'hangsanxuat_id',
		'tensanpham',
		'tensanpham_slug',
		'soluong',
		'dongia',
		'hinhanh',
		'motasanpham',
	];
	
	public function LoaiSanPham(): BelongsTo
	{
		return $this->belongsTo(LoaiSanPham::class, 'loaisanpham_id', 'id');
	}
	
	public function HangSanXuat(): BelongsTo
	{
		return $this->belongsTo(HangSanXuat::class, 'hangsanxuat_id', 'id');
	}
	
	public function DonHang_ChiTiet(): HasMany
	{
		return $this->hasMany(DonHang_ChiTiet::class, 'sanpham_id', 'id');
	}
}