<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Product;

class Brand extends Model
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
    public function product(){
        return $this->hasMany(Product::class);
    }
    protected $fillable=['title','description','about'];
    public function uploadImage($image){
        if ($image==null){return;}
        $this->removeImage();
        $filename=str_random(10).'.'.$image->extension();
        $image->storeAs('uploads/brands',$filename);
        $this->image=$filename;
        $this->save();
    }
    public function removeImage(){
        if($this->image != null)
        {
            Storage::delete('uploads/brands' . $this->image);
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
    return '/uploads/brands/'.$this->image;
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
}
