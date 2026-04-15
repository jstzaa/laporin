<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\InputAspirasi;

class Siswa extends Authenticatable
{
    // Inisialisasi Tabel
    protected $table = 'siswas';

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_siswa';

    // Inisialisasi Guarded
    protected $guarded = ['id_siswa'];

    // Relasi ke tabel input aspirasi
    public function inputAspirasi(): HasMany
    {
        return $this->hasMany(InputAspirasi::class, 'id_siswa', 'id_siswa');
    }
}
