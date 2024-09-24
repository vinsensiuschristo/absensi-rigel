<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    public function index()
    {
        return view('admin.login.dashboard');
    }

    public function mahasiswa()
    {
        $mahasiswas = User::where('role', 'mahasiswa')->get();
        return view('admin.login.mahasiswa', compact('mahasiswas'));
    }

    public function dosen()
    {
        $dosens = User::where('role', 'dosen')->get();
        return view('admin.login.dosen', compact('dosens'));
    }

    public function createDosen()
    {
        return view('admin.login.createDosen');
    }

    public function createMahasiswa()
    {
        return view('admin.login.createMahasiswa');
    }

    public function storeDosen(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'npm' => 'required|unique:users,npm',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'npm' => $request->npm,
            'role' => 'dosen',
            'created_at' => now(),
        ]);

        return redirect()->route('superadmin.dosen')->with('success', 'Dosen berhasil ditambahkan');
    }

    public function storeMahasiswa(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'npm' => 'required|unique:users,npm',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'npm' => $request->npm,
            'role' => 'mahasiswa',
            'created_at' => now(),
        ]);

        return redirect()->route('superadmin.mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function editDosen($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        return view('admin.login.editDosen', compact('user'));
    }

    public function editMahasiswa($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        return view('admin.login.editMahasiswa', compact('user'));
    }

    public function updateDosen(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'npm' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'npm' => $request->npm,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('superadmin.dosen')->with('success', 'User berhasil diupdate');
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'npm' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'npm' => $request->npm,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('superadmin.mahasiswa')->with('success', 'User berhasil diupdate');
    }

    public function showDosen($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        return view('admin.login.showDosen', compact('user'));
    }

    public function showMahasiswa($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        return view('admin.login.showMahasiswa', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('superadmin.dashboard')->with('success', 'User berhasil dihapus');
    }
}
