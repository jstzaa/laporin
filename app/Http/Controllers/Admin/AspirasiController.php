<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = InputAspirasi::with('siswa')->orderBy('created_at', 'desc')->paginate(10);
        $kategori = Kategori::select('id_kategori', 'ket_kategori')->orderBy('ket_kategori', 'asc')->get();
        return view('admin.pages.home', compact('laporan', 'kategori'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|exists:kategoris,id_kategori'
        ]);

        $laporan = InputAspirasi::with('siswa')
                    ->whereDate('created_at', $request->tanggal)
                    ->where(['id_kategori' => $request->kategori])
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

        $kategori = Kategori::select('id_kategori', 'ket_kategori')->orderBy('ket_kategori', 'asc')->get();
        
        return view('admin.pages.home', compact('laporan', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aspirasi $aspirasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aspirasi $aspirasi)
    {
        //
    }
}
