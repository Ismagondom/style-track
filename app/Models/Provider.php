<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email','website','phone'];    //es como un metodo constructor, me permite crear de una en la funcion de store.

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
