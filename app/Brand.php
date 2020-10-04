<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $guarded = ['id'];

    // relations

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
