<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'witel',
        'name',
        'listrik',
    ];

    public static $witels = [
        'BALIKPAPAN',
        'SAMARINDA',
        'KALBAR',
        'KALTENG',
        'KALSEL',
        'KALTARA',
    ];

    public static $listrik = [
        'pln',
        'solar cell'
    ];

    public function getLabelAttribute(){
        return $this->witel ." - ". $this->name. " (".Str::upper($this->listrik).")";
    }

    public function laporans(){
        return $this->hasMany(Laporan::class);
    }

    public function pergantians(){
        return $this->hasMany(Pergantian::class);
    }
}
