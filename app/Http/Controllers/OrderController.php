<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Room;
use App\Services\Interfaces\OrderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
     private $orderService;
    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index(Request $request){
        $this->authorize('viewAny', Order::class);
        $items = $this->orderService->all($request);
        return view('orders.index',compact('items'));
    }
    public function show($id){
        $this->authorize('viewAny', Order::class);
        $data = DB::table('orders')
        ->join('rooms', 'orders.room_id', '=', 'rooms.id')
        ->select('orders.*', 'rooms.name as room_name', 'rooms.image', 'rooms.price')
        ->where('orders.id', $id)
        ->first();
        $checkin = Carbon::parse($data->checkin);
        $checkout = Carbon::parse($data->checkout);
        $numberOfDays = $checkout->diffInDays($checkin);
        return view('orders.show',compact('data','numberOfDays'));
    }
}
