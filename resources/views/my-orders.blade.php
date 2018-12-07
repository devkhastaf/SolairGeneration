@extends('layouts.app')

@section('content')
        <div class="container mx-auto"><!--Orders-->
            <div class="grid grid-columns-12 my-6 text-left" style="grid-gap: 1rem;">
                <div class="col-span-2">
                    @include('partials.sidenavbar')
                </div>
                <div class="col-span-10 bg-white p-4 shadow-md rounded-lg">
                    <div class="my-4 text-2xl font-semibold text-blue-darkest">My Orders</div>
                    <div class="">
                        <div class="flex border-b-1 border-solid border-blue-darkest">
                            <div class="flex-1 text-lg text-blue-darkest ">Description</div>
                            <div class="flex text-lg text-blue-darkest " style="flex-basis: 7rem;">Quantity</div>
                            <div class="flex text-lg text-blue-darkest " style="flex-basis: 7rem;">Price</div>
                            <div class="inline-block text-right justify-end flex text-lg text-blue-darkest " style="flex-basis: 4rem;">Shiped</div>
                        </div>
                        @foreach($orders as $order)
                            @foreach($order->products as $product)
                                <div class="flex border-b-1 border-solid border-blue-darkest">
                                    <div class="flex-1 h-32 flex items-center">
                                        <a href="#" ><img src="{{ productImage($product->image) }}" class="w-16 h-auto"></a>
                                        <a href="#" ><div class="ml-2 text-base text-blue-darkest font-semibold">{{ $product->name }}</div></a>
                                    </div>
                                    <div class="h-32 flex items-center text-base text-blue-darkest font-semibold" style="flex-basis: 7rem;">1</div>
                                    <div class="h-32 flex items-center text-base text-blue-darkest font-semibold" style="flex-basis: 7rem;">{{ presentPrice($product->price) }}</div>
                                    <div class="h-32 justify-end flex items-center text-base text-blue-darkest font-semibold" style="flex-basis: 4rem;">{{ $order->shipped ? 'Yes' : 'No' }}</div>
                                </div>
                            @endforeach
                        @endforeach
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div><!--End Orders-->
@endsection