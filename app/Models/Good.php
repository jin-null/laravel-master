<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//

class Good extends Model
{
    //
    use SoftDeletes;

//    public $table = 'goods';
//    public $primaryKey = 'id';

    //设置日期时间格式
//    public $dateFormat = 'U';
    protected $fillable = ['name', 'brand_id', 'category_id','thumb','inventory',
        'price','desc', 'onsale','hot','new','recommend', 'sort_order','delete_at'];

    protected $dates = ['delete_at'];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }


    public  function  category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
