<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Aspirasi;

class InputAspirasi extends Model
{
    // Inisialisasi Tabel
    protected $table = 'input_aspirasis';

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_pelaporan';

    // Inisialisasi Fillable
    protected $fillable = ['id_siswa','id_kategori','lokasi','keterangan'];

    // Relasi ke tabel aspirasi
    public function aspirasi(): HasOne
    {
        return $this->hasOne(Aspirasi::class, 'id_pelaporan','id_pelaporan');
    }

    // Relasi ke tabel siswa
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa','id_siswa');
    }

    // Relasi ke tabel kategori
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori','id_kategori');
    }
}
