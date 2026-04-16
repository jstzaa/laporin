@extends('admin.layout.app')

@section('content')
<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- TITLE -->
    <div>
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
            Manajemen Admin
        </h1>
        <p class="text-xs sm:text-sm text-gray-500">
            Kelola akun admin sistem
        </p>
    </div>

    <!-- FORM TAMBAH ADMIN -->
    <div class="bg-white p-4 sm:p-5 rounded-xl shadow">
        <h2 class="text-base sm:text-lg font-semibold text-gray-700 mb-4">
            Tambah Admin
        </h2>
        <form method="POST" action="{{ route('add.admin') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
            @csrf
            <!-- USERNAME -->
            <input type="text" name="username"
                placeholder="Username admin"
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

    <!-- TABLE ADMIN -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-xs sm:text-sm">
                <!-- HEADER -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 sm:px-6 py-3 text-left">No</th>
                        <th class="px-4 sm:px-6 py-3 text-left">Username</th>
                        <th class="px-4 sm:px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY DUMMY -->
                <tbody class="divide-y">
                    <!-- ROW -->
                    @foreach ($admin as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 sm:px-6 py-3 font-medium text-gray-800">
                                {{ ($admin->currentPage() - 1) * $admin->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-4 sm:px-6 py-3 font-medium text-gray-800">
                                {{ $item->username }}
                            </td>
                            <td class="px-4 sm:px-6 py-3 flex flex-col sm:flex-row gap-2"
                                x-data="{ 
                                    openEdit: false, 
                                    openDelete: false,
                                    adminId: '{{ $item->id_admin }}',
                                    adminUsername: '{{ $item->username }}',
                                    adminPassword: '{{ $item->password }}'
                                }">

                                <!-- Button Edit -->
                                <button 
                                    @click="$dispatch('open-edit', { 
                                        id: '{{ $item->id_admin }}', 
                                        username: '{{ $item->username }}', 
                                        password: '' 
                                    })"
                                    class="w-full sm:w-auto bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                                    Edit
                                </button>

                                <!-- Button Hapus -->
                                <button 
                                    @click="$dispatch('open-delete', { 
                                        id: '{{ $item->id_admin }}', 
                                        username: '{{ $item->username }}'
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
            x-data="{ open: {{ $errors->any() ? 'true' : 'false' }}, id: null, username: '', password: '' }"
            x-show="open"
            x-transition
            x-transition.duration.300ms
            x-cloak
            @open-edit.window="
                open = true;
                id = $event.detail.id;
                username = $event.detail.username;
                password = $event.detail.password;
            "
            class="fixed inset-0 flex items-center justify-center bg-transparent z-50 p-4"
        >
            <div 
                @click.away="open = false"
                class="bg-white rounded-xl shadow-lg w-full max-w-md p-6"
            >
                <h2 class="text-base sm:text-lg font-semibold text-gray-700 mb-4">
                    Edit Admin
                </h2>

                <form method="POST" :action="'/admin/daftar-admin/' + id">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="id_siswa" :value="id">

                    <div class="mb-4">
                        <label class="block text-xs sm:text-sm text-gray-600 mb-1">
                            Username
                        </label>
                        <input 
                            type="text" 
                            name="username"
                            x-model="username"
                            class="w-full shadow-lg rounded-lg px-4 py-2 my-3 border border-gray-200 focus:ring-2 focus:ring-yellow-500 outline-none"
                            placeholder="Masukkan username admin"
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
            x-data="{ open: false, id: null, username: '' }"
            x-show="open"
            x-transition
            x-transition.duration.300ms
            x-cloak
            @open-delete.window="
                open = true;
                id = $event.detail.id;
                username = $event.detail.username;
            "
            class="fixed inset-0 flex items-center justify-center bg-transparent z-50 p-4"
        >
            <div 
                @click.away="open = false"
                class="bg-white rounded-xl shadow-lg w-full max-w-md p-6"
            >
                <h2 class="text-base sm:text-lg font-semibold text-gray-700 mb-4">
                    Hapus Admin
                </h2>

                <p class="text-xs sm:text-sm text-gray-600 mb-6">
                    Apakah Anda yakin ingin menghapus 
                    <span class="font-semibold" x-text="username"></span>?
                </p>

                <form method="POST" :action="'/admin/daftar-admin/' + id">
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
</div>
@endsection