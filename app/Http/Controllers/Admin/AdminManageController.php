<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::select('id_admin', 'username')->orderBy('username', 'asc')->paginate(10);
        return view('admin.pages.admin', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['username' => 'required|max:255']);

        $rawPassword = $request->username . '@admin.com';
        $validated['password'] = $rawPassword;

        Admin::create($validated);

        return redirect()->back()->with('success','Admin berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     */
    public function destroy($id_admin)
    {
        Admin::findOrFail($id_admin)->delete();

        return redirect()->back()->with('success', 'Data admin berhasil dihapus');
    }
}
