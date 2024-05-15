<?php

namespace App\Models;

use App\Traits\ParameterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Amf extends Model
{
    use HasFactory;
    use ParameterTrait;

    protected $fillable = [
        'laporan_id',
        'ruangan_bersih',
        'engine_bersih',
        'tegangan',
        'arus',
        'kwh',
        'jam_jalan_genset',
        'photo',
    ];

    protected function casts(){
        return [
            'tegangan' => 'array',
            'arus' => 'array',
        ];
    }

    public function laporan(){
        return $this->belongsTo(Laporan::class);
    }

    public function getImageAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }

    public function getLabelAttribute(){

        $tegangan = [];
        if ($this->tegangan) {
                foreach ($this->tegangan as $key => $value) {
                $tegangan[] = $key . ":" . $value;
            }
        }
        return implode(", ", [
            $this->ruangan_bersih ? "Ruangan bersih" : "Ruangan tidak bersih",
            $this->engine_bersih ? "Engine bersih" : "Engine tidak bersih",
            "tegangan :".implode(", ", $tegangan),
            "arus RST :".implode(", ", $this->arus ?? []),
            "KWH : ".$this->kwh,
            "Jam jalan genset : ".$this->jam_jalan_genset,
        ]);
    }

    public function getIsValidAttribute()
    {
        return [
            'ruangan_bersih' => $this->getValidStatus('kebersihan', $this->ruangan_bersih),
            'engine_bersih'  => $this->getValidStatus('kebersihan', $this->engine_bersih),
            'tegangan'  => [
                "R-S" => $this->getValidStatus('380', $this->tegangan["R-S"] ?? ""),
                "S-T" => $this->getValidStatus('380', $this->tegangan["S-T"] ?? ""),
                "T-R" => $this->getValidStatus('380', $this->tegangan["T-R"] ?? ""),
                "R-N" => $this->getValidStatus('220', $this->tegangan["R-N"] ?? ""),
                "S-N" => $this->getValidStatus('220', $this->tegangan["S-N"] ?? ""),
                "T-N" => $this->getValidStatus('220', $this->tegangan["T-N"] ?? ""),
            ],
            'arus'  => [
                "R" => $this->getValidStatus('arus', $this->arus["R"] ?? ""),
                "S" => $this->getValidStatus('arus', $this->arus["S"] ?? ""),
                "T" => $this->getValidStatus('arus', $this->arus["T"] ?? ""),
            ],
        ];
    }
}
