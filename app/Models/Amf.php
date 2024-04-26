<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amf extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'ruangan_bersih',
        'engine_bersih',
        'tegangan',
        'arus',
        'kwh',
        'jam_jalan_genset',
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
}
