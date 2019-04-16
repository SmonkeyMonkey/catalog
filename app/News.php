<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class News extends BasicModel
{
    protected $fillable = ['title', 'description', 'text'];


    public function uploadImage($image)
    {
        $this->removeImage();
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads/news', $filename);
        $this->image = $filename;
        $this->save();
    }


    public function getImage()
    {
        if ($this->image == null) {
            return '/uploads/news/no-image.png';
        }
        return '/uploads/news/' . $this->image;
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('uploads/news/' . $this->image);
        }
    }
}
