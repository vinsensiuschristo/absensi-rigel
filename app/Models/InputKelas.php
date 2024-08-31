<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InputKelas extends Model
{
    use HasFactory;

    protected $table = 'input_kelas';
    protected $fillable = [
        'kelas_id',
        'dosen_id',
        'matakuliah_id',
        'mahasiswa_id',
    ];

    public function dosen(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function matakuliah(): HasOne
    {
        return $this->hasOne(Matakuliah::class);
    }

    public function mahasiswa(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }
}
