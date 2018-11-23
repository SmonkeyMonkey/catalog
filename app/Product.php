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
    public function brands(){
        return $this->belongsTo(Brand::class);
    }
    protected $fillable=['title','description','price','specifications','thickness','layer','weight','size','group','classification','substances','bacteria_fungus'];
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
}
