<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends BasicModel
{
    protected $fillable=['name','message','answer'];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function replied(){
        return $this->belongsTo(User::class,'replied_id');
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
    public function getAnswer(){
        if($this->answer == null){
            return 'Ожидает ответа';
        }
        return $this->answer;
    }
}
