<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Kategori;
use App\Models\Admin;
use App\Models\InputAspirasi;

class Aspirasi extends Model
{
    // Inisialisasi Tabel
    protected $table = 'aspirasis';

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_aspirasi';

    // Inisialisasi Fillable
    protected $fillable = [
        'status', 'id_admin', 'id_pelaporan', 'feedback'
    ];

    // Relasi ke tabel input aspirasi
    public function input_aspirasi(): BelongsTo
    {
        return $this->belongsTo(InputAspirasi::class, 'id_pelaporan', 'id_pelaporan');
    }

    // Relasi ke tabel kategori
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori','id_kategori');
    }

    // Relasi ke tabel admin
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'id_admin','id_admin');
    }
}
