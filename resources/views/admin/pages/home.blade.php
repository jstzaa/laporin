@extends('admin.layout.app')

@section('content')
<div class="w-5xl mx-auto p-6 space-y-6">
    <!-- TITLE -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            Daftar Aduan
        </h1>
        <p class="text-sm text-gray-500">
            Kelola semua laporan aduan siswa
        </p>
    </div>
    <!-- FILTER -->
    <div class="bg-white p-5 rounded-xl shadow space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Tanggal -->
            <div>
                <label class="text-sm text-gray-600">Tanggal</label>
                <input type="date"
                    class="w-full mt-1 shadow-lg rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Kategori -->
            <div>
                <label class="text-sm text-gray-600">Kategori</label>
                <select class="w-full mt-1 shadow-lg rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    <option>Semua Kategori</option>
                    <option>Fasilitas</option>
                    <option>Akademik</option>
                    <option>Keamanan</option>
                </select>
            </div>
            <!-- Button -->
            <div class="flex items-end">
                <button class="w-full shadow-lg bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Filter
                </button>
            </div>
        </div>
    </div>
    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <!-- HEADER -->
            <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                <tr>
                    <th class="px-6 py-3 text-left">Pengadu</th>
                    <th class="px-6 py-3 text-left">Isi Aduan</th>
                    <th class="px-6 py-3 text-left">Status & Feedback</th>
                </tr>
            </thead>
            <!-- BODY (DUMMY DATA) -->
            <tbody class="divide-y">
                <!-- ROW 1 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-800">Budi Santoso</div>
                        <div class="text-xs text-gray-500">NIS: 12345</div>
                        <div class="text-xs text-gray-400">12 Apr 2026</div>
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        AC kelas tidak dingin dan sudah rusak sejak minggu lalu.
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                            Pending
                        </span>
                        <p class="text-sm text-gray-600 mt-2">
                            Menunggu tindak lanjut admin
                        </p>
                    </td>
                </tr>
                <!-- ROW 2 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-800">Siti Aisyah</div>
                        <div class="text-xs text-gray-500">NIS: 67890</div>
                        <div class="text-xs text-gray-400">10 Apr 2026</div>
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        Toilet sekolah tidak bersih dan bau tidak sedap.
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">
                            Diproses
                        </span>
                        <p class="text-sm text-gray-600 mt-2">
                            Tim kebersihan sedang ditugaskan
                        </p>
                    </td>
                </tr>
                <!-- ROW 3 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-800">Andi Pratama</div>
                        <div class="text-xs text-gray-500">NIS: 11223</div>
                        <div class="text-xs text-gray-400">08 Apr 2026</div>
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        WiFi sekolah sudah diperbaiki dan berjalan normal.
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                            Selesai
                        </span>
                        <p class="text-sm text-gray-600 mt-2">
                            Terima kasih atas laporannya
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection