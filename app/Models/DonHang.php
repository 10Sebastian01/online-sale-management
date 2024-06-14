<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class DonHang extends Model
{
	protected $table = 'donhang';
	
	public function NguoiDung(): BelongsTo
	{
		return $this->belongsTo(NguoiDung::class, 'nguoidung_id', 'id');
	}
	
	public function TinhTrang(): BelongsTo
	{
		return $this->belongsTo(TinhTrang::class, 'tinhtrang_id', 'id');
	}
	
	public function DonHang_ChiTiet(): HasMany
	{
		return $this->hasMany(DonHang_ChiTiet::class, 'donhang_id', 'id');
	}
}