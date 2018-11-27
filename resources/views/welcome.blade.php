@extends('layouts.app')

@section('extra-css')
    <style>
        .subcategory:last-child {
            margin-bottom: 1rem;
        }
    </style>
@endsection
@section('content')
    <carousel>
        @foreach($slides as $slide)
            <carousel-slide>
                <a href="{{ route('shop.show', ['product' => $slide->product->slug]) }}">
                    <img style="text-align: center" src="{{ slideImage($slide->image) }}">
                </a>
            </carousel-slide>
        @endforeach
    </carousel>
        <div class="container mx-auto my-4"><!--Last Products-->
            <div class="text-2xl font-semibold mb-2 text-blue-darkest">Last Products</div>
            <div class="border-b-4 border-solid border-blue-darkest w-16 mb-6"></div>
            <div class="grid grid-columns-4 grid-gap-4 mb-6" style="grid-gap: 2rem;">
                @foreach($products as $product)
                    <div class="bg-white shadow-lg py-6 px-6 text-center">
                        <a href="#">
                            <img style="width: 200px; height: auto;" src="{{ productImage($product->image) }}" alt="thumb" class="mb-1 transition-slow hover:opacity-75">
                        </a>
                        <div class="text-orange text-lg font-semibold my-2">{{ presentPrice($product->price) }}</div>
                        <div class="text-lg font-semibold mb-3"><a href="#" class="text-blue-darkest hover:text-red-light">{{ $product->name }}</a></div>
                        <div class="rating text-orange mb-4">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star text-grey-light"></i>
                            (45)
                        </div>
                        <div>
                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <button type="submit" class="btn"><i class="fa fa-shopping-cart"> Add to cart</i> </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

        </div><!--End Last Products-->
        <div class="container mx-auto py-8"><!--Services-->
            <div class="grid grid-columns-3 grid-gap-4 mb-6" style="grid-gap: 2rem;">
                <div class="text-center bg-white py-6 px-6">
                    <div class="font-light text-blue-darkest py-2"><i class="fa fa-clock fa-4x font-light" style="font-weight: 300;"></i></div>
                    <div class="text-blue-darkest text-lg font-semibold py-2">Reprehenderit in voluptate</div>
                    <div class="text-blue-darkest">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
                </div>
                <div class="text-center bg-white py-6 px-6">
                    <div class="font-light text-blue-darkest py-2"><i class="fa fa-piggy-bank fa-4x"></i></div>
                    <div class="text-blue-darkest text-lg font-semibold py-2">Reprehenderit in voluptate</div>
                    <div class="text-blue-darkest">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
                </div>
                <div class="text-center bg-white py-6 px-6">
                    <div class="font-light text-blue-darkest py-2"><i class="fa fa-headphones fa-4x"></i></div>
                    <div class="text-blue-darkest text-lg font-semibold py-2">Reprehenderit in voluptate</div>
                    <div class="text-blue-darkest">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
                </div>
            </div>
        </div><!--End Services-->
        <div class="container mx-auto py-8"><!--Categories-->
            <div class="text-2xl font-semibold mb-2 text-blue-darkest">All Categories</div>
            <div class="border-b-4 border-solid border-blue-darkest w-16 mb-6"></div>
            <div class="flex flex-wrap flex-row text-center category">
                @foreach($categories as $category)
                    <div class="relative text-center bg-white px-4 py-4 m-2 w-64" style="flex:1 0 21%;">
                    <img style="width: 200px; height: auto;" src="{{ categoryImage($category->image) }}" alt="thumb" class="mb-1 transition-slow hover:opacity-75">
                    <div class="font-semibold text-lg mb-10"><a href="{{ route('shop.index', ['category' => $category->slug]) }}" class="text-orange hover:text-red-light" >{{ $category->name }}</a></div>
                    @foreach($category->subCategories() as $subCategory)
                        <div class="subcategory font-semibold mb-5"><a href="{{ route('shop.index', ['category' => $subCategory->slug]) }}" class="text-blue-darkest hover:text-red-light" >{{ $subCategory->name }}</a></div>
                    @endforeach
                    <div class="absolute text-center pin-x" style="bottom: 20px">
                        <a class="btn my-4" href="{{ route('shop.index', ['category' => $category->slug]) }}">See More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div><!--End Categories-->
        <div class="container mx-auto py-8"><!--Brands-->
            <div class="text-2xl font-semibold mb-2 text-blue-darkest">Choice by brand</div>
            <div class="border-b-4 border-solid border-blue-darkest w-16 mb-6"></div>
            <div class="grid grid-columns-6 grid-gap-4 mb-6 py-4 text-center" style="grid-gap: 2rem">
                <div>
                    <a href="#">
                        <img class="transition-slow hover:opacity-75" style="width:45%;" src="images/brand1.png" alt="brand">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img class="transition-slow hover:opacity-75" style="width:45%;" class="w-45" src="images/brand2.png" alt="brand">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img class="transition-slow hover:opacity-75" style="width:45%;" class="w-45" src="images/brand3.png" alt="brand">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img style="width:45%;" class="w-45" src="images/brand1.png" alt="brand">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img class="transition-slow hover:opacity-75" style="width:45%;" class="w-45" src="images/brand2.png" alt="brand">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img class="transition-slow hover:opacity-75" style="width:45%;" src="images/brand3.png" alt="brand">
                    </a>
                </div>
            </div>
        </div><!--End Brands-->
@endsection