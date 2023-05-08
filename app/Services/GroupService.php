<?php

namespace App\Services;

use App\Services\Interfaces\GroupServiceInterface;

use App\Repositories\Interfaces\GroupRepositoryInterface;

class GroupService implements GroupServiceInterface
{
    protected $GroupRepository;

    public function __construct(GroupRepositoryInterface $GroupRepository)
    {
        $this->GroupRepository = $GroupRepository;
    }


    public function all($request){
        return $this->GroupRepository->all($request);
    }
    public function find($id){
        return $this->GroupRepository->find($id);
    }
    public function store($request){
        return $this->GroupRepository->store($request);
    }
    public function update($id,$data){
        return $this->GroupRepository->update($id, $data);
    }
    public function destroy($id){
        return $this->GroupRepository->destroy($id);
    }
}
