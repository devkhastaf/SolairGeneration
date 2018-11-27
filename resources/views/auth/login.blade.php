@extends('layouts.app')

@section('extra-css')
    <style>
        .checkbox input {
            display: none;
        }
        .switch {
            vertical-align: middle;
            display: inline-block;
            width: 79px;
            border-radius: 35px;
            overflow: hidden;
            height: 28px;
        }
        .switch .switch-container {
            display: inline-block;
            width: 130px;
            margin-left: -51px;
            height:28px;
        }
        .switch .on, .switch .off {
            float: left;
            display: inline-block;
            background-color: #27ae60;
            width: 50%;
            padding: 4px 0;
            height: 25px;
            text-align: center;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
            position: relative;
            z-index: 1;
        }
        .switch .on {
            border-bottom-left-radius: 35px;
            border-top-left-radius: 35px;
        }
        .switch .off {
            background-color: #e74c3c;
            border-bottom-right-radius: 35px;
            border-top-right-radius: 35px;
        }
        .switch .mid {
            display: inline;
            float: left;
            width:25px;
            height:25px;
            border-radius: 35px;
            background-color: #fff;
            margin-left: -13px;
            margin-right: -13px;
            position: relative;
            z-index: 2;
            border: 5px solid #e74c3c;
        }
        input:checked + .switch-container {
            margin: 0;
        }
        input:checked + .switch-container .mid {
            border-color: #27ae60;
        }
    </style>
@endsection
@section('content')
        <div class="container mx-auto text-center mb-6"><!--Login-->
            <div class="text-2xl text-blue-darkest mb-2 font-semibold">Login</div>
            <div class="border-b-4 border-solid border-blue-darkest w-16 mb-6 text-center inline-block"></div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="text-center mb-4 mt-2">
                    <div class="w-64 py-4 text-center mr-2 sm:mb-4 bg-blue rounded-full inline-block">
                        <a href="{{ route('login.whithProvider', ['provider' => 'facebook']) }}" class="text-white font-semibold">Log in with Facebook</a>
                    </div>
                    <div class="w-64 py-4 text-center sm:mb-4 bg-red rounded-full inline-block">
                        <a href="{{ route('login.whithProvider', ['provider' => 'google']) }}" class="text-white font-semibold">Log in with Google</a>
                    </div>
                </div>
                <div class="mb-4">
                    <input type="email" name="email" class="bg-white h-12 px-4 py-2 text-center text-s font-semibold w-64 rounded-full focus:outline-none focus:border-blue border-2 border-transparent{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="mb-4">
                    <input type="password" name="password" class="bg-white text-center h-12 px-4 py-2 text-s font-semibold w-64 rounded-full focus:outline-none focus:border-blue border-2 border-transparent{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-4 text-center">
                    <label for="remember" class="checkbox">
          <span class="switch">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="switch-container">
              <span class="on">Yes</span>
              <span class="mid"></span>
              <span class="off">No</span>
            </span>
          </span>
                        Remember me
                    </label>
                </div>
                <button type="submit" class="btn-blue">Login</button>
                <a href="{{ route('password.request') }}" class="ml-2   text-blue-darkest font-semibold text-lg hover:text-red-light">Forgot Your Password?</a>
            </form>
            </form><!--End Login-->
        </div>
@endsection
