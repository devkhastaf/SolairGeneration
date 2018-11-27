<div class="bg-white p-4 shadow-md rounded-lg">
    <div class="my-4 text-2xl font-semibold text-blue-darkest">{{ $user->name }}</div>
    <img class="rounded-full w-1/2 h-auto" src="storage/{{ $user->avatar }}">
    <nav>
        <a href="{{ route('users.edit') }}" class="top-nav-item block pb-2 my-2 text-lg">My Profile</a>
        <a href="{{ route('orders.index') }}" class="top-nav-item block pb-2 my-2 text-lg">My Orders</a>
    </nav>
</div>