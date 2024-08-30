<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas', 'dosen_id', 'matakuliah_id', 'mahasiswa_id'];

    use HasFactory;

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
}
