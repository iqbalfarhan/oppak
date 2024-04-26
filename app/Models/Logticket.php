<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Logticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'user_id',
        'uraian',
        'photo',
    ];

    protected function getImageAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }
}
