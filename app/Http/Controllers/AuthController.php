<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(){

        if (Auth::check()) {
            return redirect()->route('trangchu');
        } else {
            return view('auth.login');
        }
    }
     public function postLogin(Request $request)
    {
        $messages = [
            'email.exists' => 'Email không đúng',
        'password.exists' => 'Mật khẩu không đúng',
        'email.required' => 'Vui lòng nhập email',
        'password.required' => 'Vui lòng nhập mật khẩu',
            
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required|exists:users,password',
        ], $messages);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('trangchu');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }
public function logout()
{
    Auth::logout();
    return redirect()->route('login');
}
public function home(){
         $totalPrice  =  Order::pluck('total')->sum();
        $totalOrders  =  Order::pluck('id')->count();
        $totalCustomer  =  Customer::pluck('id')->count();
        $totalRoom = Room::pluck('id')->count();
        $params = [
            'totalPrice' => $totalPrice,
            'totalOrders' => $totalOrders,
            'totalCustomer' => $totalCustomer,
            'totalRoom' => $totalRoom,
        ];
    return view('home',$params);
}
}
