<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
  use HasFactory;

  protected $guarded = [];

  public function categories()
  {
    return $this->belongsToMany(Category::class)->withPivot('category_id');
  }

  public function path()
  {
    return '/products/' . $this->id;
  }

  public function presentPrice()
  {
    return 'RSD ' . number_format($this->price, 2, ',', '.');
  }

  public function mightAlsoLike()
  {
    return Product::where('id', '!=', $this->id)->inRandomOrder()->take(4)->get();
  }

  

  public function getBuyableIdentifier($options = null)
  {
    return $this->id;
  }
  public function getBuyableDescription($options = null)
  {
    return $this->name;
  }
  public function getBuyablePrice($options = null)
  {
    return $this->price;
  }
  public function getBuyableWeight($options = null)
  {
    return $this->weight;
  }
}
