<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $laporan = InputAspirasi::with(['siswa','kategori','aspirasi'])
            ->when($request->kategori, function ($q) use ($request) {
                $q->where('id_kategori', $request->kategori);
            })
            ->when($request->tanggal, function ($q) use ($request) {
                $q->whereDate('created_at', $request->tanggal);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $kategori = Kategori::orderBy('ket_kategori')->get();

        $statusList = ['Menunggu','Proses','Selesai'];

        return view('admin.pages.home', compact('laporan','kategori','statusList'));
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
            'status' => 'required|in:Menunggu,Proses,Selesai',
            'feedback' => 'required|max:255',
            'id_pelaporan' => 'required|exists:input_aspirasis,id_pelaporan'
        ]);

        Aspirasi::updateOrCreate(
            ['id_pelaporan' => $request->id_pelaporan],
            [
                'status' => $request->status,
                'id_admin' => Auth::guard('admin')->user()->id_admin,
                'feedback' => $request->feedback
            ]
        );

        return redirect()->back()->with('success','Laporan berhasil diupdate!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // $request->validate([
        //     'tanggal' => 'required|date',
        //     'kategori' => 'required|exists:kategoris,id_kategori'
        // ]);

        // $laporan = InputAspirasi::with('siswa')
        //             ->whereDate('created_at', $request->tanggal)
        //             ->where(['id_kategori' => $request->kategori])
        //             ->orderBy('created_at', 'desc')
        //             ->paginate(10);

        // $kategori = Kategori::select('id_kategori', 'ket_kategori')->orderBy('ket_kategori', 'asc')->get();

        // return view('admin.pages.home', compact('laporan', 'kategori'));
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
