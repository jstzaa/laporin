@extends('admin.layout.app')

@section('content')
<div class="w-5xl mx-auto p-6 space-y-6">
    <!-- TITLE -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            Manajemen Siswa
        </h1>
        <p class="text-sm text-gray-500">
            Kelola data siswa sekolah
        </p>
    </div>
    <!-- FORM TAMBAH SISWA -->
    <div class="bg-white p-5 rounded-xl shadow">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">
            Tambah Siswa
        </h2>
        <form class="grid grid-cols-1 md:grid-cols-4 gap-3">
            <!-- NAMA -->
            <input type="text"
                placeholder="Nama siswa"
                class="shadow-lg rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
            <!-- NIS -->
            <input type="text"
                placeholder="NIS"
                class="shadow-lg rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
            <!-- PASSWORD (AUTO GENERATED / INPUT OPTIONAL) -->
            <input type="text"
                placeholder="Password"
                class="shadow-lg rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
            <!-- BUTTON -->
            <button type="button"
                class="bg-blue-600 shadow-lg text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition">
                Simpan
            </button>
        </form>
        <p class="text-xs text-gray-400 mt-2">
            * Jika password kosong, sistem akan generate otomatis
        </p>
    </div>
    <!-- TABLE SISWA -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <!-- HEADER -->
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 text-left">Nama</th>
                    <th class="px-6 py-3 text-left">NIS</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <!-- BODY DUMMY -->
            <tbody class="divide-y">
                <!-- ROW 1 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800">
                        Budi Santoso
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        12345
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                            Edit
                        </button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                            Hapus
                        </button>
                    </td>
                </tr>
                <!-- ROW 2 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800">
                        Siti Aisyah
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        67890
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <button class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                            Edit
                        </button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                            Hapus
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection