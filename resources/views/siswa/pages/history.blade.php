@extends('siswa.layout.app')

@section('content')
<div class="min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="space-y-6">

            {{-- PAGE HEADER --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 shadow-md shadow-blue-200 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-extrabold text-gray-800 tracking-tight">Riwayat Laporan</h1>
                        <p class="text-xs text-gray-400 font-medium">Pantau status seluruh laporanmu</p>
                    </div>
                </div>

                <div class="bg-white border border-gray-100 shadow-sm rounded-2xl px-4 py-2 text-center hidden sm:block">
                    <span class="text-lg font-extrabold text-blue-600">3</span>
                    <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider -mt-0.5">Laporan</p>
                </div>
            </div>

            {{-- FILTER --}}
            <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none">
                @foreach([
                    ['label' => 'Semua', 'count' => '3', 'active' => true],
                    ['label' => 'Menunggu', 'count' => '1', 'active' => false],
                    ['label' => 'Proses', 'count' => '1', 'active' => false],
                    ['label' => 'Selesai', 'count' => '1', 'active' => false],
                ] as $filter)
                <button class="flex-shrink-0 flex items-center space-x-1.5 px-3.5 py-2 rounded-xl text-xs font-semibold border
                    {{ $filter['active']
                        ? 'bg-blue-600 text-white border-blue-600 shadow-md shadow-blue-200'
                        : 'bg-white text-gray-500 border-gray-200 hover:border-blue-200 hover:text-blue-600' }}">
                    <span>{{ $filter['label'] }}</span>
                    <span class="inline-flex items-center justify-center w-4 h-4 rounded-full text-[10px] font-bold
                        {{ $filter['active'] ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500' }}">
                        {{ $filter['count'] }}
                    </span>
                </button>
                @endforeach
            </div>

            {{-- DUMMY DATA --}}
            @php
            $laporans = [
                [
                    'id' => 'LPR-001',
                    'kategori' => 'Fasilitas Sekolah',
                    'lokasi' => 'Toilet Lantai 2, Gedung B',
                    'laporan' => 'Kran air rusak...',
                    'status' => 'Selesai',
                    'feedback' => 'Sudah diperbaiki.',
                    'tanggal' => '08 April 2026',
                    'selesai' => '10 April 2026',
                ],
                [
                    'id' => 'LPR-002',
                    'kategori' => 'Keamanan',
                    'lokasi' => 'Parkiran',
                    'laporan' => 'Parkir tidak rapi...',
                    'status' => 'Proses',
                    'feedback' => 'Sedang ditindak.',
                    'tanggal' => '12 April 2026',
                    'selesai' => null,
                ],
            ];
            @endphp

            {{-- LIST --}}
            @foreach($laporans as $item)
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-5 space-y-3">

                <div class="flex justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-700">{{ $item['kategori'] }}</p>
                    </div>

                    <span class="text-xs font-bold px-2 py-2 rounded-xl
                        {{ $item['status'] == 'Selesai' ? 'bg-emerald-100 text-emerald-600' : '' }}
                        {{ $item['status'] == 'Proses' ? 'bg-indigo-100 text-indigo-600' : '' }}">
                        {{ $item['status'] }}
                    </span>
                </div>

                <p class="text-sm text-gray-600">{{ $item['laporan'] }}</p>

                <div class="bg-slate-200 px-4 py-4 rounded-xl shadow-md">
                    <p class="text-md font-bold">Feedback:</p>
                    <p class="text-sm text-gray-600">{{ $item['feedback'] }}</p>
                </div>

                <div class="text-xs text-gray-400">
                    {{ $item['tanggal'] }}
                </div>

            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection