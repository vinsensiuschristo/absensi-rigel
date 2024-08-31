<?php

namespace App\Http\Controllers;

use App\Models\InputKelas;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Query buat munculin id kelas yang diajar oleh dosen yang login
        // $kelases = DB::table('input_kelas')->select('id', 'kelas_id')->where('dosen_id', auth()->user()->id)->distinct()->get()->first();
        // $kelases = DB::table('input_kelas')->distinct('dosen_id')->get();
        $kelases = InputKelas::where('dosen_id', auth()->user()->id)->distinct()->get();

        // dd($kelases);
        return view('admin.kelas.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelas.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('admin.kelas.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
