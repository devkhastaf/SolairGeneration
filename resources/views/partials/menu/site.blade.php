<nav class="lg:w-3/5 lg:text-right">
    @foreach($items as $menu_item)
        <a href="{{ $menu_item->link() }}" class="top-nav-item">{{ $menu_item->title }}</a>
    @endforeach
    @include('partials.search')
    <a href="{{ route('cart.index') }}" class="top-nav-item"><i class="fa fa-shopping-cart" ></i>
        @if (Cart::count() > 0)
            {{ Cart::instance('default')->count() }}
        @endif
    </a>
    <div class="menu_header inline-block top-nav-item border-none ml-10">
        @guest
            <i class="fa fa-user"></i> 
        @else
            <img class="rounded-full w-8 h-8" style="position: absolute; top: 20px; right: 7rem;" src="storage/{{ Auth::user()->avatar }}">
        @endguest    
            <i class="fa fa-chevron-down"></i>
    </div>
        
    <div class="menu_container">
        <ul>
            @guest
                <li><a href="{{ route('login') }}">Log in</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li><a href="{{ route('users.edit') }}">My Profile</a></li>
                <li><a href="{{ route('orders.index') }}">Orders</a></li>
                <li><a href="{{ route('logout') }}" class="btn-red text-center"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Log Out</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </div>
</nav>