@extends('admin.layout.app')

@section('content')
<div class="min-h-screen pb-12 px-4 sm:px-6">
    <div class="max-w-5xl mx-auto p-4 sm:p-6 space-y-6">

        {{-- BREADCRUMB --}}
        <div class="flex items-center space-x-2 text-xs text-gray-400 font-medium">
            <a href="{{ route('siswa.show') }}" class="hover:text-blue-600 transition">Siswa</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-600 font-semibold">Edit Siswa</span>
        </div>

        {{-- PAGE HEADER --}}
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-xl bg-emerald-600 shadow-md shadow-emerald-200 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-extrabold text-gray-800 tracking-tight">Edit Siswa</h1>
                <p class="text-xs text-gray-400 font-medium">Perbarui informasi akun siswa</p>
            </div>
        </div>

        {{-- FORM CARD --}}
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

            {{-- Accent bar emerald --}}
            <div class="h-1 w-full bg-gradient-to-r from-emerald-400 via-teal-400 to-emerald-300"></div>

            <div class="p-6 sm:p-8">

                {{-- Current siswa info --}}
                <div class="flex items-center space-x-3 bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-100 to-teal-100 border border-emerald-200 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Siswa yang Diedit</p>
                        <p class="text-sm font-bold text-gray-700">{{ $siswa->nama_siswa }}</p>
                        <p class="text-xs text-gray-400">NIS: {{ $siswa->nis }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('siswa.update', $siswa->id_siswa) }}" class="space-y-5">
                    @method('PUT')
                    @csrf

                    {{-- Nama --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Nama Lengkap</span>
                            <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input
                                type="text"
                                name="nama_siswa"
                                value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                                required
                                placeholder="Masukkan nama lengkap siswa..."
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 pl-10
                                       text-sm text-gray-700 placeholder-gray-400 font-medium
                                       focus:outline-none focus:ring-2 focus:ring-emerald-400
                                       focus:border-transparent transition-all duration-150">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Kelas --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"/>
                            </svg>
                            <span>Kelas</span>
                            <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input
                                type="text"
                                name="kelas"
                                value="{{ old('kelas', $siswa->kelas) }}"
                                required
                                placeholder="Masukkan kelas siswa..."
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 pl-10
                                       text-sm text-gray-700 placeholder-gray-400 font-medium
                                       focus:outline-none focus:ring-2 focus:ring-emerald-400
                                       focus:border-transparent transition-all duration-150">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- NIS --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"/>
                            </svg>
                            <span>NIS</span>
                            <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input
                                type="text"
                                name="nis"
                                value="{{ old('nis', $siswa->nis) }}"
                                required
                                placeholder="Masukkan NIS siswa..."
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 pl-10
                                       text-sm text-gray-700 placeholder-gray-400 font-medium
                                       focus:outline-none focus:ring-2 focus:ring-emerald-400
                                       focus:border-transparent transition-all duration-150
                                       @error('nis') border-red-300 bg-red-50 @enderror">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"/>
                                </svg>
                            </div>
                        </div>
                        @error('nis')
                            <div class="flex items-center space-x-1.5 text-xs text-red-500 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>Password Baru</span>
                            <span class="normal-case font-normal text-gray-400 text-[11px]">(OPSIONAL)</span>
                        </label>
                        <div class="relative">
                            <input
                                type="password"
                                name="password"
                                minlength="8"
                                placeholder="Masukkan password baru..."
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 pl-10
                                       text-sm text-gray-700 placeholder-gray-400 font-medium
                                       focus:outline-none focus:ring-2 focus:ring-emerald-400
                                       focus:border-transparent transition-all duration-150">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-400">Minimal 8 karakter jika ingin mengganti password.</p>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3 pt-2 border-t border-gray-100 mt-6">
                        <a href="{{ route('siswa.show') }}"
                           class="flex-1 flex items-center justify-center space-x-2
                                  bg-gray-100 hover:bg-gray-200 text-gray-500
                                  text-sm font-semibold px-5 py-2.5 rounded-xl transition-all duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>Batal</span>
                        </a>
                        <button
                            type="submit"
                            class="flex-[2] flex items-center justify-center space-x-2
                                   bg-emerald-600 hover:bg-emerald-700 text-white
                                   text-sm font-bold px-5 py-2.5 rounded-xl
                                   shadow-lg shadow-emerald-200 transition-all duration-150 hover:scale-[1.02]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection