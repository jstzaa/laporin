<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $validated = $request->validate([
            'username' => 'required|max:255|unique:admins,username'
        ],[
            'username.unique' => 'Admin dengan username ini sudah terdaftar, masukkan username baru!'
        ]);

        $rawPassword = $request->username . '@laporin.sch.id';
        $validated['password'] = $rawPassword;

        Admin::create($validated);

        return redirect()->back()->with('success','Admin berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit.
     */
    public function edit($id_admin)
    {
        $admin = Admin::select('id_admin', 'username')->where('id_admin', $id_admin)->firstOrFail();
        return view('admin.pages.edit_admin', compact('admin'));
    }

    /**
     * Memperbarui data admin.
     */
    public function update(Request $request, $id_admin)
    {
        $validated = $request->validate([
            'username' => 'required|max:255|unique:admins,username,' . $id_admin . ',id_admin',
            'password' => 'nullable|min:8'
        ],[
            'username.unique' => 'Admin dengan username ini sudah terdaftar, masukkan username baru!'
        ]);

        $admin = Admin::findOrFail($id_admin);

        if ($request->filled('password')) {
            $validated['password'] = $request->password;
        } else {
            unset($validated['password']);
        }

        $admin->update($validated);

        return redirect()->route('show.admin')->with('success', 'Data admin berhasil diedit');
    }

    /**
     * Menghapus data admin.
     */
    public function destroy($id_admin)
    {
        if (Auth::guard('admin')->user()->id_admin == $id_admin) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun sendiri!');
        }
        
        Admin::findOrFail($id_admin)->delete();

        return redirect()->back()->with('success', 'Data admin berhasil dihapus');
    }
}
