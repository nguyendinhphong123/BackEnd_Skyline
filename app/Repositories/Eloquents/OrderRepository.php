<?php
namespace App\Repositories\Eloquents;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

class OrderRepository extends EloquentRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }
    public function paginate($data){
        $result = $this->model->paginate();
        return $result;
    }
    public function all($request)
    {
        $orders = $this->model->select('*');
        if (!empty($request->key)) {
            $search = $request->key;
            $orders = $orders->Search($search);
        }
        return $orders->orderBy('id','DESC')->paginate(2);
    }
    public function store($data)
    {
        return $this->model->create($data);
    }
}