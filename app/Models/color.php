<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    use HasFactory;

    protected $fillable = [
        'colors',
    ];

    public function producto(){
        return $this->belongsToMany(producto::class);
    }
}
