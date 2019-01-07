<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['name','message','answer'];
    public function product(){
        return $this->hasOne(Product::class);
    }
    public static function addQuestion($fields,$id){
        $question=new static();
        $question->fill($fields);
        $question->setProduct($id);
        $question->save();
        return $question;
    }
    public function setProduct($id){
        if($id == null ){
            return;
        }
        $this->product_id=$id;
        $this->save();
    }
    public function hasAnswer(){
        if($this->answer != null){
            return true;
        }
        return false;
    }
    public function getAnswer(){
        if($this->answer == null){
            return 'Ожидает ответа';
        }
        return $this->answer;
    }
}
