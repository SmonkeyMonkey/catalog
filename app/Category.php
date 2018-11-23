<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
    public function uploadImage($image){
        if ($image==null){return;}
        $this->removeImage();
        $filename=str_random(10).'.'.$image->extension();
        $image->storeAs('uploads/categories',$filename);
        $this->image=$filename;
        $this->save();
    }
    public function removeImage(){
        if($this->image != null)
        {
            Storage::delete('uploads/categories/' . $this->image);
        }
    }
    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
    public function getImage(){
        if($this->image == null){
            return false;
        }
        return '/uploads/categories/'.$this->image;
    }

}
