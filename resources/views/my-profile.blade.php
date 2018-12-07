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
                            <div class="pr-4 mb-4">
                                <label class="font-semibold text-blue-darkest" for="name">Name</label>
                                <input class="bg-grey-lighter font-semibold w-full border-balck border-1 border-solid py-2 px-2 my-2" id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name" required autofocus>
                            </div>
                            <div class="pr-4 mb-4">
                                <label class="font-semibold text-blue-darkest" for="email">Email</label>
                                <input class="bg-grey-lighter font-semibold w-full border-balck border-1 border-solid py-2 px-2 my-2" id="email" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                            </div>
                            <div class="pr-4 mb-4">
                                <label class="font-semibold text-blue-darkest" for="password">Password</label>
                                <input class="bg-grey-lighter font-semibold w-full border-balck border-1 border-solid py-2 px-2 my-2" id="password" type="password" name="password" value="" placeholder="Password">
                                <div class="ml-2 text-blue-darkest">Leave password blank to keep current password</div>
                            </div>
                            <div class="pr-4 mb-4">
                                <label class="font-semibold text-blue-darkest" for="password_confirmation">Confirm Password</label>
                                <input class="bg-grey-lighter font-semibold w-full border-balck border-1 border-solid py-2 px-2 my-2" id="password_confirmation" type="password" name="password_confirmation" value="" placeholder="Confirm Password">
                            </div>
                            <div class="my-4">
                                <button type="submit" class="btn-blue">Update profile</button>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <img class="rounded-full border-blue border-1 border-solid" src="storage/{{ $user->avatar }}">
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