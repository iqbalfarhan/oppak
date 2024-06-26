<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Insidensial extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'user_id',
        'kategori',
        'uraian',
        'photo',
    ];

    public static $kategories = [
        'GENSET',
        'RECTIFIER',
        'ATS',
        'AC',
        'GROUNDING',
        'LAMPU',
        'LAIN-LAIN'
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }

    public function getLabelAttribute():String
    {
        $route = route('insidensial.index');
        return implode("\n", [
            "{$this->user->name} Melaporkan laporan insidensial",
            "kategori laporan {$this->kategori}",
            "dengan uraian {$this->uraian}",
            "pada tangggal {$this->created_at->format('d F Y')}",
            "",
            $route
        ]);
    }
}
