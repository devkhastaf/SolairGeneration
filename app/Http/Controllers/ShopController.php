<?php

namespace App\Http\Controllers;

use App\Category;
use App\Featured;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories = Category::all();
        if(request()->category){
            $products = Product::with('categories')->whereHas('categories', function ($query){
                $query->where('slug', request()->category);
            });
            $featureds = Featured::with('values')->whereHas('categories', function ($query){
                $query->where('slug', request()->category);
            })->get();
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        }else {
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
            $featureds = '';
        }

        if(request()->sort == 'low_hight'){
            $products = $products->orderBy('price')->paginate($pagination);
        }elseif (request()->sort == 'hight_low'){
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        }else {
            $products = $products->paginate($pagination);
        }
        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'featureds' => $featureds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get all Filters.
     *
     * @return \Illuminate\Http\Response
     */
    public function filters()
    {
        $category = Category::where('slug', request()->category)->first();
        $filters = Featured::with('values')->whereHas('categories', function ($query){
            $query->where('slug', request()->category);
        })->get();
        //dd($filters);
        return response()->json($filters);
    }


}
