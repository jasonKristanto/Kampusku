<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function find($id);

    public function all();

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}
