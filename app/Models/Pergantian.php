<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Pergantian extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'user_id',
        'perangkat_id',
        'tanggal',
        'keterangan',
        'photo',
    ];

    public function casts()
    {
        return [
            'tanggal' => 'date'
        ];
    }

    protected $appends = [
            'next_action'
        ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function perangkat()
    {
        return $this->belongsTo(Perangkat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }

    public function getNextActionAttribute()
    {
        $month = $this->site->listrik == "pln" ? $this->perangkat->durasi_pln : $this->perangkat->durasi_solar_cell;
        return $this->tanggal->addMonths((int)$month);
    }

    public function getLabelAttribute(): String
    {
        $route = route('pergantian.index');

        return implode("\n", [
            "{$this->user->name} telah melakukan pergantian rutin",
            'untuk perangkat '. $this->perangkat->name,
            'pada tanggal '. $this->tanggal->format('d F Y'),
            'dengan keterangan : '. $this->keterangan,
            'untuk site/STO : '. $this->site->label,
            'pergantian selanjutnya pada ' . $this->getNextActionAttribute()->format('d F Y'),
            "",
            $route
        ]);
    }

}
