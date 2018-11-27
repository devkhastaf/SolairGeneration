@extends('layouts.app')

@section('extra-css')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
        <div class="checkout">
        <h1>Checkout Page</h1>
        <div class="left">
            <form action="{{ route('checkout.payWithStripe') }}" method="POST" id="payment-form">
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
                <div>
                    <label for="nameoncard">Name on Card</label>
                    <input type="text" name="nameoncard" id="nameoncard"><br>
                </div>
                <label for="card-element">
                    Credit or debit card
                </label>
                <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
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
                // Create a Stripe client.
                var stripe = Stripe('pk_test_GqkFp0q3wpAJ37oTC9Cfrn5e');

                // Create an instance of Elements.
                var elements = stripe.elements();

                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                    base: {
                        color: '#32325d',
                        lineHeight: '18px',
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                };

                // Create an instance of the card Element.
                var card = elements.create('card', {
                    style: style,
                    hidePostalCode: true
                });

                // Add an instance of the card Element into the `card-element` <div>.
                card.mount('#card-element');

                // Handle real-time validation errors from the card Element.
                card.addEventListener('change', function(event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });

                // Handle form submission.
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    //document.getElementById('#complete-order').disable = true;

                    var options = {
                        name: document.getElementById('name').value,
                        address_line1: document.getElementById('address').value,
                        address_city: document.getElementById('city').value,
                        address_state: document.getElementById('province').value,
                        address_zip: document.getElementById('zipcode').value
                    }
                    stripe.createToken(card, options).then(function(result) {
                        if (result.error) {
                            // Inform the user if there was an error.
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                            document.getElementById('#complete-order').disable = true;
                        } else {
                            // Send the token to your server.
                            stripeTokenHandler(result.token);
                        }
                    });
                });

                function stripeTokenHandler(token) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var form = document.getElementById('payment-form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);

                    // Submit the form
                    form.submit();
                }
            </script>
@endsection