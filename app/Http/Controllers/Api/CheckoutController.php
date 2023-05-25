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

        // $user = Auth::guard('customer')->user();
            
        $data = $request->validate([
            'price' => 'required',
            'room_id' => 'required',
            'customer_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            
           

            // 'total' => 'required',
        ]);

       

        $order = Order::create($data);
        return response()->json([
            'success' => true,
            'order' => $order,
        ]);
    }
}
