<?php

namespace App\Models;

use App\Traits\ParameterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Rectifier extends Model
{
    use HasFactory;
    use ParameterTrait;

    protected $fillable = [
        'laporan_id',
        'keterangan',
        'catuan_input',
        'tegangan_output',
        'arus_output',
        'photo',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

    public function getImageAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimage.png');
    }

    public function getLabelAttribute(){
        return implode(", ", [
            "catuan input ".$this->catuan_input. " kwh",
            "tegangan output ".$this->tegangan_output. " volt",
            "arus output ".$this->arus_output. " ampere",
        ]);
    }

    public function getIsValidAttribute()
    {
        return [
            'catuan_input' => $this->getValidStatus('220', $this->catuan_input),
            'tegangan_output' => $this->getValidStatus('tegangan', $this->tegangan_output),
            'arus_output' => $this->getValidStatus('arus', $this->arus_output),
        ];
    }
}
