<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

abstract class BasicModel extends Model
{
    use Sluggable;

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }
    public function getCreatedDate()
    {
        return $date = Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->diffForHumans();
    }
    public function getUpdatedDate(){
        return  $date = Carbon::createFromFormat('Y-m-d H:i:s',$this->updated_at)->diffForHumans();
    }
    public function getRepliedDate(){ // дата ответа на вопрос
        return $date = Carbon::createFromFormat('Y-m-d H:i:s',$this->updated_at)->diffForHumans();
    }
}
