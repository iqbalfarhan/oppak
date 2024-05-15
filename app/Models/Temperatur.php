<?php

namespace App\Models;

use App\Traits\ParameterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Temperatur extends Model
{
    use HasFactory;
    use ParameterTrait;

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

    public function getIsValidAttribute()
    {
        return [
            'rectifier' => $this->getValidStatus('suhu', $this->rectifier),
            'metro' => $this->getValidStatus('suhu', $this->metro),
            'transmisi' => $this->getValidStatus('suhu', $this->transmisi),
            'gpon' => $this->getValidStatus('suhu', $this->gpon),
        ];
    }
}
