<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'vouchers';
    protected $fillable = ['kode', 'jenis_voucher', 'barang_id', 'potongan', 'tgl_mulai', 'tgl_akhir'];

    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }

}
