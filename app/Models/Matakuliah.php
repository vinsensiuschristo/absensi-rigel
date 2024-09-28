<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $fillable = ['nama_matakuliah'];

    //     public function absents(): MorphMany
    //     {
    //         return $this->morphMany(Absent::class, 'matakuliah');
    //     }
}
