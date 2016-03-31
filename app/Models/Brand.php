<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $fillable = ['name', 'url', 'logo', 'desc', 'is_show', 'sort_order'];


    public function good()
    {
        return $this->hasMany('App\Models\Good');
    }
}
