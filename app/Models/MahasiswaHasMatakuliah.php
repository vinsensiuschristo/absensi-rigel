<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaHasMatakuliah extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_has_matakuliah';
    protected $fillable = ['mahasiswa_id', 'matakuliah_id', 'kelas_id'];
}
