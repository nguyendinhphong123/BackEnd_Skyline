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
        $customers = $this->model->select('*');
        if (!empty($request->key)) {
            $search = $request->key;
            $customers = $customers->Search($search);
        }
        return $customers->orderBy('id','DESC')->paginate(1);
    }
}