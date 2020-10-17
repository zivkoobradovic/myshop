<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActiveStore extends Model
{
    use HasFactory;

    public static $activeStore;

    public static function getStore () {
        $activeStoreId = DB::table('active_store')->get();
        $activeStoreId = $activeStoreId[0]->store;
        self::$activeStore = Store::find($activeStoreId);
        return self::$activeStore;
    }
}
