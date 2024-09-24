<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absent;
use App\Models\Admin;
use App\Models\Matakuliah;
use App\Models\Time;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $absenData = Absent::join('users', 'absents.user_id', '=', 'users.id')
            ->join('matakuliah', 'absents.matakuliah_id', '=', 'matakuliah.id')
            ->select('absents.*', 'users.name', 'users.npm', 'matakuliah.nama_matakuliah')
            ->get();

        return view('admin.index', ['absents' => $absenData]);
    }

    public function jamMasuk()
    {
        $waktu = Time::all();
        return view('admin.jamMasuk', compact('waktu'));
    }

    public function jamMasukEdit($id)
    {
        $waktu = Time::find($id);
        return view('admin.jamMasukEdit', compact('waktu'));
    }

    public function jamMasukUpdate(Request $request, $id)
    {
        $request->validate([
            'waktu' => 'required',
        ]);

        // dd($request->waktu);
        $waktu = Time::find($id);
        $waktu->waktu = $request->waktu;
        $waktu->save();

        return redirect()->route('admin.jam-masuk')->with('success', 'Jam Masuk berhasil diubah');
    }

    public function userList()
    {
        $users = User::where('role', 'mahasiswa')->paginate(5);
        return view('admin.user', ['users' => $users]);
    }

    public function deleteUser($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
        } catch (\Exception $e) {
            // Handle the error here
            // For example, you can log the error or show a friendly error message to the user
            return redirect()->back()->with('error', 'Gagal Menghapus User, Sepertinya Data Absen dari user ini masih ada. Silahkan hapus data absen terlebih dahulu.');
        }


        return redirect()->route('admin.user')->with('success', 'User berhasil dihapus');
    }

    // Login Admin
    public function adminLogin()
    {
        return view('admin.login.index');
    }

    public function adminLoginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $db = Admin::where('email', $credentials['email'])->first();

        if (!$db) {
            return redirect()->back()->with('error', 'Email tidak terdaftar');
        }

        $password = $credentials['password'];

        $dbPassword = $db->password;

        if (Hash::check($password, $dbPassword)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Email atau Password salah');
    }

    public function superadminDashboard()
    {
        return view('admin.login.dashboard');
    }
}
