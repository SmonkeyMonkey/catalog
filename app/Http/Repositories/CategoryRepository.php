<?php

namespace App\Http\Repositories;

use App\Category as Model;

class CategoryRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($paginate = null)
    {
        $colums = ['id', 'title', 'description', 'image'];
        $result = $this->startConditions()
            ->select($colums)
            ->paginate($paginate);
        return $result;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->with(['creator:id,name', 'updated_user:id,name'])->find($id);
    }

    public function getCategoriesForIndexPage()
    {
        $colums = ['id', 'title', 'slug'];
        $result = $this->startConditions()
            ->select($colums)
            ->get();

        return $result;
    }

    public function getCategoryShowPage($slug)
    {
        $colums = ['id', 'title', 'slug', 'description', 'image'];
        $result = $this->startConditions()
            ->select($colums)
            ->where('slug', $slug)
            ->with(['brands:id,category_id,title,slug,image,description'])
            ->first();
        return $result;
    }

}
