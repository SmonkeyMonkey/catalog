<?php
namespace App\Http\Repositories;

use App\News as Model;

class NewsRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }
    public function getNewsForIndexPage(){
        $colums = ['id', 'title', 'slug','description','image'];
        $result = $this->startConditions()
            ->select($colums)
            ->latest()
            ->take(3)
            ->get();

        return $result;
    }
}
