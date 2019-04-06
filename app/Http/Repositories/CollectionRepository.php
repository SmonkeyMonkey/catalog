<?php

namespace App\Http\Repositories;

use App\Collection as Model;
use Illuminate\Support\Facades\DB;

class CollectionRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($paginate = null)
    {
        $colums = ['id', 'title', 'brand_id', 'description'];
        $result = $this->startConditions()
            ->select($colums)
            ->with('brands:id,title')// lazy load. через : выбираем нужные поля,по умолчанию достается весь объект
            ->paginate($paginate);
        return $result;
    }

    public function getBrands()
    {
        $fields = implode(', ', [
            'id',
            'CONCAT (id, ". ",  title) as id_title'
        ]);

        $result = DB::table('brands')->selectRaw($fields)->get();

        return $result;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getAllForCollectionPage($slug)
    { // collection blade php
        $colums = ['id', 'slug', 'title', 'description'];
        $result = $this->startConditions()
            ->select($colums)
            ->where('slug', $slug)
            ->with('products:id,slug,image,title,price,collection_id')
            ->first();

        return $result;
    }

    public function getCollectionAndRelatedProduct($slug)
    {
        $colums = ['id', 'slug', 'title'];
        return $this->startConditions()
            ->select($colums)
            ->where('slug', $slug)
            ->with('products:id,slug,title,price,specifications,collection_id')
            ->first();
    }
}
