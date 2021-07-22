<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock',
        'camiseta_id',
        'color_id',
        'talla_id',
        'sexo_id',
        'imagen_id',
    ];

    public function talla(){
        return $this->belongsTo(talla::class);
    }

    public function sexo(){
        return $this->belongsTo(sexo::class);
    }

    public function color(){
        return $this->belongsTo(color::class);
    }

    // public function orders(){
    //     return $this->belongsToMany(Order::class);
    // }

    public function camiseta(){
        return $this->belongsTo(camiseta::class);
    }

    public function imagen(){
        return $this->belongsTo(Imagen::class);
    }
}
