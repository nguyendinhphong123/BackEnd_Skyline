<?php

namespace App\Http\Controllers;

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
        $this->authorize('viewAny', Customer::class);
        $items = $this->customerService->all($request);
        return view('customers.index', compact('items'));
    }

}
