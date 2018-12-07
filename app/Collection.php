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
    protected $fillable=['title','description'];
    public function brands(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function setBrand($id){
        $this->brand_id=$id;
        $this->save();
    }
    public function getBrandTitle(){
        if($this->brands == null){
            return 'Производитель временно отсутствует';
        }
        return $this->brands->title;
    }
    public function getBrandID(){
        if($this->brands != null){
            return $this->brands->id;
        }
        return null;
    }
}
