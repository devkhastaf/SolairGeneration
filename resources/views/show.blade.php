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
    <div class="container">
        <div class="images">
            <a href="{{ asset('images/1.jpg') }}" v-lightbox>
                <img src="{{ asset('images/1.jpg') }}">
            </a>
            <a href="{{ asset('images/2.jpg') }}" v-lightbox>
                <img src="{{ asset('images/2.jpg') }}">
            </a>
            <a href="{{ asset('images/not_found.jpg') }}" v-lightbox>
                <img src="{{ asset('images/not_found.jpg') }}">
            </a>
            <a href="{{ asset('images/3.jpg') }}" v-lightbox>
                <img src="{{ asset('images/3.jpg') }}">
            </a>
            <lightbox></lightbox>
        </div>
    </div>
    <div class="brands wrapper-wide">
        <h2>Choice by Brand</h2>
        <div class="brands-grid">
            <div class="column">
                <a href="#"><img src="{{ asset('images/brand1.png') }}"></a>
            </div>
            <div class="column">
                <a href="#"><img src="{{ asset('images/brand2.png') }}"></a>
            </div>
            <div class="column">
                <a href="#"><img src="{{ asset('images/brand3.png') }}"></a>
            </div>
            <div class="column">
                <a href="#"><img src="{{ asset('images/brand1.png') }}"></a>
            </div>
            <div class="column">
                <a href="#"><img src="{{ asset('images/brand2.png') }}"></a>
            </div>
            <div class="column">
                <a href="#"><img src="{{ asset('images/brand3.png') }}"></a>
            </div>
        </div>
    </div>
@endsection