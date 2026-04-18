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
            {{ $laporan->count() }} Laporan Ditemukan
        </span>
    </div>

    {{-- FILTER SECTION --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center space-x-2 mb-4">
            <div class="w-1 h-5 bg-blue-600 rounded-full"></div>
            <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider">Filter Laporan</h2>
        </div>
        
        <form method="GET" action="{{ route('show.home.admin') }}">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Tanggal</label>
                    <input type="date" name="tanggal"
                        class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 transition-all">
                </div>
    
                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Kategori</label>
                    <select name="kategori" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 transition-all">
                        <option>Semua Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id_kategori }}">{{ $item->ket_kategori }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2.5 rounded-xl shadow-md shadow-blue-100 transition-all duration-150">
                        Terapkan Filter
                    </button>
                </div>
            </div>
        </form>
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
                        <th class="px-6 py-4 text-left font-bold">Kategori</th>
                        <th class="px-6 py-4 text-left font-bold">Status</th>
                        <th class="px-6 py-4 text-right font-bold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-50">
                    @foreach ($laporan as $item)
                        <tr class="group hover:bg-blue-50/40 transition-colors duration-150">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-xs uppercase">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-800">{{ $item->siswa->nama_siswa }}</span>
                                        <span class="text-[10px] text-gray-400 font-mono">NIS: {{ $item->siswa->nis }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="max-w-xs sm:max-w-sm">
                                    <p class="text-sm text-gray-600 truncate group-hover:whitespace-normal transition-all">
                                        ({{ $item->lokasi }}) {{ $item->keterangan }}
                                    </p>
                                    <span class="text-[9px] text-gray-400 italic">{{ $item->created_at }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-bold text-gray-600 truncate group-hover:whitespace-normal transition-all">
                                    {{ $item->kategori->ket_kategori }}
                                </p>
                            </td>
                            <form method="POST" action="{{ route('update.laporan') }}">
                                @csrf
                                <td class="px-6 py-4">
                                    <input type="hidden" name="id_pelaporan" value="{{ $item->id_pelaporan }}">
                                    <select name="status" class="p-2 bg-gray-50 text-gray-400 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors border border-gray-100">
                                        @foreach ($statusList as $status)
                                            <option value="{{ $status }}"
                                                {{ ($item->aspirasi->status ?? '') == $status ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <input type="text" name="feedback" placeholder="Masukkan feedback" class="p-2 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors border border-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                        <button class="p-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2.5 rounded-xl shadow-md shadow-blue-100 transition-all duration-150">
                                            Update
                                        </button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection