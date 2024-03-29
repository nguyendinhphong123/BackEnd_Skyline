<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Services\Interfaces\CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = $this->customerService->all($request);
        return CustomerResource::collection($items);
    }
    public function store(StoreCustomerRequest $request)
    {
        $data = $request->except(['_token', '_method']);
        $this->customerService->store($data);
        response()->json([
            'success' => true,
        ]);
    }

}
