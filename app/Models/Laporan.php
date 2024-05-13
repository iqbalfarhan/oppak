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

    public function baterais(){
        return $this->hasMany(Baterai::class);
    }

    public function rectifiers(){
        return $this->hasMany(Rectifier::class);
    }

    public function amf(){
        return $this->hasOne(Amf::class);
    }

    public function temperatur(){
        return $this->hasOne(Temperatur::class);
    }

    public function bbm(){
        return $this->hasOne(Bbm::class);
    }

    public function getPathAttribute()
    {
        return "laporan/".$this->created_at->format("Ymd")."/".$this->id;
    }

    public function getLabelAttribute():String
    {
        $route = route('laporan.show', $this->id);

        return implode("\n", [
            "{$this->user->name} Telah membuat laporan rutin",
            "tanggal {$this->tanggal->format('d F Y')}",
            "untuk site : {$this->site->label}",
            "",
            $route
        ]);
    }
}
