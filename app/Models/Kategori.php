<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Aspirasi;
use App\Models\InputAspirasi;

class Kategori extends Model
{
    // Inisialisasi Tabel
    protected $table = 'kategori';

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_kategori';

    // Inisialisasi Guarded
    protected $guarded = ['id_kategori'];

    // Relasi ke tabel input aspirasi
    public function inputAspirasi(): HasMany
    {
        return $this->hasMany(InputAspirasi::class, 'id_kategori', 'id_kategori');
    }

    // Relasi ke tabel aspirasi
    public function aspirasi(): HasMany
    {
        return $this->hasMany(Aspirasi::class, 'id_kategori', 'id_kategori');
    }
}
