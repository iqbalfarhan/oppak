<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'durasi_pln',
        'durasi_solar_cell',
    ];

    public function pergantians()
    {
        return $this->hasMany(Pergantian::class);
    }
}
