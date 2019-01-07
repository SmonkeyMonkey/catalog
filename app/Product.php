<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Brand;
use App\Collection;

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
class Product extends Model
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
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function collection(){
        return $this->belongsTo(Collection::class,'collection_id');
    }
    protected $fillable=['title','price','specifications'];
    public function uploadImage($image){
        if ($image==null){return;}
        $this->removeImage();
        $filename=str_random(10).'.'.$image->extension();
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
    public function getBrandTitle(){
        if($this->brand != null) {
            return $this->brand->title;
        }
        return 'Производитель отсутствует';
    }
    public function getCollectionTitle(){
        if($this->collection != null){
            return $this->collection->title;
        }
        return 'Коллекция по каким-либо причинам отсутствует';
    }
    public function setBrand($id){
        $this->brand_id = $id;
        $this->save();
    }
    public function setCollection($id){
        $this->collection_id = $id;
        $this->save();
    }
    public function getBrandID(){
        return $this->brand->id;
    }
    public function getCollectionID(){
        return $this->collection->id;
    }
    public function getPrice(){
        if($this->price == null){
            return 'Договорная';
        }
        return $this->price;
    }
    public function getRelatedProduct(){
        return self::where('collection_id','=',$this->collection->id)->get();
    }
}
