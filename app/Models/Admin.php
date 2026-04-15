<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Aspirasi;

class Admin extends Authenticatable
{
    // Inisialisasi Tabel
    protected $table = 'admins';

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_admin';

    // Inisialisasi Guarded
    protected $guarded = ['id_admin'];

    // Relasi ke tabel aspirasi
    public function aspirasi(): HasMany
    {
        return $this->hasMany(Aspirasi::class, 'id_admin', 'id_admin');
    }
}
