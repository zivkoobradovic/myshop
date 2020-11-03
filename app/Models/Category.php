<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

  protected $guarded = [];

    public function products () {
      return $this->belongsToMany(Product::class)->withPivot('product_id');  
    }

    public function path () {
      return '/categories/' . $this->id;  
    }
}
