<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\MahasiswaHasMatakuliah;
use App\Models\Matakuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaHasMatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builder untuk dapetin data mahasiswa yang mengambil matakuliah
        $matakuliahs = DB::table('mahasiswa_has_matakuliah')
            ->join('users', 'mahasiswa_has_matakuliah.mahasiswa_id', '=', 'users.id')
            ->join('matakuliah', 'mahasiswa_has_matakuliah.matakuliah_id', '=', 'matakuliah.id')
            ->select('users.name as mahasiswa', 'matakuliah.nama_matakuliah as matakuliah', 'mahasiswa_has_matakuliah.id')
            ->get();

        return view('admin.mahasiswa.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matakuliahs = Matakuliah::all();
        $mahasiswas = User::all()->where('role', 'mahasiswa');
        $kelases = Kelas::all();
        return view('admin.mahasiswa.create', compact('matakuliahs', 'mahasiswas', 'kelases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mahasiswa' => 'required',
            'matakuliah' => 'required',
            'kelas' => 'required',
        ]);

        MahasiswaHasMatakuliah::create([
            'mahasiswa_id' => $validated['mahasiswa'],
            'matakuliah_id' => $validated['matakuliah'],
            'kelas_id' => $validated['kelas'],
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan ke matakuliah');
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
        $mahasiswas = User::all()->where('role', 'mahasiswa');
        $matakuliahs = Matakuliah::all();
        $mahasiswaHasMatakuliah = MahasiswaHasMatakuliah::find($id);
        $kelases = Kelas::all();

        return view('admin.mahasiswa.edit', compact('mahasiswas', 'matakuliahs', 'mahasiswaHasMatakuliah', 'kelases'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'mahasiswa' => 'required',
            'matakuliah' => 'required',
            'kelas' => 'required',
        ]);

        $mahasiswaHasMatakuliah = MahasiswaHasMatakuliah::find($id);
        $mahasiswaHasMatakuliah->update([
            'mahasiswa_id' => $validated['mahasiswa'],
            'matakuliah_id' => $validated['matakuliah'],
            'kelas_id' => $validated['kelas'],
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswaHasMatakuliah = MahasiswaHasMatakuliah::find($id);

        $mahasiswaHasMatakuliah->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
