<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

  protected $guarded = [];

    public function stores () {
      return $this->belongsTo('App\Models\Store');  
    }

    public function path () {
      return '/products/' . $this->id;  
    }

    public function presentPrice () {
     return 'RSD ' . number_format($this->price, 2, ',', '.');
    }
}
