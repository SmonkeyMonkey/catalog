<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Brand;

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
        return 'Категория временно отсутствует';
    }
    public function setBrand($id){
        $this->brand_id = $id;
        $this->save();
    }
    public function setDraft(){
        $this->is_published=0;
        $this->save();
    }
    public function setPublic(){
        $this->is_published=1;
        $this->save();
    }
    public function toggleStatus($value){
        if($value==null){
            return $this->setDraft();
        }
        return $this->setPublic();
    }
    public function getBrandID(){
        return $this->brand->id;
    }
    public function getPrice(){
        if($this->price == null){
            return 'Договорная';
        }
        return $this->price;
    }
}
