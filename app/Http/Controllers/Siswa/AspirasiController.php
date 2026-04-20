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
     * Menampilkan halaman utama aspirasi dan dropdown kategori.
     */
    public function index()
    {
        $kategori = Kategori::select('id_kategori', 'ket_kategori')->orderBy('ket_kategori', 'asc')->get();
        return view('siswa.pages.home', compact('kategori'));
    }

    /**
     * Menampilkan riwayat aspirasi siswa.
     */
    public function showHistory()
    {
        $history = InputAspirasi::with('aspirasi.admin','kategori')
                    ->where('id_siswa', Auth::guard('siswa')->user()->id_siswa)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);

        return view('siswa.pages.history', compact('history'));
    }

    /**
     * Menyimpan aspirasi baru.
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
}
