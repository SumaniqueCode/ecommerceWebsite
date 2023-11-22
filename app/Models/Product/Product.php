<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_name',
        'product_image',
        'product_price',
        'product_description'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
