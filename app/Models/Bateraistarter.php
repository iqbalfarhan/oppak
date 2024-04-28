<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bateraistarter extends Model
{
    use HasFactory;

    protected $fillable = [
        'genset_id',
        'tegangan',
        'bj_cell',
        'bj_pilot_cell',
        'elektrolit',
        'kencang',
    ];
}
