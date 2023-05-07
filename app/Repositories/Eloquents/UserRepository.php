<?php
namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
    public function paginate($request){
        $result = $this->model->paginate();
        return $result;
    }
}
