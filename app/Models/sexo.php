<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sexo extends Model
{
    use HasFactory;

    protected $fillable = [
        'sex',
    ];

    public function producto(){
        return $this->belongsToMany(producto::class);
    }
}
