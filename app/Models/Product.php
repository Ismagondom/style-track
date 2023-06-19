<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected function category (){
        return $this->belongsTo(Category::class);
    }
    protected function provider (){
        return $this->belongsTo(Provider::class);
    }
    protected function color (){
        return $this->belongsTo(Color::class);
    }
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}
