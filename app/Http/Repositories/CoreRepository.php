<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{
    /**
     * @var Model
     *
     */
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }
}