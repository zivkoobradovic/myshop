<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

  protected $guarded = [];

  public function categories () {
    return $this->belongsToMany(Category::class);  
  }

    public function path () {
      return '/products/' . $this->id;  
    }

    public function presentPrice () {
     return 'RSD ' . number_format($this->price, 2, ',', '.');
    }
}
