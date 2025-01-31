<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionUserStore;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(QuestionUserStore $request){
        $question = Question::addQuestion($request->all(),$request->get('product_id'));
        return redirect()->back()->with('message','Спасибо за Ваш вопрос!Вскоре он появится на данной странице');
    }
}
