<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Room;
use App\Services\Interfaces\OrderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

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
    public function export()
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }

    public function create()
    {
        $this->authorize('create', Room::class);
        $rooms = Room::all();
        $customers = Customer::all();
        return view('orders.create', compact('customers','rooms'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Room::class);
        $data = $request->except(['_token','_method']);
        $this->orderService->store($data);
        toast('Thêm đơn đặt phòng thành công', 'success', 'top-right');
        return redirect()->route('orders.index');
    }
}
