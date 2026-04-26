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
     * Menampilkan daftar aspirasi dan filter berdasarkan kategori dan tanggal.
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
     * Memperbarui status dan feedback aspirasi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Proses,Selesai',
            'feedback' => 'required|max:50',
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
}
