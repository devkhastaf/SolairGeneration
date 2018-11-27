@extends('layouts.app')

@section('extra-css')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
@endsection

@section('content')
        <div class="checkout">
        <h1>Checkout Page</h1>
        <div class="left">
            <form action="{{ route('checkout.payWithPaypal') }}" method="POST" id="payment-form">
                {{ csrf_field() }}
                <div>
                    <input type="hidden" name="email" id="email" value="{{$info['email']}}"><br>
                </div>
                <div>
                    <input type="hidden" name="name" id="name" value="{{ $info['name'] }}"><br>
                </div>
                <div>
                    <input type="hidden" name="address" id="address" value="{{ $info['address'] }}"><br>
                </div>
                <div>
                    <input type="hidden" name="city" id="city" value="{{ $info['city'] }}"><br>
                </div>
                <div>
                    <input type="hidden" name="province" id="province" value="{{ $info['province'] }}"><br>
                </div>
                <div>
                    <input type="hidden" name="zipcode" id="zipcode" value="{{ $info['zipcode'] }}"><br>
                </div>
                <div>
                    <input type="hidden" name="phone" id="phone" value="{{ $info['phone'] }}"><br>
                </div>
                <h3>Payment Details</h3>
                <div id="paypal-button-container"></div>
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

                    // Render the PayPal button

                    paypal.Button.render({

                        // Set your environment

                        env: 'sandbox', // sandbox | production


                        locale: 'fr_FR',
                        // Specify the style of the button

                        style: {
                            layout: 'vertical',  // horizontal | vertical
                            size:   'medium',    // medium | large | responsive
                            shape:  'rect',      // pill | rect
                            color:  'blue'       // gold | blue | silver | black
                        },

                        // Specify allowed and disallowed funding sources
                        //
                        // Options:
                        // - paypal.FUNDING.CARD
                        // - paypal.FUNDING.CREDIT
                        // - paypal.FUNDING.ELV

                        funding: {
                            allowed: [ paypal.FUNDING.CARD, paypal.FUNDING.CREDIT ],
                            disallowed: [ ]
                        },

                        // PayPal Client IDs - replace with your own
                        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

                        client: {
                            sandbox:    '{{ Config::get('paypal.client_id') }}',
                            // production: '<insert production client id>'
                        },

                        payment: function(data, actions) {
                            return paypal.request({
                                method: 'post',
                                url: '{{ route('checkout.payWithPaypal') }}',
                                json: {
                                    _token: "{{ csrf_token() }}"
                                }
                            }).then(function () {
                                console.log(data.id)
                               return data.id
                            });
                        },

                        onAuthorize: function(data, actions) {
                            return actions.payment.execute().then(function() {
                                window.alert('Payment Complete!');
                            });
                        }

                    }, '#paypal-button-container');

                </script>

@endsection