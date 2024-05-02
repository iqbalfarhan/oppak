<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Baterai extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'photo',
        'tegangan',
        'elektrolit',
        'bj_cell',
        'bj_pilot_cell_bank',
    ];

    public function casts(){
        return [
            'tegangan' => 'array',
            'bj_pilot_cell_bank' => 'array',
        ];
    }

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

    public function getImageAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }

    public function getLabelAttribute(){
        return implode(", ", [
            'elektrolit '. $this->elektrolit,
            'tegangan total bank '. implode(', ', $this->tegangan),
            'Bj Cell '. $this->bj_cell,
            'Bj pilot cell bank '. implode(', ', $this->bj_pilot_cell_bank),
        ]);
    }
}
