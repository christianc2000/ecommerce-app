<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'quantity',
        'status',
        'subcategory_id',
        'brand_id'
    ];

    //accesores
    public function getStockAttribute()
    {
        if ($this->subcategory->size) {
            return ColorSize::whereHas('size.product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
            
        } elseif ($this->subcategory->color) {
            return ColorProduct::whereHas('product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } else {
            return $this->quantity;
        }
    }
    //relacion de 1 a muchos
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
    //relacion de 1 a muchos inversa
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    //relacion muchos a muchos
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }

    //relación de 1 a mucho polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    //URL AMIGABLES
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
