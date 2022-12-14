<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelians';
    protected $fillable = ['user_id', 'kode', 'nama','email','alamat','no_hp','bank', 'tgl_transaksi','sub_total','bukti', 'potongan', 'status'];

    public function detailPembelian(){
        return $this->hasMany(DetailPembelian::class, 'pembelian_id','id');
    }
    public function statusTr(){
        return $this->hasMany(StatusPembelian::class, 'pembelian_id', 'id');
    }
}
