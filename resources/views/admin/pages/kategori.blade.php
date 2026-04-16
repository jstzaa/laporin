@extends('admin.layout.app')

@section('content')
<div class="max-w-5xl mx-auto p-4 sm:p-6 space-y-6">

    {{-- HEADER --}}
    <div class="flex items-center space-x-3">
        <div class="w-10 h-10 rounded-xl bg-blue-600 shadow-md shadow-blue-200 flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
        </div>
        <div>
            <h1 class="text-xl font-extrabold text-gray-800 tracking-tight">Manajemen Kategori</h1>
            <p class="text-xs text-gray-400 font-medium">Kelola daftar kategori aduan sistem</p>
        </div>
    </div>

    {{-- FORM TAMBAH KATEGORI --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center space-x-2 mb-4">
            <div class="w-1 h-5 bg-blue-600 rounded-full"></div>
            <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider">Tambah Kategori Baru</h2>
        </div>
        <form method="POST" action="{{ route('add.kategori') }}" class="flex flex-col sm:flex-row gap-3">
            @csrf
            <div class="flex-1">
                <input type="text" name="ket_kategori" required
                    placeholder="Contoh: Sarana & Prasarana"
                    value="{{ old('ket_kategori') }}"
                    class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-700
                           placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                           transition-all duration-150 @error('ket_kategori') border-red-500 @enderror">
                @error('ket_kategori')
                    <p class="text-red-500 text-xs mt-1.5 ml-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="flex items-center justify-center space-x-2 bg-blue-600 hover:bg-blue-700
                       text-white text-sm font-semibold px-8 py-2.5 rounded-xl shadow-md shadow-blue-200
                       transition-all duration-150 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Simpan</span>
            </button>
        </form>
    </div>

    {{-- SUCCESS ALERT --}}
    @if (session('success'))
        <div id="alert-success"
             class="flex items-center space-x-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span><strong class="font-semibold">Berhasil!</strong> {{ session('success') }}</span>
        </div>
        <script>
            setTimeout(() => { document.getElementById('alert-success')?.remove(); }, 3000);
        </script>
    @endif

    {{-- TABLE --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        
        {{-- Table Header Bar --}}
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <div class="flex items-center space-x-2">
                <div class="w-1 h-5 bg-blue-600 rounded-full"></div>
                <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider">Daftar Kategori</h2>
            </div>
            <span class="text-xs text-gray-400 font-medium">{{ $kategori->total() }} kategori terdaftar</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-50 to-gray-100 text-gray-500 text-xs uppercase tracking-widest">
                        <th class="px-5 py-3 text-left font-semibold w-16">No</th>
                        <th class="px-5 py-3 text-left font-semibold">Nama Kategori</th>
                        <th class="px-5 py-3 text-right font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($kategori as $item)
                        <tr class="hover:bg-blue-50/40 transition-colors duration-100">
                            {{-- No --}}
                            <td class="px-5 py-3.5">
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-gray-100 text-gray-500 text-xs font-bold">
                                    {{ ($kategori->currentPage() - 1) * $kategori->perPage() + $loop->iteration }}
                                </span>
                            </td>

                            {{-- Nama Kategori --}}
                            <td class="px-5 py-3.5">
                                <span class="font-semibold text-gray-800 text-sm">{{ $item->ket_kategori }}</span>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex justify-end items-center gap-2">
                                    <button
                                        @click="$dispatch('open-edit', { id: '{{ $item->id_kategori }}', nama: '{{ $item->ket_kategori }}' })"
                                        class="flex items-center space-x-1.5 px-3 py-1.5 bg-amber-50 hover:bg-amber-100
                                               text-amber-600 hover:text-amber-700 text-xs font-semibold rounded-lg
                                               border border-amber-200 transition-all duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        <span>Edit</span>
                                    </button>

                                    <button
                                        @click="$dispatch('open-delete', { id: '{{ $item->id_kategori }}', nama: '{{ $item->ket_kategori }}' })"
                                        class="flex items-center space-x-1.5 px-3 py-1.5 bg-red-50 hover:bg-red-100
                                               text-red-500 hover:text-red-600 text-xs font-semibold rounded-lg
                                               border border-red-200 transition-all duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($kategori->hasPages())
            <div class="px-5 py-4 border-t border-gray-100 bg-gray-50/50">
                {{ $kategori->links() }}
            </div>
        @endif

        {{-- ======================== MODAL EDIT ======================== --}}
        <div
            x-data="{ open: false, id: null, nama: '' }"
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-cloak
            @open-edit.window="open = true; id = $event.detail.id; nama = $event.detail.nama"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            style="background: rgba(15,23,42,0.45); backdrop-filter: blur(4px);"
        >
            <div @click.away="open = false" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6">
                
                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center space-x-3">
                        <div class="w-9 h-9 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <h2 class="text-base font-bold text-gray-800">Edit Kategori</h2>
                    </div>
                    <button @click="open = false" class="p-1.5 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <form method="POST" :action="'/admin/kategori/' + id">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id_kategori" :value="id">
                    <div class="space-y-4 mb-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Nama Kategori</label>
                            <input type="text" name="ket_kategori" x-model="nama" required
                                   class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-700
                                          placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400
                                          focus:border-transparent transition-all duration-150">
                        </div>
                    </div>

                    <div class="flex gap-2 pt-4 border-t border-gray-100">
                        <button type="button" @click="open = false"
                                class="flex-1 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 text-sm font-semibold rounded-xl transition">
                            Batal
                        </button>
                        <button type="submit"
                                class="flex-1 px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold
                                       rounded-xl shadow-md shadow-amber-200 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ======================== MODAL HAPUS ======================== --}}
        <div
            x-data="{ open: false, id: null, nama: '' }"
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-cloak
            @open-delete.window="open = true; id = $event.detail.id; nama = $event.detail.nama"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            style="background: rgba(15,23,42,0.45); backdrop-filter: blur(4px);"
        >
            <div @click.away="open = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 text-center">
                
                <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>

                <h2 class="text-xl font-bold text-gray-800 mb-2">Hapus Kategori?</h2>
                <p class="text-sm text-gray-500 mb-8">
                    Kategori <span class="font-bold text-red-600" x-text="nama"></span> akan dihapus permanen. Tindakan ini tidak dapat dibatalkan.
                </p>

                <form method="POST" :action="'/admin/kategori/' + id" class="flex flex-col gap-2">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="w-full py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 shadow-lg shadow-red-200 transition">
                        Ya, Hapus Sekarang
                    </button>
                    <button type="button" @click="open = false" class="w-full py-3 bg-white text-gray-500 font-semibold rounded-xl hover:bg-gray-50 transition">
                        Batal
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection