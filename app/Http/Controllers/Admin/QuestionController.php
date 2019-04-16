<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestionRequest;
use App\Question;
use App\Http\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    private $questionRepository;
    public function __construct()
    {
        $this->questionRepository = app(QuestionRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $questions=$this->questionRepository->getQuestionWithPaginate(10);
        return view('admin.questions.index',compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $question = $this->questionRepository->getEdit($id);

        return view('admin.questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $question=Question::findOrFail($id);
        $question->update($request->all());
        return redirect()->route('question.index')->with('update','Ответ успешно добавлен/изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::find($id)->delete();
        return redirect()->route('question.index')->with('delete','Вопрос успешно удален');
    }
}
