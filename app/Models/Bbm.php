<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bbm extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'satuan',
        'volume',
        'photo',
    ];
}
