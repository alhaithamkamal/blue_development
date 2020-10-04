<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = ['id'];

    // relations

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }


    public static function storePostImage($request)
    {
        if ($request->file('image')) {
            $path = $request->file('image')->store('public/images');
        }else
            $path = null;
        return $path;
    }

    public function getImageAttribute()
    {
        if (! $this->attributes['image']) {
            return 'https://via.placeholder.com/150';
        }

        return $this->attributes['image'];
    }

}
