<?php

namespace App;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

/**
 * App\Product
 *
 * @property-read \App\Brand $brand
 * @property-read \App\Collection $collection
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @mixin \Eloquent
 */
class Product extends BasicModel
{
    protected $fillable=['title','price','specifications','meta_title','meta_description','meta_keywords','created_by','updated_by'];
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function creator(){ // пользователь создавший продукт
        return $this->belongsTo(User::class,'created_by');
    }
    public function updated_user(){ // пользователь обновивший продукт
        return $this->belongsTo(User::class,'updated_by');
    }
    public function collection(){
        return $this->belongsTo(Collection::class,'collection_id');
    }
    public function question(){
        return $this->hasMany(Question::class);
    }
    public function uploadImage($image){
        if ($image==null){return;}
        $this->removeImage();
        $filename=Str::random(10).'.'.$image->extension();
        $image->storeAs('uploads/products',$filename);
        $this->image=$filename;
        $this->save();
    }
    public function removeImage(){
        if($this->image != null)
        {
            Storage::delete('uploads/products/' . $this->image);
        }
    }
    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
    public function getImage(){
        if($this->image == null){
            return '/img/no-img.jpg';
        }
        return '/uploads/products/'.$this->image;
    }

    public function setBrand($id){
        $this->brand_id = $id;
        $this->save();
    }
    public function setCollection($id){
        $this->collection_id = $id;
        $this->save();
    }

}
