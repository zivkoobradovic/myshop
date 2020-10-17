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
}
