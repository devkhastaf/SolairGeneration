@extends('layouts.app')

@section('content')
        <div class="container mx-auto text-center mb-6"><!--Register-->
            <div class="text-2xl text-blue-darkest mb-2 font-semibold">Register</div>
            <div class="border-b-4 border-solid border-blue-darkest w-16 mb-6 text-center inline-block"></div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="text-center mb-4 mt-2">
                    <div class="w-64 py-4 text-center mr-2 bg-blue rounded-full inline-block">
                        <a href="#" class="text-white font-semibold">Log in with Facebook</a>
                    </div>
                    <div class="w-64 py-4 text-center bg-red rounded-full inline-block">
                        <a href="#" class="text-white font-semibold">Log in with Google</a>
                    </div>
                </div>
                <div class="mb-4">
                    <input type="text" class="bg-white h-12 px-4 py-2 text-center text-s font-semibold w-64 rounded-full focus:outline-none focus:border-blue border-2 border-transparent{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-4">
                    <input type="email" class="bg-white text-center h-12 px-4 py-2 text-s font-semibold w-64 rounded-full focus:outline-none focus:border-blue border-2 border-transparent{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-4">
                    <input type="password" class="bg-white text-center h-12 px-4 py-2 text-s font-semibold w-64 rounded-full focus:outline-none focus:border-blue border-2 border-transparent{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-4">
                    <input type="password" name="password_confirmation" required class="bg-white text-center h-12 px-4 py-2 text-s font-semibold w-64 rounded-full focus:outline-none focus:border-blue border-2 border-transparent" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn-blue">Register</button>
                <a href="{{ route('login') }}" class="ml-2 text-blue-darkest font-semibold text-lg hover:text-red-light">Log in</a>
            </form>
            </form><!--End Register-->
@endsection
