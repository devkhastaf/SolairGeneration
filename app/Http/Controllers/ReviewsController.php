<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    //
    public function index()
    {
        return view('reviews');
    }
}
