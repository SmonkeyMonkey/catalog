<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
    protected $fillable=['title','price','specifications','slug','meta_title','meta_description','meta_keywords','created_by','updated_by'];
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
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function updated_user(){
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
    public function getBrandID(){
        return $this->brand_id;
    }
    public function setCollection($id){
        $this->collection_id = $id;
        $this->save();
    }
    public function getCollectionID(){
        return $this->collection_id;
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
    public function getQuestion(){
        return $this->question()->where('is_active',1)->get();
    }

    public static function getUserID(){
        return Auth::user()->getAuthIdentifier();
    }
    public function getUserName(){
        return $this->creator->name;
    }
    public function getUpdatedUserName(){
        if($this->updated_user == null){
            return 'Продукт еще не был обновлен';
        }
            return $this->updated_user->name;
    }
    public function getCreatedDate()
    {
        return $date = Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->diffForHumans();
    }
    public function getUpdatedDate(){
        return  $date = Carbon::createFromFormat('Y-m-d H:i:s',$this->updated_at)->diffForHumans();
    }
}
