<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Absent;
use App\Models\Time;

class AbsenController extends Controller
{
    public function store(Request $request)
    {
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

        Absent::create([
            'user_id' => auth()->user()->id,
            'status' => $absen,
            'photo' => $fileName,
            'created_at' => $created_at,
            'keterangan' => $keterangan
        ]);

        //redirect to index
        return redirect()->route('dashboard')->with(['status' => 'Absen Berhasil COK!']);
    }
}
