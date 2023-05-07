<?php
namespace App\Repositories\Eloquents;

use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

class CustomerRepository extends EloquentRepository implements CustomerRepositoryInterface
{
    public function getModel()
    {
        return Customer::class;
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