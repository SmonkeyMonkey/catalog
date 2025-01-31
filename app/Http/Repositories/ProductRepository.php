<?php

namespace App\Http\Repositories;

use App\Product as Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }
    public function getAllWithPaginate($paginate = null)
    {
        $colums = ['id', 'title', 'specifications','image','price','brand_id','collection_id'];
        $result = $this->startConditions()
            ->select($colums)
            ->with(['collection:id,title','brand:id,title'])
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
    public function getCollections()
    {
        $fields = implode(', ', [
            'id',
            'CONCAT (id, ". ",  title) as id_title'
        ]);

        $result = DB::table('collections')->selectRaw($fields)->get();

        return $result;
    }
    public function getEdit($id){
        return $this->startConditions()->with(['creator:id,name','updated_user:id,name'])->find($id);
    }
    public function getProducts($slug){
        $colums = ['id','slug','title','price','specifications','brand_id'];
        $result = $this->startConditions()->
        select($colums)->
        where('slug',$slug)->
        with(['brand:id,title','question' => function($query){
            $query->select('name','message','answer','product_id')->where('is_active','1');
        }])->
        first();
        return $result;
    }

}
