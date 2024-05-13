<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'user_id',
        'kode',
        'progress',
        'perangkat',
        'uraian',
        'done',
        'pengajuan',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function logtickets()
    {
        return $this->hasMany(Logticket::class);
    }

    public function getImageAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }

    public function getLabelAttribute()
    {
        $route = route('ticket.show', $this->id);
        return implode("\n", [
            "Kode ticket ".$this->kode,
            "Pembuat ticket ".$this->user->name,
            "Perangkat ".$this->perangkat,
            "Urraian ".$this->uraian,
            "Site ".$this->site->label,
            "",
            $route
        ]);
    }
}
