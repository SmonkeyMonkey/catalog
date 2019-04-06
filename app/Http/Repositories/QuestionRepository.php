<?php

namespace App\Http\Repositories;

use App\Question as Model;
use Illuminate\Database\Eloquent\Collection;

class QuestionRepository extends CoreRepository
{
    protected function getModelClass()
    {
        // TODO: Implement getModelClass() method.
        return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getQuestionsForIndexPage()
    {
        $colums = ['id', 'name', 'message', 'answer', 'is_active', 'replied_id'];
        $result = $this->startConditions()
            ->select($colums)
            ->where('is_active',1)
            ->with('replied:id,name')
            ->latest()
            ->take(3)
            ->get();

        return $result;
    }
}
