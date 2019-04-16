<?php

namespace App;

//use App\BasicModel;
use Illuminate\Support\Facades\Storage;
use App\Product;
use Illuminate\Support\Str;

/**
 * App\Brand
 *
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Collection[] $collections
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand query()
 * @mixin \Eloquent
 */
class Brand extends BasicModel
{

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected $fillable = ['title', 'description', 'about'];

    public function uploadImage($image)
    {
        $this->removeImage();
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads/brands', $filename);
        $this->image = $filename;
        $this->save();
    }
    public function getImage(){
        if($this->image != null){
            return  'uploads/brands'.$this->image;
        }
        return 'img/no-img.jpg';
    }
    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('uploads/brands' . $this->image);
        }
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function setStatus($value)
    {
        if($value != null){
            $this->is_published = 1;
            $this->save();
        }
        $this->is_published = 0;
        $this->save();
    }
    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }
        $this->category_id = $id;
        $this->save();
    }


    public function setCollections($ids)
    {
        if ($ids == null) {
            return;
        };
        $this->collections()->sync($ids);
    }

}
