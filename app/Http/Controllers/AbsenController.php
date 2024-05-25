<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Absent;

class AbsenController extends Controller
{
    public function store(Request $request)
    {
        $img = $request->image;
        $absen = $request->absen;
        $folderPath = "uploads/";
        $created_at = date('Y-m-d H:i:s');

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        // function compressImage($image, $quality)
        // {
        //     $image = imagecreatefromstring($image);
        //     ob_start();
        //     imagejpeg($image, null, $quality);
        //     return ob_get_clean();
        // }
        // $compressed_image = compressImage($image_base64, 75);

        // // dengan kompres
        // $file = $folderPath . $fileName;
        // Storage::put($file, $compressed_image);

        // tanpa kompres
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);

        // dd('Image uploaded successfully: ' . $fileName);
        // dd($absen);

        Absent::create([
            'user_id' => auth()->user()->id,
            'status' => $absen,
            'photo' => $fileName,
            'created_at' => $created_at,
        ]);

        //redirect to index
        return redirect()->route('dashboard')->with(['status' => 'Absen Berhasil']);
    }
}
