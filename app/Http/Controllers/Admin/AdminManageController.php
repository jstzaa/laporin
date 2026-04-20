<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminManageController extends Controller
{
    /**
     * Menampilkan daftar admin.
     */
    public function index()
    {
        $admin = Admin::select('id_admin', 'username')->orderBy('username', 'asc')->paginate(10);
        return view('admin.pages.admin', compact('admin'));
    }

    /**
     * Menambahkan admin baru dan generate password.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['username' => 'required|max:255']);

        $rawPassword = $request->username . '@laporin.sch.id';
        $validated['password'] = $rawPassword;

        Admin::create($validated);

        return redirect()->back()->with('success','Admin berhasil ditambahkan!');
    }

    /**
     * Memperbarui data admin.
     */
    public function update(Request $request, $id_admin)
    {
        $validated = $request->validate(['username' => 'required|string|max:255']);

        $admin = Admin::findOrFail($id_admin);

        if ($request->filled('password')) {
            $validated['password'] = $request->password;
        } else {
            unset($validated['password']);
        }

        $admin->update($validated);

        return redirect()->back()->with('success', 'Data admin berhasil diedit');
    }

    /**
     * Menghapus data admin.
     */
    public function destroy($id_admin)
    {
        Admin::findOrFail($id_admin)->delete();

        return redirect()->back()->with('success', 'Data admin berhasil dihapus');
    }
}
