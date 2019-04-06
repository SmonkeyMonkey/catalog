<?php

namespace App\Http\Repositories;

use App\Brand as Model;
use App\Brand;
use Illuminate\Support\Facades\DB;

class BrandRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($paginate = null)
    {
        $colums = ['id', 'title', 'description', 'about', 'category_id', 'image'];
        $result = $this->startConditions()
            ->select($colums)
            ->with('category:id,title')// lazy load. через : выбираем нужные поля,по умолчанию достается весь объект
            ->paginate($paginate);
        return $result;
    }

    public function getCategories()
    {
        $fields = implode(', ', [
            'id',
            'CONCAT (id, ". ",  title) as id_title'
        ]);

        $result = DB::table('categories')->selectRaw($fields)->get();

        return $result;

    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getBrandsForIndexPage()
    {
        $colums = ['id', 'title', 'description', 'image'];
        $result = $this->startConditions()
            ->select($colums)
            ->take(4)
            ->get();

        return $result;
    }
}
