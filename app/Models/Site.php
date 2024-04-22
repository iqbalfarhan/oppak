<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
