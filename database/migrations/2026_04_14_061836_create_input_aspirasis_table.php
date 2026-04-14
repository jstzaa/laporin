<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('input_aspirasis', function (Blueprint $table) {
            $table->id('id_pelaporan');
            $table->foreignId('id_siswa')
                ->constrained('siswas', 'id_siswa')
                ->cascadeOnDelete();

            $table->foreignId('id_kategori')
                ->constrained('kategoris', 'id_kategori')
                ->cascadeOnDelete();
            $table->string('lokasi');
            $table->string('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_aspirasis');
    }
};
