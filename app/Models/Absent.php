<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Absent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'photo',
        'created_at',
        'updated_at',
        'matakuliah_id',
        'keterangan'
    ];

    // public function matakuliah(): MorphTo
    // {
    //     return $this->morphTo();
    // }
}
