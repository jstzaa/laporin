<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Kategori;
use App\Models\InputAspirasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::select('id_kategori', 'ket_kategori')->orderBy('ket_kategori', 'asc')->get();
        return view('siswa.pages.home', compact('kategori'));
    }

    public function showHistory()
    {
        return view('siswa.pages.history');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|exists:kategoris,id_kategori',
            'lokasi' => 'required|max:255',
            'keterangan' => 'required'
        ]);

        InputAspirasi::create([
            'id_siswa' => Auth::guard('siswa')->user()->id_siswa,
            'id_kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->back()->with('success','Laporan berhasil disampaikan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
