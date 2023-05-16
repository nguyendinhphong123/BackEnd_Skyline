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
        $query = $this->model->select('*');
        if ( $request->address ) {
            $query->where('address','like','%'.$request->address.'%');
        }
        if ( $request->name ) {
            $query->where('name','like','%'.$request->name.'%');
        }
        if ( $request->id ) {
            $query->where('id',$request->id);
        }
        return $query->orderBy('id','DESC')->paginate(4);
    }
}
