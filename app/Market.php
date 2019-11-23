<?php

namespace App;
use App\Traits\ValidationTrait;
use Illuminate\Database\Eloquent\Model;

//use Validator;

class Market extends Model
{
    use ValidationTrait;
    protected $fillable = ['name', 'description', 'status'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $rules = [
        'name' => 'required|max:255|min:5',
        'description' => 'required|max:255',
        'active' => 'bool',
    ];

/*
    public function validate($data)
    {
        $v = Validator::make($data, $this->rules);

        if ($v->fails()) {
            $this->errors = $v->errors();
            return false;
        } else {
            return true;
        }
    }
*/
    public static function getAllMarkets()
    {
        return self::all();
    }

    public static function getActiveMarkets()
    {
        return self::where('status',1)->get();
    }
}
