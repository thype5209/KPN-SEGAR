<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'roles_id',
        // 'foto',
        'name',
        'username',
        'email',
        'alamat',
        'telephone',
        'posisi',
        'password',
        'status',
    ];

    public function roles() // relasi tabel posisi ke kryawan
    {
        return $this->belongsTo(Roles::class,'roles_id'); //1 karyawan mempunyai 1 posisi
    }
    public function anggota() // relasi tabel posisi ke kryawan
    {
        return $this->hasOne(Anggota::class,'user_id', 'id'); //1 karyawan mempunyai 1 posisi
    }

    public function peminjamans() // relasi tabel posisi ke kryawan
    {
        return $this->belongsTo(Peminjaman::class,'peminjamans_id'); //1 karyawan mempunyai 1 posisi
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
}
