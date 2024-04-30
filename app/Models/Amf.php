<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'photo',
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

    public function getImageAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }
}
