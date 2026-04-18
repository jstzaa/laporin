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
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id('id_aspirasi');
            $table->enum('status', ['Menunggu','Proses','Selesai']);
            $table->foreignId('id_admin')
                ->constrained('admins', 'id_admin')
                ->cascadeOnDelete();
            $table->foreignId('id_pelaporan')
                ->unique()
                ->constrained('input_aspirasis', 'id_pelaporan')
                ->cascadeOnDelete();
            $table->string('feedback');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
