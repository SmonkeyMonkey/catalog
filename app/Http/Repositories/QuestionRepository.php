<?php

namespace App\Http\Repositories;

use App\Question as Model;
use Illuminate\Database\Eloquent\Collection;

class QuestionRepository extends CoreRepository{
    protected function getModelClass()
    {
        // TODO: Implement getModelClass() method.
        return Model::class;
    }
    public function getEdit($id){
        return $this->startConditions()->find($id);
    }
}