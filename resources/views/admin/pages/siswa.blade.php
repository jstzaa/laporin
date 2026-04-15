@extends('admin.layout.app')

@section('content')
<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- TITLE -->
    <div>
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
            Manajemen Siswa
        </h1>
        <p class="text-xs sm:text-sm text-gray-500">
            Kelola data siswa sekolah
        </p>
    </div>

    <!-- FORM TAMBAH SISWA -->
    <div class="bg-white p-4 sm:p-5 rounded-xl shadow">
        <h2 class="text-base sm:text-lg font-semibold text-gray-700 mb-4">
            Tambah Siswa
        </h2>
        <form class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
            <!-- NAMA -->
            <input type="text"
                placeholder="Nama siswa"
                class="w-full shadow-lg rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

            <!-- NIS -->
            <input type="text"
                placeholder="NIS"
                class="w-full shadow-lg rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

            <!-- PASSWORD -->
            <input type="text"
                placeholder="Password"
                class="w-full shadow-lg rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

            <!-- BUTTON -->
            <button type="button"
                class="w-full bg-blue-600 shadow-lg text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition">
                Simpan
            </button>
        </form>
        <p class="text-xs sm:text-sm text-gray-400 mt-2">
            * Jika password kosong, sistem akan generate otomatis
        </p>
    </div>

    <!-- TABLE SISWA -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-xs sm:text-sm">
                <!-- HEADER -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 sm:px-6 py-3 text-left">Nama</th>
                        <th class="px-4 sm:px-6 py-3 text-left">NIS</th>
                        <th class="px-4 sm:px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY DUMMY -->
                <tbody class="divide-y">
                    <!-- ROW 1 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 sm:px-6 py-4 font-medium text-gray-800">
                            Budi Santoso
                        </td>
                        <td class="px-4 sm:px-6 py-4 text-gray-600">
                            12345
                        </td>
                        <td class="px-4 sm:px-6 py-4">
                            <div class="flex flex-col sm:flex-row gap-2">
                                <button class="w-full sm:w-auto bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button class="w-full sm:w-auto bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- ROW 2 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 sm:px-6 py-4 font-medium text-gray-800">
                            Siti Aisyah
                        </td>
                        <td class="px-4 sm:px-6 py-4 text-gray-600">
                            67890
                        </td>
                        <td class="px-4 sm:px-6 py-4">
                            <div class="flex flex-col sm:flex-row gap-2">
                                <button class="w-full sm:w-auto bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button class="w-full sm:w-auto bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection