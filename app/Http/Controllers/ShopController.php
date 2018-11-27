<?php

namespace App\Http\Controllers;

use App\Category;
use App\Featured;
use App\Product;
use Illuminate\Http\Request;
use Nicolaslopezj\Searchable\SearchableTrait;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 4;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3'
        ]);


        $query = $request->get('query');

        /*$products = Product::where('name', 'LIKE', "%$query%")
                            ->orWhere('details', 'LIKE', "%$query%")
                            ->orWhere('description', 'LIKE', "%$query%")
                            ->paginate(15);
        */

        $products =  Product::search($query)->paginate(15);
        //dd($products);
        return view('search-result')->with('products', $products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('show')->with([
            'product' => $product
        ]);
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
    public function categoryforfilter(Request $request)
    {
        /*$categories = Category::findOrFail($request->categories);
        $features = Featured::with('categories')->whereHas(function ($query) use ($categories){
            foreach ($categories as $category) {
                $query->where('value', $category);
            }
        })->get();
        */
        return $request->categories;
    }

    /**
     * Get all Filters.
     *
     * @return \Illuminate\Http\Response
     */
    public function filters(Request $request)
    {
        $filters = $request->filters;
        $products = Product::with('featureds')->whereHas(function ($query) use ($filters){
            foreach ($filters as $filter) {
                $query->where('value', $filter);
            }
        })->get();
        dd($products);
        //dd($request->filters);
    }


}
