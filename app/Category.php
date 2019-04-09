<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * App\Category
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Brand[] $brands
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use Sluggable;
    protected $fillable = ['title', 'description', 'created_by', 'updated_by'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function updated_user()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }
        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads/categories', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('uploads/categories/' . $this->image);
        }
    }

    public function remove()
    {
        $this->removeImage();
        $this->brands()->delete();
        $this->delete();
    }
    public function getImage(){
        if($this->image == null){
            return '/img/no-img.jpg';
        }
        return '/uploads/categories/'.$this->image;
    }
}
