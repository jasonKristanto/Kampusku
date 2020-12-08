<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $this->model->where($this->getPrimarykey(), $id)
            ->update($data);
    }

    public function delete($id)
    {
        $this->model->where($this->getPrimarykey(), $id)
            ->delete();
    }

    private function getPrimaryKey()
    {
        return $this->model->getKeyName();
    }
}
