<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get Model
     * @return string
     */
    abstract public function getModel();

    /**
     * set Model
     */
    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function all($request)
    {
        echo __METHOD__;
        $result = $this->model->all();
        return $result;
    }

    public function find($id)
    {
        echo __METHOD__;
        return $this->model->find($id);
    }

    public function store($data)
    {
        echo __METHOD__;
        return $this->model->store($data);
    }

    public function update($data, $id)
    {
        return $this->model->where('id',$id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->where('id',$id)->delete();
    }
}