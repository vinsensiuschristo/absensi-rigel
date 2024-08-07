<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'photo',
        'created_at',
        'updated_at',
        'keterangan'
    ];
}
