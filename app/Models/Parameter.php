<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'satuan',
        'label',
        'type',
        'min',
        'max',
        'trueif',
        'options',
    ];

    public function casts(){
        return [
            'options' => 'array',
        ];
    }
}
