<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswas')->insert([
            'nama_siswa' => 'Fahriza Kurniawan',
            'nis' => '1234567890',
            'password' => Hash::make('12345678'),
            'kelas' => 'XII RPL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
