<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    public $timestamps = false;
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified_by';

    public function getAllItems($param,$options){
        $result = null;
        if($options['task'] = 'admin-list-items'){
            $result = self::all();
        }
        return $result;
    }
}
