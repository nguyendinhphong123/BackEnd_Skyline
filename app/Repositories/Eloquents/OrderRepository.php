<?php
namespace App\Repositories\Eloquents;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use Carbon\Carbon;

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
    $query = $this->model
        ->select('orders.*', 'customers.name', 'customers.address', 'customers.phone')
        ->join('customers', 'orders.customer_id', '=', 'customers.id');

    if ($request->address) {
        $query->where('customers.address', 'like', '%' . $request->address . '%');
    }

    if ($request->name) {
        $query->where('customers.name', 'like', '%' . $request->name . '%');
    }

    if ($request->phone) {
        $query->where('customers.phone', $request->phone);
    }

    return $query->orderBy('orders.id', 'DESC')->paginate(4);
}
    public function store($data)
    {
        // dd($data);
        $checkin = Carbon::parse($data['checkin']);
        $checkout = Carbon::parse($data['checkout']);
        $numberOfDays = $checkout->diffInDays($checkin);
        $data['total'] = $numberOfDays * $data['price'];
        return $this->model->create($data);
    }
}
