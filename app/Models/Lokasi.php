<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'witel',
        'name',
        'type',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function getLabelAttribute(){
        return implode(" ", [
            $this->name,
            $this->witel
        ]);
    }
}
