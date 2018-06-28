@extends('layouts.app')

@section('content')
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
    <div class="list-products wrapper-wide">
        <div class="side-bar">
            <h2>Categories</h2>
            <div class="filter">
                @if(request()->category)
                    <form action="{{ route('shop.index') }}" method="GET">
                        <ul>
                            @foreach($featureds as $featured)
                                <li>{{ $featured->name }}</li>
                                    @foreach($featured->values as $value)
                                        <label for="{{ $featured->slug }}">{{ $value->value }}</label>
                                        <input type="checkbox" name="filters-{{ $featured->slug }}" id="{{ $featured->slug }}">
                                    @endforeach
                            @endforeach
                        </ul>
                        <button type="submit">Save</button>
                    </form>
                @else
                    <ul>
                        @foreach($categories as $category)
                            <li class="{{ setActiveCategory($category->slug)  }}"><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div>
                <ul>
                    <li><a href="{{  route('shop.index', ['category' => request()->category, 'sort' => 'low_hight']) }}">Low to Hight</a></li>
                    <li><a href="{{  route('shop.index', ['category' => request()->category, 'sort' => 'hight_low']) }}">Hight to Low</a></li>
                </ul>
            </div>
        </div>
        <div class="products">
            <h1>{{ $categoryName }}</h1>
            <h2>Convertisseurs de tension pursinus</h2>
            <div class="grid-products">
                @forelse($products as $product)
                    <div class="column">
                        <img src="{{ productImage($product->image) }}" alt="product">
                        <span  class="price">{{ $product->presentPrice() }}</span>
                        <a href="#"><h4 class="title">{{ $product->name }}</h4></a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <button type="submit" class="btn"><i class="fa fa-shopping-cart"> Add to cart</i> </button>
                        </form>
                    </div>
                @empty
                    <div>
                        No items found
                    </div>
                @endforelse
            </div>
            <div class="pagination">
                {{ $products->appends(request()->input())->links() }}
            </div>
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