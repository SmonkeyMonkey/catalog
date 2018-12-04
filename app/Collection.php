<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function brands(){
        return $this->belongsTo(Brand::class);
    }
    public function setBrand($id){
        $this->brand_id=$id;
        $this->save();
    }
}
