<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'name'      => 'required|min:2',
            'message'   => 'required|min:5|max:500',
        ]);
        $question = Question::addQuestion($request->all(),$request->get('product_id'));
        return redirect()->back()->with('message','Спасибо за Ваш вопрос!Вскоре он появится на данной странице');
    }
}
