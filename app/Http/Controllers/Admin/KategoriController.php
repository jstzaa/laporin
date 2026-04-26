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
        $validated = $request->validate(['ket_kategori' => 'required|max:30']);

        Kategori::create($validated);

        return redirect()->back()->with('success','Kategori berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit.
     */
    public function edit($id_kategori)
    {
        $kategori = Kategori::select('id_kategori', 'ket_kategori')->where('id_kategori', $id_kategori)->firstOrFail();
        return view('admin.pages.edit_kategori', compact('kategori'));
    }


    /**
     * Memperbarui data kategori.
     */
    public function update(Request $request, $id_kategori)
    {
        $validated = $request->validate(['ket_kategori' => 'required|max:30']);

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
