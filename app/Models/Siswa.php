<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\InputAspirasi;

class Siswa extends Authenticatable
{
    // Inisialisasi Tabel
    protected $table = 'siswas';

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_siswa';

    // Inisialisasi Fillable
    protected $fillable = ['nama_siswa', 'nis', 'password', 'kelas'];
    protected $hidden = ['password'];
    protected $casts = [
        'password' => 'hashed',
    ];

    // Relasi ke tabel input aspirasi
    public function inputAspirasi(): HasMany
    {
        return $this->hasMany(InputAspirasi::class, 'id_siswa', 'id_siswa');
    }
}
