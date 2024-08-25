<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DosenProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::join('users', 'profiles.user_id', '=', 'users.id')
            ->join('matakuliah', 'profiles.matakuliah_id', '=', 'matakuliah.id')
            ->select('profiles.*', 'users.name', 'matakuliah.nama_matakuliah')
            ->get();

        // $profiles = DB::table('matakuliah')
        //     ->select('name', 'email as user_email')
        //     ->get();

        // dd($profiles);
        return view('admin.profile.index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matakuliahs = Matakuliah::all();
        $dosens = User::where('role', 'dosen')->get();


        return view('admin.profile.create', compact('matakuliahs', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'matakuliah' => 'required',
        ]);

        Profile::create([
            'user_id' => Auth::user()->id,
            'matakuliah_id' => $validated['matakuliah'],
            'nama' => Auth::user()->name,
        ]);

        return redirect()->route('dosen.profile.index')->with('success', 'Profile berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matakuliahs = Matakuliah::all();
        $dosens = User::where('role', 'dosen')->get();
        $profiles = Profile::findOrFail($id);
        return view('admin.profile.edit', compact('matakuliahs', 'dosens', 'profiles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'dosen' => 'required',
            'matakuliah' => 'required',
        ]);

        $profile = Profile::findOrFail($id);

        $profile->update([
            'user_id' => $validated['dosen'],
            'matakuliah_id' => $validated['matakuliah'],
            'nama' => Auth::user()->name,
        ]);

        return redirect()->route('dosen.profile.index')->with('success', 'Profile berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('dosen.profile.index')->with('success', 'Profile berhasil dihapus');
    }
}
