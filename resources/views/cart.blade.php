@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6"><!--Cart-->
            <div class="text-center">
                <div class="text-2xl font-semibold text-blue-darkest">Votre panier</div>
                <div class="w-1/2 text-lg inline-block my-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</div>
                <div class="grid grid-columns-12 my-6 text-left" style="grid-gap: 2rem;">
                    <div class="col-span-8 bg-white p-4 shadow-md rounded-lg">
                        <div class="my-4 text-2xl font-semibold text-blue-darkest">Vos Articles</div>
                        @include('partials.notification')
                        <div class="py-6">
                            @if(Cart::count() > 0)
                                <h2 class="pb-4">{{ Cart::count() }} item(s) in Shopping Cart</h2>
                            @else
                                <h2 class="text-blue-darkest">No items in Cart</h2>
                                <div class="py-6">
                                    <a href="{{ route('shop.index') }}" class="btn-blue text-white ml-2 hover:bg-blue hover:text-white">Continue Shopping</a>
                                </div>
                            @endif
                            <div class="flex border-b-1 border-solid border-blue-darkest">
                                <div class="flex-1 text-lg text-blue-darkest ">Description</div>
                                <div class="flex text-lg text-blue-darkest " style="flex-basis: 5rem;">Quantity</div>
                                <div class="flex text-lg text-blue-darkest " style="flex-basis: 5rem;">Price</div>
                                <div class="inline-block text-right justify-end flex text-lg text-blue-darkest " style="flex-basis: 5rem;">X</div>
                            </div>
                            @if(Cart::count() > 0)
                                @foreach(Cart::content() as $item)
                                        <div class="flex border-b-1 border-solid border-blue-darkest">
                                            <div class="flex-1 h-32 flex items-center">
                                                <a href="#" ><img src="{{ productImage($item->model->image) }}" class="w-16 h-auto"></a>
                                                <a href="#" ><div class="ml-2 text-base text-blue-darkest font-semibold">{{ $item->model->name }}</div></a>
                                            </div>
                                            <div class="h-32 flex items-center text-base text-blue-darkest font-semibold" style="flex-basis: 5rem;">
                                                <select class="quantity" name="quantity" data-id="{{ $item->rowId }}">
                                                    @for ($i = 1; $i < 5 + 1; $i++)
                                                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="h-32 flex items-center text-base text-blue-darkest font-semibold" style="flex-basis: 5rem;">{{ presentPrice($item->subtotal) }}</div>
                                            <div class="h-32 justify-end flex items-center text-base text-blue-darkest font-semibold" style="flex-basis: 5rem;">
                                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" ><svg class="fill-current h-6 w-6 text-red" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Delete</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg></button>
                                                </form>
                                                <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="ml-2">Save For Later</button>
                                                </form>
                                            </div>
                                        </div>
                                @endforeach
                            @endif
                            <div class="flex my-4">
                                <div class="flex-1 text-blue-darkest opacity-75 justify-end mr-4 flex items-center text-lg font-semibold">Subtotal: {{ presentPrice(Cart::subtotal()) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class=" bg-white p-4 shadow-md rounded-lg">
                            <div class="my-4 text-2xl font-semibold text-blue-darkest">Invoice</div>
                            <div>
                                <div class="flex border-b-1 py-4 border-solid border-blue-darkest ">
                                    <div class="flex-1 font-semibold">SubTotal</div>
                                    <div class="flex-1 w-16 text-right font-semibold">{{ presentPrice(Cart::subtotal()) }}</div>
                                </div>
                                @if(session()->has('coupon'))
                                    <div class="flex border-b-1 py-4 border-solid border-blue-darkest ">
                                        <div class="flex-1 font-semibold">
                                            Discount <span class="text-green" >({{ session()->get('coupon')['name'] }})</span>
                                            <form method="POST" action="{{ route('coupon.destroy') }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="text-red">Remove</button>
                                            </form>
                                        </div>
                                        <div class="flex-1 w-16 text-right font-semibold">-{{ presentPrice($discount) }}</div>
                                    </div>
                                @endif
                                <div class="flex border-b-1 py-4 border-solid border-blue-darkest ">
                                    <div class="flex-1 font-semibold">New SubTotal</div>
                                    <div class="flex-1 w-16 text-right font-semibold">{{ presentPrice($newSubtotal) }}</div>
                                </div>
                                <div class="flex border-b-1 py-4 border-solid border-blue-darkest ">
                                    <div class="flex-1 font-semibold">Tax <span class="font-semibold text-blue-darkest text-base opacity-75">20%</span></div>
                                    <div class="flex-1 w-16 text-right font-semibold">{{ presentPrice($newTax) }}</div>
                                </div>
                                <p class="text-right text-blue-darkest opacity-75 font-semibold my-4">Total : {{ presentPrice($newTotal) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(Cart::count() > 0)
                <div class="py-4">
                    <a href="{{ route('checkout.index') }}" class="btn-green">Proced to checkout</a>
                </div>
            @endif
    <div class="col-span-8 bg-white mt-4 p-4 shadow-md rounded-lg">
        <div class="my-4 text-2xl font-semibold text-blue-darkest">Save For Later</div>
        <div class="py-6">
            @if(Cart::instance('saveForLater')->count() > 0)
                <h2 class="pb-4">{{ Cart::instance('saveForLater')->count() }} item(s) in Save For Later</h2>
            @else
                <h2 class="text-blue-darkest">No items in Save For Later</h2>
            @endif
            <div class="flex border-b-1 border-solid border-blue-darkest">
                <div class="flex-1 text-lg text-blue-darkest ">Description</div>
                <div class="flex text-lg text-blue-darkest " style="flex-basis: 5rem;">Quantity</div>
                <div class="flex text-lg text-blue-darkest " style="flex-basis: 5rem;">Price</div>
                <div class="inline-block text-right justify-end flex text-lg text-blue-darkest " style="flex-basis: 5rem;">X</div>
            </div>
            @if(Cart::instance('saveForLater')->count() > 0)
                @foreach(Cart::instance('saveForLater')->content() as $item)
                    <div class="flex border-b-1 border-solid border-blue-darkest">
                        <div class="flex-1 h-32 flex items-center">
                            <a href="#" ><img src="{{ productImage($item->model->image) }}" class="w-16 h-auto"></a>
                            <a href="#" ><div class="ml-2 text-base text-blue-darkest font-semibold">{{ $item->model->name }}</div></a>
                        </div>
                        <div class="h-32 flex items-center text-base text-blue-darkest font-semibold" style="flex-basis: 5rem;">1</div>
                        <div class="h-32 flex items-center text-base text-blue-darkest font-semibold" style="flex-basis: 5rem;">{{ presentPrice($item->subtotal) }}</div>
                        <div class="h-32 justify-end flex items-center text-base text-blue-darkest font-semibold" style="flex-basis: 5rem;">
                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" ><svg class="fill-current h-6 w-6 text-red" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Delete</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg></button>
                            </form>
                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="ml-2">Move To Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="flex my-4">
                <div class="flex-1 text-blue-darkest opacity-75 justify-end mr-4 flex items-center text-lg font-semibold">Subtotal: {{ presentPrice(Cart::subtotal()) }}</div>
            </div>
        </div>
    </div>

</div><!--End Cart-->
@endsection

@section('extra-js')
    <script>
        (function () {
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function (element) {
                element.addEventListener('change', function () {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        //console.log(response)
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        console.log(error)
                        window.location.href = '{{ route('cart.index') }}'
                    })
                })
            })
        })();
    </script>
@endsection