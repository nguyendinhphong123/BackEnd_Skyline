<?php

namespace App\Services;

use App\Services\Interfaces\CustomerServiceInterface;

use App\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerService implements CustomerServiceInterface
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /* Triển khai các phương thức trong PostServiceInterface */
    public function all($request){
        return $this->customerRepository->all($request);
    }
    public function find($id){
        return $this->customerRepository->find($id);
    }
    public function store($request){
        return $this->customerRepository->store($request);
    }
    public function update($request, $id){
        return $this->customerRepository->update($request,$id);
    }
    public function destroy($id){
        return $this->customerRepository->destroy($id);
    }
}