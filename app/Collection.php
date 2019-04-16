<?php

namespace App;


/**
 * App\Collection
 *
 * @property-read \App\Brand $brands
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Collection findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Collection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Collection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Collection query()
 * @mixin \Eloquent
 */
class Collection extends BasicModel
{

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


}
