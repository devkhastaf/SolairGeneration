@extends('layouts.app')

@section('content')
    <h1>Cart</h1>
    <span>{{ session()->get('success_message') }}</span>
    @if(Cart::count() > 0)
        <h2>{{ Cart::count() }} item(s) in Shopping Cart</h2>
        <ul>
            @foreach(Cart::content() as $item)
                <li>{{ $item->model->name }} || {{ presentPrice($item->model->price) }} ||
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="cart-option">Remove</button>
                    </form>
                    <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="cart-option">Save For Later</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <h2>No items in Cart</h2>
        <a href="{{ route('shop.index') }}" class="btn">Continue Shopping</a>
    @endif

    <table>
        <tr style=" border: 1px solid black; padding: 15px;">
            <td style=" border: 1px solid black; padding: 15px;">Subtotal</td>
            <td style=" border: 1px solid black; padding: 15px;">{{ presentPrice(Cart::subtotal()) }}</td>
        </tr>
        <tr style=" border: 1px solid black; padding: 15px;">
            <td style=" border: 1px solid black; padding: 15px;">Tax (20%)</td>
            <td style=" border: 1px solid black; padding: 15px;">{{ presentPrice(Cart::tax()) }}</td>
        </tr>
        <tr style=" border: 1px solid black; padding: 15px;">
            <td style=" border: 1px solid black; padding: 15px;"><strong>Total</strong></td>
            <td style=" border: 1px solid black; padding: 15px;"><strong>{{ presentPrice(Cart::total()) }}</strong></td>
        </tr>
    </table>

    @if(Cart::instance('saveForLater')->count() > 0)
        <h2>{{ Cart::instance('saveForLater')->count() }} item(s) in Save For Later</h2>
        <ul>
            @foreach(Cart::instance('saveForLater')->content() as $item)
                <li>{{ $item->model->name }} || {{ presentPrice($item->model->price) }}
                    <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="cart-option">Remove</button>
                    </form>
                    <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="cart-option">Move To Cart</button>
                    </form>
                </li>
            @endforeach
        </ul>
     @else
        <h2>You have no items Saved For Later.</h2>
    @endif

    <br>
    <br>
    <a href="{{ route('checkout.index') }}" class="btn">Proced to Checkout</a>
@endsection