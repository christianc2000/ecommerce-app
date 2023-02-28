<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'product_id'
    ];
    //relacion de 1 a muchos inversa
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    //relación de muchos a muchos
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity');;
    }
}
