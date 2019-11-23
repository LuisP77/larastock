<?php
namespace App\Traits;
use Validator;


trait ValidationTrait
{
    public $error;

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
}
