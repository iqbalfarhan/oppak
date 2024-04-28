<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'rectifier',
        'metro',
        'transmisi',
        'gpon'
    ];
}