<?php

namespace App\Services;

use App\Services\Interfaces\CategoryServiceInterface;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    protected $CategoryRepository;

    public function __construct(CategoryRepositoryInterface $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }


    public function all($request){
        return $this->CategoryRepository->all($request);
    }
    public function find($id){
        return $this->CategoryRepository->find($id);
    }
    public function store($request){
        return $this->CategoryRepository->store($request);
    }
    public function update($id,$data){
        return $this->CategoryRepository->update($id, $data);
    }
    public function destroy($id){
        return $this->CategoryRepository->destroy($id);
    }
    public function getTrashed(){
        return $this->CategoryRepository->getTrashed();
    }
    public function restore($id){
        return $this->CategoryRepository->restore($id);
    }
    public function deleteforever($id){
        return $this->CategoryRepository->deleteforever($id);
    }
}
