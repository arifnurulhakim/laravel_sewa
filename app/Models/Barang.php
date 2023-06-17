<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'jenis_barang_id',
        'nama',
        'stok',
        'harga_sewa',
        'harga_jual',
        'gambar',
        'deskripsi',
    ];

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }
}
