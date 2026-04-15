@extends('admin.layout.app')

@section('content')
<div class="w-5xl mx-auto p-6 space-y-6">
    <!-- TITLE -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            Manajemen Kategori
        </h1>
        <p class="text-sm text-gray-500">
            Tambah, edit, dan hapus kategori aduan
        </p>
    </div>
    <!-- FORM INPUT KATEGORI -->
    <div class="bg-white p-5 rounded-xl shadow">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">
            Tambah Kategori
        </h2>
        <form method="POST" action="{{ route('kategori') }}" class="flex flex-col md:flex-row gap-3">
            @csrf
            <!-- INPUT NAMA -->
            <input type="text" name="ket_kategori" required
                placeholder="Nama kategori..."
                class="flex-1 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
            <!-- BUTTON SIMPAN -->
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Simpan
            </button>
        </form>
    </div>
    @if (session('success'))
        <div id="alert-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>

        <script>
            setTimeout(() => {
                document.getElementById('alert-success').remove();
            }, 3000);
        </script>
    @endif
    <!-- TABLE LIST KATEGORI -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <!-- HEADER -->
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 text-left">No</th>
                    <th class="px-6 py-3 text-left">Nama Kategori</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <!-- BODY (DUMMY DATA) -->
            <tbody class="divide-y">
                <!-- ROW 1 -->
                @foreach ($kategori as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $item->ket_kategori }}
                        </td>
                        <td class="px-6 py-4 flex gap-2">
                            <button class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                                Edit
                            </button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection