@extends('layouts.app')

@section('content')
        <div class="container mx-auto"><!--Products-->
            @if(request()->category)
                <div class="breadcrump mb-2 text-blue-darkest font-semibold text-lg">
                    <a href="{{ route('shop.index') }}" class="hover:text-red-light"><i class="fa fa-home"></i></a>
                        >
                        <a href="{{ route('shop.index', ['category' => request()->category]) }}" class="hover:text-red-light">{{ request()->category }}</a>
                </div>
            @endif
            <div class="grid grid-columns-12 grid-gap-2 mb-6" style="grid-gap: 1rem;">
                <div class="col-span-3">
                    <div class="bg-white px-2 py-2">
                        @if(request()->category)
                        <div class="text-lg font-semibold text-blue-darkest">Filters</div>
                        <form action="{{ route('shop.filters') }}" method="post">
                            @csrf
                            @foreach($featureds as $featured)
                                <div class="py-2">
                                    <div class="mb-2 text-orange text-lg border-b-1 border-solid border-black cursor-pointer hover:text-red-light">- {{ $featured->name }}</div>
                                    <div class="px-2">
                                        <fieldset>
                                            @foreach($featured->values as $value)
                                                <input type="checkbox" id="{{ $value->value }}" value="{{ $value->value }}" name="filters[]">
                                                <label class="mb-2" for="{{ $value->value }}">{{ $value->value }}"</label><br>
                                            @endforeach
                                        </fieldset>
                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn-red">Save</button>
                            <button type="reset" class="btn-red">Reset</button>
                        </form>
                        @else
                            <div class="text-2xl font-semibold text-blue-darkest">Categories</div>
                            <ul class="list-reset pl-6">
                                @foreach($categories as $category)
                                    <li class="{{ setActiveCategory($category->slug)  }} text-lg my-4"><a class="hover:text-orange" href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-span-9 py-2">
                    <div class="text-blue-darkest font-semibold text-lg">
                        <div class="text-2xl mb-2">{{ request()->category }}</div>
                        <div class="flex pb-2">
                            <div class="flex-1 font-light">
                                Sorted by :
                                <a href="{{  route('shop.index', ['category' => request()->category, 'sort' => 'low_hight']) }}" class="{{ request()->sort == 'low_hight' ? 'font-semibold' : ''}} mr-2 hover:text-red-light">Low to Hight</a>
                                <a href="{{  route('shop.index', ['category' => request()->category, 'sort' => 'hight_low']) }}" class="{{ request()->sort == 'hight_low' ? 'font-semibold' : ''}} hover:text-red-light">Hight to Low</a>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-columns-4 grid-gap-4 mb-6" style="grid-gap: 2rem;">
                        @forelse($products as $product)
                            <div class="bg-white shadow-lg py-6 px-6 text-center">
                                <a href="{{ route('shop.show', ['product' => $product->slug]) }}">
                                    <img style="width: 200px; height: auto;" src="{{ productImage($product->image) }}" alt="thumb" class="mb-1 transition-slow hover:opacity-75">
                                </a>
                                <div class="text-orange text-lg font-semibold my-2">{{ presentPrice($product->price) }}</div>
                                <div class="text-lg font-semibold mb-1"><a href="{{ route('shop.show', ['product' => $product->slug]) }}" class="text-blue-darkest hover:text-red-light">{{ $product->name }}</a></div>
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
                        @empty
                            <div>
                                No items found
                            </div>
                        @endforelse
                    </div>
                    <div class="mt-10">
                        {{ $products->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div><!--End Products-->
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