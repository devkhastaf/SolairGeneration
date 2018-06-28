@extends('layouts.app')

@section('content')
    <carousel>
        <carousel-slide>
            <img style="text-align: center" src="images/1.jpg">
        </carousel-slide>
        <carousel-slide>
            <img style="text-align: center" src="images/2.jpg">
        </carousel-slide>
        <carousel-slide>
            <img style="text-align: center" src="images/3.jpg">
        </carousel-slide>
        <carousel-slide>
            <img style="text-align: center" src="images/4.jpg">
        </carousel-slide>
        <carousel-slide>
            <img style="text-align: center" src="images/5.jpg">
        </carousel-slide>
        <carousel-slide>
            <img style="text-align: center" src="images/6.jpg">
        </carousel-slide>
    </carousel>
    <div class="last-products wrapper-wide">
        <h2>Last Products</h2>
        <div class="grid">
            @foreach($products as $product)
                <div class="column">
                    <img src="{{ productImage($product->image) }}" alt="product"/>
                    <span  class="price">{{ $product->presentPrice() }}</span>
                    <a href="#"><h4 class="title">{{ $product->name }}</h4></a>
                    <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="wrapper-wide services">
        <div class="column">
            <i class="fa fa-clock fa-4x" style="font-weight: normal"></i>
            <h3>Reprehenderit in voluptate</h3>
            <p>Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>
        </div>
        <div class="column">
            <i class="fa fa-piggy-bank fa-4x"></i>
            <h3>Reprehenderit in voluptate</h3>
            <p>Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>
        </div>
        <div class="column">
            <i class="fa fa-headphones fa-4x"></i>
            <h3>Reprehenderit in voluptate</h3>
            <p>Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>
        </div>
    </div>
    <div class="all-categories wrapper-wide">
        <h2>All Categories</h2>
        <div class="category-grid">
            @foreach($categories as $category)
                <div class="column">
                    <img src="{{ categoryImage($category->image) }}" alt="category">
                    <h3>{{ $category->name }}</h3>
                    @foreach($category->subCategories() as $subCategory)
                        <a href="{{ route('shop.index', ['category' => $subCategory->slug]) }}">{{ $subCategory->name }}</a>
                    @endforeach
                        <a href="{{ route('shop.index', ['category' => $category->slug]) }}" class="btn">See more</a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="brands wrapper-wide">
        <h2>Choice by Brand</h2>
        <div class="brands-grid">
            <div class="column">
                <a href="#"><img src="images/brand1.png"></a>
            </div>
            <div class="column">
                <a href="#"><img src="images/brand2.png"></a>
            </div>
            <div class="column">
                <a href="#"><img src="images/brand3.png"></a>
            </div>
            <div class="column">
                <a href="#"><img src="images/brand1.png"></a>
            </div>
            <div class="column">
                <a href="#"><img src="images/brand2.png"></a>
            </div>
            <div class="column">
                <a href="#"><img src="images/brand3.png"></a>
            </div>
        </div>
    </div>
@endsection