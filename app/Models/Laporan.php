<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'user_id',
        'tanggal',
        'done',
    ];

    public function casts(){
        return [
            'tanggal' => 'date'
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function site(){
        return $this->belongsTo(Site::class);
    }

    public function gensets(){
        return $this->hasMany(Genset::class);
    }
}
