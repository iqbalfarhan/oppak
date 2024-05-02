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

    public function genset()
    {
        return $this->belongsTo(Genset::class);
    }

    public function getLabelAttribute()
    {
        return implode(', ', [
            "tegangan " . $this->tegangan . " volt",
            "bj cell " .$this->bj_cell ,
            "bj pilot cell " . $this->bj_pilot_cell,
            "elektrolit " . $this->elektrolit,
            "kabel " . $this->kencang ? 'kencang' : 'tidak kencang'
        ]);
    }
}
