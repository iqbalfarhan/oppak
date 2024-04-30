<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Temperatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'rectifier',
        'metro',
        'transmisi',
        'gpon',
        'photo'
    ];

    public function getImageAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }
}
