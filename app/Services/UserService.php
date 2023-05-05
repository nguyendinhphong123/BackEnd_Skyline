<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /* Triển khai các phương thức trong PostServiceInterface */
    public function all($request){
        return $this->userRepository->all($request);
        // dd(__METHOD__);
        // echo __METHOD__;
    }
    public function find($id){
        echo __METHOD__;
    }
    public function store($request){
        echo __METHOD__;
    }
    public function update($request, $id){
        echo __METHOD__;
    }
    public function destroy($id){
        echo __METHOD__;
    }
}