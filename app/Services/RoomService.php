<?php

namespace App\Services;

use App\Services\Interfaces\RoomServiceInterface;

use App\Repositories\Interfaces\RoomRepositoryInterface;

class RoomService implements RoomServiceInterface
{
    protected $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /* Triển khai các phương thức trong PostServiceInterface */
    public function all($request){
        return $this->roomRepository->all($request);
    }
    public function find($id){
        return $this->roomRepository->find($id);
    }
    public function store($request){
        return $this->roomRepository->store($request);
    }
    public function update($request, $id){
        return $this->roomRepository->update($request,$id);
    }
    public function destroy($id){
        return $this->roomRepository->destroy($id);
    }
    public function getTrashed(){
        return $this->roomRepository->getTrashed();
    }
    public function restore($id){
        return $this->roomRepository->restore($id);
    }
    public function deleteforever($id){
        return $this->roomRepository->deleteforever($id);
    }
}
