<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tamu extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'nama',
        'perusahaan',
        'keperluan',
        'tipe_identitas',
        'nomor_identitas',
        'masuk',
        'notelp',
        'keluar',
    ];

    protected $hidden = [
        'id',
        'site_id',
        'created_at',
        'updated_at'
    ];

    public function casts(){
        return [
            'masuk' => 'datetime',
            'keluar' => 'datetime'
        ];
    }

    public function site(){
        return $this->belongsTo(Site::class);
    }

    public function getImagesAttribute(){
        return Storage::allFiles('tamu/'.$this->id);
    }
}