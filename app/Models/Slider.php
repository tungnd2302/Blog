<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class Slider extends Model
{
    protected $table = 'slider';
    public $timestamps = false;
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified_by';

    public function getAllItems($params = null ,$options = null){
        $result = null;
        if($options['task'] = 'admin-list-items'){
            $result = self::select('id','name','description','link','thumb','created','created_by','modified','modified_by','status')
                    //   ->where('id','>',3)
                    ->paginate($params['pagination']['totalItemPerPage']);
                    //   ->get();
        }
        return $result;
    }

    public function countItems($params = null ,$options = null){
        $result = null;
        if($options['task'] == 'admin-count-items-group-by-status'){
            $result = self::select(DB::raw('status , COUNT(id) as count'))
                    ->groupBy('status')
                    ->get()->toArray();
        }
        return $result;
    }
}
