<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Bbm extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'satuan',
        'volume',
        'photo',
    ];

    public function getImageAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }
}