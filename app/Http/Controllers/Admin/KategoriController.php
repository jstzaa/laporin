<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar kategori.
     */
    public function index()
    {
        $kategori = Kategori::select('id_kategori', 'ket_kategori')->orderBy('ket_kategori', 'asc')->paginate(10);

        return view('admin.pages.kategori', compact('kategori'));
    }

    /**
     * Menambahkan kategori baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['ket_kategori' => 'required|max:255']);

        Kategori::create($validated);

        return redirect()->back()->with('success','Kategori berhasil ditambahkan!');
    }

    /**
     * Memperbarui data kategori.
     */
    public function update(Request $request, $id_kategori)
    {
        $validated = $request->validate(['ket_kategori' => 'required|max:255']);

        Kategori::findOrFail($id_kategori)->update($validated);

        return redirect()->back()->with('success', 'Kategori berhasil diedit');
    }

    /**
     * Menghapus data kategori.
     */
    public function destroy($id_kategori)
    {
        Kategori::findOrFail($id_kategori)->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }
}
