<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Absent;
use App\Models\Time;

class AbsenController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        if ($request->bukti !== null) {
            $request->validate([
                'bukti' => 'required|image|mimes:jpg,png,jpeg|extensions:jpg,png|max:2048',
                'kelas' => 'required',
                'status' => 'required'
            ]);

            $bukti = $request->file('bukti');
            $buktiName = 'file_bukti_' . '.' . $userId . time() . '.' . $bukti->getClientOriginalExtension();
            $bukti->storeAs('public/image/uploads', $buktiName);

            $created_at = gmdate('Y-m-d H:i:s', strtotime('+7 hours'));
            $absen = $request->absen;
            $keterangan = $request->keterangan;
            $kelas = $request->kelas;
            $jam = $request->jam;

            Absent::create([
                'user_id' => auth()->user()->id,
                'status' => $absen,
                'photo' => $buktiName,
                'created_at' => $created_at,
                'keterangan' => $keterangan,
                'jam_ke' => $jam,
                'kelas' => $kelas
            ]);

            return redirect()->route('dashboard')->with(['status' => 'Absen Berhasil !']);
        }

        $current_time = gmdate('H:i:s', strtotime('+7 hours'));
        $jamMasuk = Time::find(1)->waktu;

        if ($current_time > $jamMasuk) {
            $keterangan = "Absensi Terlambat";
        } else {
            $keterangan = "Absensi Tepat Waktu";
        }

        $keteranganKehadiran = $request->keterangan;
        $keterangan = $keterangan . ' - ' . $keteranganKehadiran;

        $img = $request->image;
        $absen = $request->absen;
        $folderPath = "public/image/uploads/";
        $created_at = gmdate('Y-m-d H:i:s', strtotime('+7 hours'));

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        // tanpa kompres ORIGINAL
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);

        $kelas = $request->kelas;
        $jam = $request->jam;

        $request->validate([
            'kelas' => 'required',
            'jam_ke' => 'required',
            'status' => 'required'
        ]);

        Absent::create([
            'user_id' => auth()->user()->id,
            'status' => $absen,
            'photo' => $fileName,
            'created_at' => $created_at,
            'keterangan' => $keterangan,
            'jam_ke' => $jam,
            'kelas' => $kelas
        ]);

        //redirect to index
        return redirect()->route('dashboard')->with(['status' => 'Absen Berhasil COK!']);
    }
}
