<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    //
    public function index()
    {
        $orders = Order::where('user_id', 2)->get();
        return view('orders')->with(['orders' => $orders]);
    }
}