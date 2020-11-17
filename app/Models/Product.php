<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

  protected $guarded = [];

  public function categories () {
    return $this->belongsToMany(Category::class)->withPivot('category_id');  
  }

    public function path () {
      return '/products/' . $this->id;  
    }

    public function presentPrice () {
     return 'RSD ' . number_format($this->price, 2, ',', '.');
    }

    public function mightAlsoLike () {
      return Product::where('id', '!=', $this->id)->inRandomOrder()->take(4)->get();
    }
}
