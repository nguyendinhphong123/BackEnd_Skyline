<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Room;
use App\Models\User;
use App\Services\Interfaces\RoomServiceInterface;
use DateTime;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $roomService;
    public function __construct( RoomServiceInterface  $roomService )
    {
        $this->roomService = $roomService;
    }
    public function checkout(Request $request)
    {
        $checkin = new DateTime($request->checkin);
        $checkout = new DateTime($request->checkout);
        $diff = $checkout->diff($checkin);
        $total = $request->price * $diff->days;
        $data = [
            'price' => $request->price,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'room_id' => $request->room_id,
            'customer_id' => $request->customer_id,
            'total' => $total,
        ];
        $order = Order::create($data);
        $user = Customer::find($request->customer_id);
        $room = Room::find($request->room_id);
        $datas = [
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'total' => $request->total,
            'price' => $request->price,
            'user' =>$user,
            'room' =>$room,
            'email' =>$user->email,
            'check' =>'confirmroom',
        ];
        SendEmail::dispatch($datas)->delay(now()->addMinute(1));
        $this->roomService->update($data['room_id'],['status' => 0]);
        return response()->json([
            'success' => true,
            'order' => $order,
        ]);
    }
}
