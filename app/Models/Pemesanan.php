<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_pesanan',
        'total_bayar',
        'denda',
        'tanggal_mulai',
        'tanggal_selesai',
        'tanggal_kembali',
        'barang_id',
        'users_id',
        'konfirm',
        'jenis_transaksi',
        'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
