@extends('admin.layout.app')

@section('content')
<div class="max-w-5xl mx-auto p-4 sm:p-6 space-y-6">

    {{-- HEADER --}}
    <div class="flex items-center space-x-3">
        <div class="w-10 h-10 rounded-xl bg-blue-600 shadow-md shadow-blue-200 flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </div>
        <div>
            <h1 class="text-xl font-extrabold text-gray-800 tracking-tight">Manajemen Siswa</h1>
            <p class="text-xs text-gray-400 font-medium">Kelola data siswa sekolah</p>
        </div>
    </div>

    {{-- FORM TAMBAH SISWA --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center space-x-2 mb-4">
            <div class="w-1 h-5 bg-blue-600 rounded-full"></div>
            <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider">Tambah Siswa Baru</h2>
        </div>
        <form method="POST" action="{{ route('add.siswa') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
            @csrf
            <input type="text" name="nama_siswa" placeholder="Nama siswa"
                   class="flex-1 rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-700 
                          placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
            
            <input type="text" name="nis" placeholder="NIS"
                   class="flex-1 rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-700 
                          placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
            
            <input type="text" name="kelas" placeholder="Kelas"
                   class="flex-1 rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm text-gray-700 
                          placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">

            <button type="submit"
                    class="flex items-center justify-center space-x-2 bg-blue-600 hover:bg-blue-700 
                           text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-md shadow-blue-200 transition-all">
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
                <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider">Daftar Siswa</h2>
            </div>
            <span class="text-xs text-gray-400 font-medium">{{ $siswa->total() }} siswa terdaftar</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-50 to-gray-100 text-gray-500 text-xs uppercase tracking-widest">
                        <th class="px-5 py-3 text-left font-semibold w-16">No</th>
                        <th class="px-5 py-3 text-left font-semibold">Informasi Siswa</th>
                        <th class="px-5 py-3 text-left font-semibold">Kelas</th>
                        <th class="px-5 py-3 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($siswa as $item)
                        <tr class="hover:bg-blue-50/40 transition-colors duration-100">
                            {{-- No --}}
                            <td class="px-5 py-3.5">
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-gray-100 text-gray-500 text-xs font-bold">
                                    {{ ($siswa->currentPage() - 1) * $siswa->perPage() + $loop->iteration }}
                                </span>
                            </td>

                            {{-- Nama & NIS --}}
                            <td class="px-5 py-3.5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800 text-sm leading-tight">{{ $item->nama_siswa }}</p>
                                        <p class="text-[10px] text-gray-400 font-medium uppercase tracking-tighter">NIS: {{ $item->nis }}</p>
                                    </div>
                                </div>
                            </td>

                            {{-- Kelas --}}
                            <td class="px-5 py-3.5">
                                <span class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-600 text-[11px] font-bold uppercase">
                                    {{ $item->kelas }}
                                </span>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-2">
                                    <button 
                                        @click="$dispatch('open-edit', { 
                                            id: '{{ $item->id_siswa }}', 
                                            nama: '{{ $item->nama_siswa }}', 
                                            nis: '{{ $item->nis }}', 
                                            kelas: '{{ $item->kelas }}', 
                                            password: '' 
                                        })"
                                        class="flex items-center space-x-1.5 px-3 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-600 text-xs font-semibold rounded-lg border border-amber-200 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        <span>Edit</span>
                                    </button>

                                    <button 
                                        @click="$dispatch('open-delete', { 
                                            id: '{{ $item->id_siswa }}', 
                                            nama: '{{ $item->nama_siswa }}' 
                                        })"
                                        class="flex items-center space-x-1.5 px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-500 text-xs font-semibold rounded-lg border border-red-200 transition-all">
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
        @if ($siswa->hasPages())
            <div class="px-5 py-4 border-t border-gray-100 bg-gray-50/50">
                {{ $siswa->links() }}
            </div>
        @endif
    </div>

    {{-- MODAL EDIT --}}
    <div 
        x-data="{ open: {{ $errors->any() ? 'true' : 'false' }}, id: null, nama: '', nis: '', kelas: '', password: '' }"
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
        @open-edit.window="
            open = true;
            id = $event.detail.id;
            nama = $event.detail.nama;
            nis = $event.detail.nis;
            kelas = $event.detail.kelas;
            password = $event.detail.password;
        "
        class="fixed h-screen inset-0 z-50 flex items-center justify-center p-4"
        style="background: rgba(15,23,42,0.45); backdrop-filter: blur(4px);"
    >
        <div @click.away="open = false" class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6">
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <h2 class="text-base font-bold text-gray-800">Edit Data Siswa</h2>
                </div>
                <button @click="open = false" class="p-1.5 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form method="POST" :action="'/admin/daftar-siswa/' + id">
                @method('PUT')
                @csrf
                <input type="hidden" name="id_siswa" :value="id">

                <div class="space-y-4 mb-6 text-left">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_siswa" x-model="nama"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-400 focus:outline-none transition-all">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">NIS</label>
                            <input type="text" name="nis" x-model="nis"
                                   class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-400 focus:outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Kelas</label>
                            <input type="text" name="kelas" x-model="kelas"
                                   class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-400 focus:outline-none transition-all">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Password Baru <span class="normal-case font-normal">(Opsional)</span></label>
                        <input type="password" name="password" minlength="8" x-model="password" placeholder="••••••••"
                               class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-400 focus:outline-none transition-all">
                    </div>
                </div>

                <div class="flex gap-2">
                    <button type="button" @click="open = false"
                            class="flex-1 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 text-sm font-semibold rounded-xl transition">
                        Batal
                    </button>
                    <button type="submit"
                            class="flex-1 px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold rounded-xl shadow-md shadow-amber-200 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL HAPUS --}}
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
        @open-delete.window="
            open = true;
            id = $event.detail.id;
            nama = $event.detail.nama;
        "
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="background: rgba(15,23,42,0.45); backdrop-filter: blur(4px);"
    >
        <div @click.away="open = false" class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 text-center">
            <div class="w-12 h-12 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
            
            <h2 class="text-lg font-bold text-gray-800 mb-2">Hapus Data Siswa</h2>
            <div class="bg-red-50 border border-red-100 rounded-xl px-4 py-3 mb-6">
                <p class="text-sm text-gray-600">
                    Hapus data <span class="font-bold text-red-600" x-text="nama"></span>? Tindakan ini permanen.
                </p>
            </div>

            <form method="POST" :action="'/admin/daftar-siswa/' + id">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id_kategori" :value="id">

                <div class="flex gap-2">
                    <button type="button" @click="open = false"
                            class="flex-1 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 text-sm font-semibold rounded-xl transition">
                        Batal
                    </button>
                    <button type="submit"
                            class="flex-1 px-4 py-2.5 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-xl shadow-md shadow-red-200 transition">
                        Ya, Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection