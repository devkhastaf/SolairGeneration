@extends('layouts.app')

@section('content')
    <h1>Cart</h1>
    <table>
        <tr style=" border: 1px solid black; padding: 15px;">
            <td style=" border: 1px solid black; padding: 15px;">Id</td>
            <td style=" border: 1px solid black; padding: 15px;">Address</td>
            <td style=" border: 1px solid black; padding: 15px;">City</td>
            <td style=" border: 1px solid black; padding: 15px;">Province</td>
            <td style=" border: 1px solid black; padding: 15px;">Potal code</td>
            <td style=" border: 1px solid black; padding: 15px;">Subtotal</td>
            <td style=" border: 1px solid black; padding: 15px;">Tax</td>
            <td style=" border: 1px solid black; padding: 15px;">Total</td>
            <td style=" border: 1px solid black; padding: 15px;">Shipped</td>
        </tr>
        @foreach($orders as $order)
            {{ dd($order->products) }}
            @foreach($order->products() as $product)
                <tr style=" border: 1px solid black; padding: 15px;">
                    <td style=" border: 1px solid black; padding: 15px;">{{ $product->name }}</td>
                    <td style=" border: 1px solid black; padding: 15px;">{{ presentPrice($product->price) }}</td>
                    <td style=" border: 1px solid black; padding: 15px;">{{ $order->shipped }}</td>
                </tr>
            @endforeach
        @endforeach
    </table>
@endsection