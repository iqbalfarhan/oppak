<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rectifier extends Model
{
    use HasFactory;

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
}
