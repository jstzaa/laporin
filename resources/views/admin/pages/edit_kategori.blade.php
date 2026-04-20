@extends('admin.layout.app')

@section('content')
<div class="min-h-screen pb-12 px-4 sm:px-6">
    <div class="max-w-5xl mx-auto p-4 sm:p-6 space-y-6">

        {{-- BREADCRUMB --}}
        <div class="flex items-center space-x-2 text-xs text-gray-400 font-medium">
            <a href="{{ route('show.kategori') }}" class="hover:text-blue-600 transition">Kategori</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-600 font-semibold">Edit Kategori</span>
        </div>

        {{-- PAGE HEADER --}}
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-xl bg-blue-600 shadow-md shadow-blue-200 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 014-4z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-extrabold text-gray-800 tracking-tight">Edit Kategori</h1>
                <p class="text-xs text-gray-400 font-medium">Perbarui informasi kategori laporan</p>
            </div>
        </div>

        {{-- FORM CARD --}}
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

            {{-- Accent bar --}}
            <div class="h-1 w-full bg-gradient-to-r from-blue-500 via-indigo-500 to-blue-400"></div>

            <div class="p-6 sm:p-8">

                {{-- Current value info --}}
                <div class="flex items-center space-x-3 bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 014-4z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Kategori Saat Ini</p>
                        <p class="text-sm font-bold text-gray-700">{{ $kategori->ket_kategori }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('update.kategori', $kategori->id_kategori) }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Nama Kategori --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center space-x-1.5 text-xs font-bold text-gray-500 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 014-4z"/>
                            </svg>
                            <span>Nama Kategori</span>
                            <span class="text-red-400">*</span>
                        </label>
                        <input
                            type="text"
                            name="ket_kategori"
                            value="{{ old('ket_kategori', $kategori->ket_kategori) }}"
                            required
                            placeholder="Masukkan nama kategori..."
                            class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5
                                   text-sm text-gray-700 placeholder-gray-400 font-medium
                                   focus:outline-none focus:ring-2 focus:ring-blue-500
                                   focus:border-transparent transition-all duration-150">
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3 pt-2 border-t border-gray-100 mt-6">
                        <a href="{{ route('show.kategori') }}"
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
                                   bg-blue-600 hover:bg-blue-700 text-white
                                   text-sm font-bold px-5 py-2.5 rounded-xl
                                   shadow-lg shadow-blue-200 transition-all duration-150 hover:scale-[1.02]">
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