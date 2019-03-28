<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Product;

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
class Brand extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

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
        if ($image == null) {
            return;
        }
        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads/brands', $filename);
        $this->image = $filename;
        $this->save();
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

    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-img.jpg';
        }
        return '/uploads/brands/' . $this->image;
    }

    public function setDraft()
    {
        $this->is_published = 0;
        $this->save();
    }

    public function setPublic()
    {
        $this->is_published = 1;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null) {
            return $this->setDraft();
        }
        return $this->setPublic();
    }

    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }
        $this->category_id = $id;
        $this->save();
    }

    public function getCategoryID()
    {
        if ($this->category != null) {
            return $this->category->id;
        }
        return null;
    }

    public function setCollections($ids)
    {
        if ($ids == null) {
            return;
        };
        $this->collections()->sync($ids);
    }

}
