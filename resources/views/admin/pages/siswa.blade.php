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
        <form method="POST" action="{{ route('add.siswa') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
            @csrf
            <!-- NAMA -->
            <input type="text" name="nama_siswa"
                placeholder="Nama siswa"
                class="w-full shadow-lg rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

            <!-- NIS -->
            <input type="text" name="nis"
                placeholder="NIS"
                class="w-full shadow-lg rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

            <!-- PASSWORD -->
            <input type="text" name="kelas"
                placeholder="Kelas"
                class="w-full shadow-lg rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

            <!-- BUTTON -->
            <button type="submit"
                class="w-full bg-blue-600 shadow-lg text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition">
                Simpan
            </button>
        </form>
    </div>

    <!-- SUCCESS MESSAGE -->
    @if (session('success'))
        <div id="alert-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4 text-sm" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>

        <script>
            setTimeout(() => {
                document.getElementById('alert-success').remove();
            }, 3000);
        </script>
    @endif

    <!-- TABLE SISWA -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-xs sm:text-sm">
                <!-- HEADER -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 sm:px-6 py-3 text-left">No</th>
                        <th class="px-4 sm:px-6 py-3 text-left">Nama</th>
                        <th class="px-4 sm:px-6 py-3 text-left">NIS</th>
                        <th class="px-4 sm:px-6 py-3 text-left">Kelas</th>
                        <th class="px-4 sm:px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY DUMMY -->
                <tbody class="divide-y">
                    <!-- ROW -->
                    @foreach ($siswa as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 sm:px-6 py-3 font-medium text-gray-800">
                                {{ ($siswa->currentPage() - 1) * $siswa->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-4 sm:px-6 py-3 font-medium text-gray-800">
                                {{ $item->nama_siswa }}
                            </td>
                            <td class="px-4 sm:px-6 py-3 text-gray-600">
                                {{ $item->nis }}
                            </td>
                            <td class="px-4 sm:px-6 py-3 text-gray-600">
                                {{ $item->kelas }}
                            </td>
                            <td class="px-4 sm:px-6 py-3 flex flex-col sm:flex-row gap-2"
                                x-data="{ 
                                    openEdit: false, 
                                    openDelete: false,
                                    siswaId: '{{ $item->id_siswa }}',
                                    siswaNama: '{{ $item->nama_siswa }}',
                                    siswaNIS: '{{ $item->nis }}',
                                    siswaKelas: '{{ $item->kelas }}',
                                    siswaPassword: '{{ $item->password }}'
                                }">

                                <!-- Button Edit -->
                                <button 
                                    @click="$dispatch('open-edit', { 
                                        id: '{{ $item->id_siswa }}', 
                                        nama: '{{ $item->nama_siswa }}', 
                                        nis: '{{ $item->nis }}', 
                                        kelas: '{{ $item->kelas }}', 
                                        password: '', 
                                    })"
                                    class="w-full sm:w-auto bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                                    Edit
                                </button>

                                <!-- Button Hapus -->
                                <button 
                                    @click="$dispatch('open-delete', { 
                                        id: '{{ $item->id_siswa }}', 
                                        nama: '{{ $item->nama_siswa }}' 
                                    })"
                                    class="w-full sm:w-auto bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- MODAL EDIT -->
        <div 
            x-data="{ open: {{ $errors->any() ? 'true' : 'false' }}, id: null, nama: '', nis: '', kelas: '', password: '' }"
            x-show="open"
            x-transition
            x-transition.duration.300ms
            x-cloak
            @open-edit.window="
                open = true;
                id = $event.detail.id;
                nama = $event.detail.nama;
                nis = $event.detail.nis;
                kelas = $event.detail.kelas;
                password = $event.detail.password;
            "
            class="fixed inset-0 flex items-center justify-center bg-transparent z-50 p-4"
        >
            <div 
                @click.away="open = false"
                class="bg-white rounded-xl shadow-lg w-full max-w-md p-6"
            >
                <h2 class="text-base sm:text-lg font-semibold text-gray-700 mb-4">
                    Edit Siswa
                </h2>

                <form method="POST" :action="'/admin/daftar-siswa/' + id">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="id_siswa" :value="id">

                    <div class="mb-4">
                        <label class="block text-xs sm:text-sm text-gray-600 mb-1">
                            Nama
                        </label>
                        <input 
                            type="text" 
                            name="nama_siswa"
                            x-model="nama"
                            class="w-full shadow-lg rounded-lg px-4 py-2 my-3 border border-gray-200 focus:ring-2 focus:ring-yellow-500 outline-none"
                            placeholder="Masukkan nama siswa"
                        >
                        <label class="block text-xs sm:text-sm text-gray-600 mb-1">
                            NIS
                        </label>
                        <input 
                            type="text" 
                            name="nis"
                            x-model="nis"
                            class="w-full shadow-lg rounded-lg px-4 py-2 my-3 border border-gray-200 focus:ring-2 focus:ring-yellow-500 outline-none"
                            placeholder="Masukkan NIS"
                        >
                        <label class="block text-xs sm:text-sm text-gray-600 mb-1">
                            Kelas
                        </label>
                        <input 
                            type="text" 
                            name="kelas"
                            x-model="kelas"
                            class="w-full shadow-lg rounded-lg px-4 py-2 my-3 border border-gray-200 focus:ring-2 focus:ring-yellow-500 outline-none"
                            placeholder="Masukkan kelas"
                        >
                        <label class="block text-xs sm:text-sm text-gray-600 mb-1">
                            Password Baru (Kosongkan jika tidak diubah)
                        </label>
                        <input 
                            type="password" 
                            name="password"
                            minlength="8"
                            x-model="password"
                            class="w-full shadow-lg rounded-lg px-4 py-2 my-3 border border-gray-200 focus:ring-2 focus:ring-yellow-500 outline-none"
                            placeholder="Masukkan password baru"
                        >
                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-2">
                        <button 
                            type="button" 
                            @click="open = false"
                            class="w-full sm:w-auto px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400"
                        >
                            Batal
                        </button>
                        <button 
                            type="submit"
                            class="w-full sm:w-auto px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 font-medium"
                        >
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL HAPUS -->
        <div 
            x-data="{ open: false, id: null, nama: '' }"
            x-show="open"
            x-transition
            x-transition.duration.300ms
            x-cloak
            @open-delete.window="
                open = true;
                id = $event.detail.id;
                nama = $event.detail.nama;
            "
            class="fixed inset-0 flex items-center justify-center bg-transparent z-50 p-4"
        >
            <div 
                @click.away="open = false"
                class="bg-white rounded-xl shadow-lg w-full max-w-md p-6"
            >
                <h2 class="text-base sm:text-lg font-semibold text-gray-700 mb-4">
                    Hapus Siswa
                </h2>

                <p class="text-xs sm:text-sm text-gray-600 mb-6">
                    Apakah Anda yakin ingin menghapus 
                    <span class="font-semibold" x-text="nama"></span>?
                </p>

                <form method="POST" :action="'/admin/daftar-siswa/' + id">
                    @method('DELETE')
                    @csrf
                    
                    <input type="hidden" name="id_kategori" :value="id">

                    <div class="flex flex-col sm:flex-row justify-end gap-2">
                        <button 
                            type="button" 
                            @click="open = false"
                            class="w-full sm:w-auto px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400"
                        >
                            Batal
                        </button>
                        <button 
                            type="submit"
                            class="w-full sm:w-auto px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600"
                        >
                            Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- PAGINATION BUTTON -->
    <div class="mt-6 flex justify-center">
        {{ $siswa->links() }}
    </div>
</div>
@endsection