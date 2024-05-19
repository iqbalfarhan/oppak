<?php

namespace App\Models;

use App\Traits\ParameterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Genset extends Model
{
    use HasFactory;
    use ParameterTrait;

    protected $fillable = [
        'laporan_id',
        'keterangan',
        'ruangan_bersih',
        'engine_bersih',
        'suhu_ruangan',
        'bbm_utama',
        'bbm_harian',
        'photo',
    ];

    public function laporan(){
        return $this->belongsTo(Laporan::class);
    }

    public function bateraistarters(){
        return $this->hasMany(Bateraistarter::class);
    }

    public function getLabelAttribute(){
        return implode(', ', [
            $this->keterangan,
            $this->ruangan_bersih ? "Ruangan bersih" : "Ruangan tidak bersih",
            $this->engine_bersih ? "Engine bersih" : "Engine tidak bersih",
            "Suhu ruangan {$this->suhu_ruangan} C",
            "BBM Utama {$this->bbm_utama} liter",
            "BBM Harian {$this->bbm_harian} liter.",
        ]);
    }

    public function getGambarAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }

    public function getIsValidAttribute()
    {
        return [
            'ruangan_bersih' => $this->getValidStatus('kebersihan', $this->ruangan_bersih ? "bersih" : "tidak bersih"),
            'engine_bersih'  => $this->getValidStatus('kebersihan', $this->engine_bersih ? "bersih" : "tidak bersih"),
            'suhu_ruangan'   => $this->getValidStatus('suhu', $this->suhu_ruangan),
            'bbm_utama'      => $this->getValidStatus('tangki_bbm', $this->bbm_utama),
            'bbm_harian'     => $this->getValidStatus('tangki_bbm', $this->bbm_harian),
        ];
    }
}
