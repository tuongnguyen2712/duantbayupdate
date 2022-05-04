<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
abstract class BaseRepository implements RepositoryInterface{
    protected $model;

    function __construct()
    {
        $this->setModel();
    }


    //lấy model tương ứng
    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->orderBy('id', 'DESC')->get();
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }
    public function findslug($slug)
    {
        $result = $this->model->find($slug);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);

        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }


    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }

    public function whereSlug($slug){
        return $this->whereSlug($slug);
    }

}




?>
