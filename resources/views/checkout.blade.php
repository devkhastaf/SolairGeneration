@extends('layouts.app')

@section('content')
    <div class="checkout">
        <h1>Checkout Page</h1>
        <div class="left">
            <form action="{{ route('checkout.pay') }}" method="POST" id="payment-form">
                {{ csrf_field() }}
                <h3>Billing Details</h3>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"><br>
                </div>
                <div>
                    <label for="name_on_card">Name on card</label>
                    <input type="text" name="name" id="name"><br>
                </div>
                <div>
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address"><br>
                </div>
                <div>
                    <label for="city">City</label>
                    <input type="text" name="city" id="city"><br>
                </div>
                <div>
                    <label for="province">Province</label>
                    <input type="text" name="province" id="province"><br>
                </div>
                <div>
                    <label for="zipcode">ZIP Code</label>
                    <input type="text" name="zipcode" id="zipcode"><br>
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone"><br>
                </div>
                <h3>Payment Methods</h3>
                <div>
                    <label for="stripe">Stripe</label>
                    <input type="radio" name="stripe" id="stripe">
                </div>
                <div>
                    <label for="paypal">Paypal</label>
                    <input type="radio" name="paypal" id="paypal">
                </div>
                <button type="submit" class="btn" id="complete-order">Complete Order</button>
            </form>
        <div class="right">
            <h2>Your Order</h2>
            <ul>
                @foreach(Cart::content() as $item)
                    <li>{{ $item->model->name }} || {{ presentPrice($item->model->price) }} || {{ $item->qty }}</li>
                @endforeach
            </ul>
            <table>
                <tr style=" border: 1px solid black; padding: 15px;">
                    <td style=" border: 1px solid black; padding: 15px;">Subtotal</td>
                    <td style=" border: 1px solid black; padding: 15px;">{{ presentPrice(Cart::subtotal()) }}</td>
                </tr>
                @if(session()->has('coupon'))
                    <tr style=" border: 1px solid black; padding: 15px;">
                        <td style=" border: 1px solid black; padding: 15px;">
                            Discount ({{ session()->get('coupon')['name'] }})
                            <form method="POST" action="{{ route('coupon.destroy') }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                        <td style=" border: 1px solid black; padding: 15px;">-{{ presentPrice($discount) }}</td>
                    </tr>
                @endif
                <tr style=" border: 1px solid black; padding: 15px;">
                    <td style=" border: 1px solid black; padding: 15px;">New Subtotal</td>
                    <td style=" border: 1px solid black; padding: 15px;">{{ presentPrice($newSubtotal) }}</td>
                </tr>
                <tr style=" border: 1px solid black; padding: 15px;">
                    <td style=" border: 1px solid black; padding: 15px;">Tax (20%)</td>
                    <td style=" border: 1px solid black; padding: 15px;">{{ presentPrice($newTax) }}</td>
                </tr>
                <tr style=" border: 1px solid black; padding: 15px;">
                    <td style=" border: 1px solid black; padding: 15px;"><strong>Total</strong></td>
                    <td style=" border: 1px solid black; padding: 15px;"><strong>{{ presentPrice($newTotal) }}</strong></td>
                </tr>
            </table>
            @if(!session()->has('coupon'))
                <div>
                    <form action="{{ route('coupon.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="coupon_code" placeholder="Coupon code"/>
                        <button type="submit">Apply</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('extra-js')
    <script>

    </script>
    @endsection