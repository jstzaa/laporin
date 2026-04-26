<?php

namespace App\Http\Controllers\Admin;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    /**
     * Menampilkan daftar siswa.
     */
    public function index()
    {
        $siswa = Siswa::select('id_siswa', 'nama_siswa', 'nis', 'kelas')->orderBy('nama_siswa', 'asc')->paginate(10);
        return view('admin.pages.siswa', compact('siswa'));
    }

    /**
     * Menambahkan siswa baru dan generate password.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|max:50',
            'nis' => 'required|max:10|unique:siswas,nis',
            'kelas' => 'required|max:10',
        ],[
            'nis.unique' => 'NIS sudah digunakan, gunakan NIS yang baru!'
        ]);

        $validated['password'] = $request->nis . config('app.student_password_suffix');

        Siswa::create($validated);

        return redirect()->back()->with('success','Siswa berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit.
     */
    public function edit($id_siswa)
    {
        $siswa = Siswa::select('id_siswa', 'nama_siswa', 'nis', 'kelas')->where('id_siswa', $id_siswa)->firstOrFail();
        return view('admin.pages.edit_siswa', compact('siswa'));
    }

    /**
     * Memperbarui data siswa.
     */
    public function update(Request $request, $id_siswa)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|max:50',
            'nis'        => 'required|max:10|unique:siswas,nis,' . $id_siswa . ',id_siswa',
            'kelas'      => 'required|max:10',
            'password'   => 'nullable|min:8'
        ],[
            'nis.unique' => 'NIS sudah digunakan, gunakan NIS yang baru!'
        ]);

        $siswa = Siswa::findOrFail($id_siswa);

        if ($request->filled('password')) {
            $validated['password'] = $request->password;
        } else {
            unset($validated['password']);
        }

        $siswa->update($validated);

        return redirect()->route('siswa.show')->with('success', 'Data siswa berhasil diedit');
    }

    /**
     * Menghapus data siswa.
     */
    public function destroy($id_siswa)
    {
        Siswa::findOrFail($id_siswa)->delete();

        return redirect()->back()->with('success', 'Data siswa berhasil dihapus');
    }
}
