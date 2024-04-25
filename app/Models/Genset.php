<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Genset extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'keterangan',
        'ruangan_bersih',
        'engine_bersih',
        'suhu_ruangan',
        'bbm_utama',
        'bbm_harian',
    ];

    public function laporan(){
        return $this->belongsTo(Laporan::class);
    }

    public function getLabelAttribute(){
        return implode(', ', [
            $this->keterangan,
            $this->ruangan_bersih ? "Ruangan bersih" : "Ruangan tidak bersih",
            $this->engine_bersih ? "Engine bersih" : "Engine tidak bersih",
            "Suhu ruangan {$this->suhu_ruangan} C",
            "BBM Utama {$this->bbm_utama} L",
            "BBM Harian {$this->bbm_harian} L",
        ]);
    }

    public function getGambarAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }
}
