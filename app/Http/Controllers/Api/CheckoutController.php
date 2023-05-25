<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Room;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
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
            'price' => $request->price,
            'user' =>$user,
            'room' =>$room,
            'email' =>$user->email,
            'check' =>'confirmroom',
        ];
        SendEmail::dispatch($datas)->delay(now()->addMinute(1));
        return response()->json([
            'success' => true,
            'order' => $order,
        ]);
    }
}
