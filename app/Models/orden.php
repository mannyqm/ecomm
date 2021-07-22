<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orden extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    // public function producto(){
    //     return $this->belongsToMany(Producto::class)->withPivot('quantity');
    // }
}
