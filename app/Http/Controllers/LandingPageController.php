<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slide;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', true)->take(4)->inRandomOrder()->get();
        $categories = Category::where('parent', null)->get();
        $slides = Slide::where('visible', true)->get();
        return view('welcome')->with([
            'products' => $products,
            'categories' => $categories,
            'slides' => $slides
        ]);
    }
}
