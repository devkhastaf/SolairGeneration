@extends('layouts.app')

@section('content')
    <div class="container mx-auto"><!--Orders-->
        <div class="grid grid-columns-12 my-6 text-left" style="grid-gap: 1rem;">
            <div class="col-span-2">
                @include('partials.sidenavbar')
            </div>
            <div class="col-span-10 bg-white p-4 shadow-md rounded-lg">
                <div class="my-4 text-2xl font-semibold text-blue-darkest">My Profile</div>
                @include('partials.notification')
                <form action="{{ route('users.update') }}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="grid grid-columns-12 my-6 text-left" style="grid-gap: 2rem;">
                        <div class="col-span-8 border-r-1 border-solid border-blue-darkest">
                            <div>
                                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name" required autofocus>
                            </div>
                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                            </div>
                            <div>
                                <input id="password" type="password" name="password" value="" placeholder="Password">
                                <div>Leave password blank to keep current password</div>
                            </div>
                            <div>
                                <input id="password_confirmation" type="password" name="password_confirmation" value="" placeholder="Confirm Password">
                            </div>
                            <div>
                                <button type="submit" class="btn-blue">Update profile</button>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <img src="storage/{{ $user->avatar }}">
                            <div class="my-4">
                                <input id="avatar" type="file" name="avatar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--End Orders-->
@endsection