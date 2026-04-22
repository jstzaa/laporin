@extends('admin.layout.app')

@section('content')
<div class="min-h-screen pb-12 px-4 sm:px-6">
    <div class="max-w-5xl mx-auto p-4 sm:p-6 space-y-6">

        {{-- BREADCRUMB --}}
        <div class="flex items-center space-x-2 text-xs text-gray-400 font-medium">
            <a href="{{ route('admin.show') }}" class="hover:text-blue-600 transition">Admin</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-600 font-semibold">Edit Admin</span>
        </div>

        {{-- PAGE HEADER --}}
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-xl bg-amber-500 shadow-md shadow-amber-200 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-extrabold text-gray-800 tracking-tight">Edit Admin</h1>
                <p class="text-xs text-gray-400 font-medium">Perbarui informasi akun admin</p>
            </div>
        </div>

        {{-- FORM CARD --}}
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

            {{-- Accent bar amber --}}
            <div class="h-1 w-full bg-gradient-to-r from-amber-400 via-yellow-400 to-amber-300"></div>

            <div class="p-6 sm:p-8">

                {{-- Current admin info --}}
                <div class="flex items-center space-x-3 bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-100 to-yellow-100 border border-amber-200 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Akun yang Diedit</p>
                        <p class="text-sm font-bold text-gray-700">{{ $admin->username }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.update', $admin->id_admin) }}" class="space-y-5">
                    @method('PUT')
                    @csrf

                    {{-- Username --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Username</span>
                            <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <input
                                type="text"
                                name="username"
                                value="{{ old('username', $admin->username) }}"
                                required
                                placeholder="Masukkan username admin..."
                                class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 pl-10
                                       text-sm text-gray-700 placeholder-gray-400 font-medium
                                       focus:outline-none focus:ring-2 focus:ring-amber-400
                                       focus:border-transparent transition-all duration-150
                                       @error('username') border-red-300 bg-red-50 @enderror">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        </div>
                        @error('username')
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                       focus:outline-none focus:ring-2 focus:ring-amber-400
                                       focus:border-transparent transition-all duration-150
                                       @error('password') border-red-300 bg-red-50 @enderror">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                        </div>
                        @error('password')
                            <div class="flex items-center space-x-1.5 text-xs text-red-500 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                                </svg>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        <p class="text-[11px] text-gray-400">Minimal 8 karakter jika ingin mengganti password.</p>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3 pt-2 border-t border-gray-100 mt-6">
                        <a href="{{ route('admin.show') }}"
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
                                   bg-amber-500 hover:bg-amber-600 text-white
                                   text-sm font-bold px-5 py-2.5 rounded-xl
                                   shadow-lg shadow-amber-200 transition-all duration-150 hover:scale-[1.02]">
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