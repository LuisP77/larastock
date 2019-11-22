<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = ['name', 'description', 'status'];

    protected $hidden = ['created_at', 'updated_at'];

    public static function getAllMarkets()
    {
        return self::all();
    }
    public static function getActiveMarkets()
    {
        return self::where('status',1)->get();
    }
}
