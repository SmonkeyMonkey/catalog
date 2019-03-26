<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    protected $fillable=['name','message','answer','replied_id'];
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
    public function setActive(){
        $this->is_active=1;
        $this->save();
    }
    public function getAnswer(){
        if($this->answer == null){
            return 'Ожидает ответа';
        }
        return $this->answer;
    }
    public static function getRepliedID(){
        return Auth::user()->getAuthIdentifier();
    }
    public function getUserName(){
        if($this->replied== null){
            return 'вопрос пока-что не получил ответ';
        }
        return $this->replied->name;
    }
    public function getRepliedDate(){
        return $date = Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->diffForHumans();
    }
}
