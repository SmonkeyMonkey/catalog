<?php

namespace App\Observers;

use App\Question;
use Carbon\Carbon;

class QuestionObserver
{

    /**
     * Handle the question "created" event.
     *
     * @param  \App\Question  $question
     * @return void
     */
    public function created(Question $question)
    {
        //
    }

    public function updating(Question $question){
        $question->replied_id = auth()->id();
        $question->updated_at = Carbon::now();
        $question->is_active = 1;
    }
    /**
     * Handle the question "updated" event.
     *
     * @param  \App\Question  $question
     * @return void
     */
    public function updated(Question $question)
    {

    }

    /**
     * Handle the question "deleted" event.
     *
     * @param  \App\Question  $question
     * @return void
     */
    public function deleted(Question $question)
    {
        //
    }

    /**
     * Handle the question "restored" event.
     *
     * @param  \App\Question  $question
     * @return void
     */
    public function restored(Question $question)
    {
        //
    }

    /**
     * Handle the question "force deleted" event.
     *
     * @param  \App\Question  $question
     * @return void
     */
    public function forceDeleted(Question $question)
    {
        //
    }
}
