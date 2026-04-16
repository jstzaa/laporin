<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::select('id_kategori', 'ket_kategori')->orderBy('ket_kategori', 'asc')->paginate(10);
        
        return view('admin.pages.kategori', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['ket_kategori' => 'required']);

        Kategori::create($validated);

        return redirect()->back()->with('success','Kategori berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_kategori)
    {
        $validated = $request->validate(['ket_kategori' => 'required']);

        Kategori::findOrFail($id_kategori)->update($validated);

        return redirect()->back()->with('success', 'Kategori berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_kategori)
    {
        Kategori::findOrFail($id_kategori)->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }
}
