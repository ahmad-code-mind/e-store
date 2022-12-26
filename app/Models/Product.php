<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id','id');
    }

    public function wishlist() {
        return $this->hasOne(Wishlist::class, 'prod_id', 'id');
    }

    public function cart() {
        return $this->hasOne(Cart::class, 'prod_id', 'id');
    }
}