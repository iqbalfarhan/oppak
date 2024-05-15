<?php

namespace App\Models;

use App\Traits\ParameterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Baterai extends Model
{
    use HasFactory;
    use ParameterTrait;

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

    public function getIsValidAttribute()
    {
        $tegangan = [];
        foreach($this->tegangan as $key => $item){
            $tegangan[$key] = $this->getValidStatus('tegangan_bank', $item);
        }

        $bj_pilot_cell_bank = [];
        foreach($this->bj_pilot_cell_bank as $key => $item){
            $bj_pilot_cell_bank[$key] = $this->getValidStatus('bjpilot', $item);
        }

        return [
            'tegangan' => $tegangan,
            'elektrolit' => $this->getValidStatus('elektrolit', $this->elektrolit),
            'bj_cell' => $this->getValidStatus('bjcell', $this->bj_cell),
            'bj_pilot_cell_bank' => $bj_pilot_cell_bank,
        ];
    }
}
