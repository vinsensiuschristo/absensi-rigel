<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return view('admin.matakuliah.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_matakuliah' => 'required',
            'kelas' => 'required',
        ]);

        Matakuliah::create([
            'nama_matakuliah' => $validatedData['nama_matakuliah'],
            'kelas' => $validatedData['kelas'],
        ]);

        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil ditambahkan');
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
        $matakuliah = Matakuliah::find($id);
        return view('admin.matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_matakuliah' => 'required',
            'kelas' => 'required',
        ]);

        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->update([
            'nama_matakuliah' => $validatedData['nama_matakuliah'],
            'kelas' => $validatedData['kelas'],
        ]);

        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matakuliah = Matakuliah::find($id);
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil dihapus');
    }
}
