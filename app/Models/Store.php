<?php

namespace App\Models;

use App\Models\Tax;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    public function tax () {
        return $this->hasOne('App\Models\Tax', 'id', 'tax_id');
    }

    public function currency () {
        return $this->hasOne('App\models\Currency', 'id', 'currency_id');
    }

    public function products () {
      return $this->hasMany('App\Models\Product');  
    }
}
