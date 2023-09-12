<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Jobs\SendEmail;
use App\Models\Room;
use App\Models\User;
use App\Services\Interfaces\OrderServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderService;
    private $roomService;
    public function __construct(OrderServiceInterface $orderService
    , RoomServiceInterface  $roomService )
    {
        $this->orderService = $orderService;
        $this->roomService = $roomService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = $this->orderService->all($request);
        return OrderResource::collection($items);

    }


    public function store(StoreOrderRequest $request)
    {
        $data = $request->except(['_token','_method']);
        $this->orderService->store($data);
        $this->roomService->update($data['room_id'],['status' => 0]);
        // dd($request);
        return response()->json([
            'success' => true,
        ]);
    }

    /**1
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->orderService->find($id);
        return new OrderResource($item);
    }

}
