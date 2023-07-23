<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'users';

    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'name', 'email', 'password', 'nomor_tlpn',
    ];

    // Kolom-kolom yang sebaiknya disembunyikan dari representasi model (hidden)
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Kolom-kolom yang akan di-cast ke jenis data tertentu (cast)
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
