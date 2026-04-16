@extends('admin.layout.app')

@section('content')
<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-xl bg-blue-600 shadow-md shadow-blue-200 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-extrabold text-gray-800 tracking-tight">Daftar Laporan</h1>
                <p class="text-xs text-gray-400 font-medium">Kelola semua laporan laporan siswa</p>
            </div>
        </div>
        <span class="px-4 py-1.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100 self-start sm:self-center">
            3 Laporan Ditemukan
        </span>
    </div>

    {{-- FILTER SECTION --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center space-x-2 mb-4">
            <div class="w-1 h-5 bg-blue-600 rounded-full"></div>
            <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider">Filter Laporan</h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div class="space-y-1">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Tanggal</label>
                <input type="date"
                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 transition-all">
            </div>

            <div class="space-y-1">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Kategori</label>
                <select class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 transition-all">
                    <option>Semua Kategori</option>
                    <option>Fasilitas</option>
                    <option>Akademik</option>
                    <option>Keamanan</option>
                </select>
            </div>

            <div class="flex items-end">
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2.5 rounded-xl shadow-md shadow-blue-100 transition-all duration-150">
                    Terapkan Filter
                </button>
            </div>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        {{-- Table Header Bar --}}
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 bg-gray-50/30">
            <div class="flex items-center space-x-2">
                <div class="w-1 h-5 bg-blue-600 rounded-full"></div>
                <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider">Data Laporan Siswa</h2>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-gray-500 text-[10px] uppercase tracking-[0.2em] border-b border-gray-100">
                        <th class="px-6 py-4 text-left font-bold">Pelapor</th>
                        <th class="px-6 py-4 text-left font-bold">Isi Laporan</th>
                        <th class="px-6 py-4 text-left font-bold">Status</th>
                        <th class="px-6 py-4 text-right font-bold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-50">
                    <tr class="group hover:bg-blue-50/40 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-xs uppercase">
                                    BS
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold text-gray-800">Budi Santoso</span>
                                    <span class="text-[10px] text-gray-400 font-mono">NIS: 12345</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="max-w-xs sm:max-w-sm">
                                <p class="text-sm text-gray-600 truncate group-hover:whitespace-normal transition-all">
                                    AC kelas tidak dingin dan sudah rusak sejak minggu lalu.
                                </p>
                                <span class="text-[9px] text-gray-400 italic">12 Apr 2026</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2 py-1 rounded-lg text-[10px] font-bold bg-amber-50 text-amber-600 uppercase border border-amber-100">
                                <span class="w-1 h-1 rounded-full bg-amber-500 mr-1.5 animate-pulse"></span>
                                Pending
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 bg-gray-50 text-gray-400 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors border border-gray-100">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <button class="p-2 bg-red-50 text-red-500 rounded-lg hover:bg-red-100 transition-colors border border-red-100">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
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