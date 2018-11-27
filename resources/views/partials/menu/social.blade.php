@foreach($items as $menu_item)
    <a class="text-white text-lg hover:text-orange" href="{{ $menu_item->link() }}"><i class="fa {{ $menu_item->title }}"></i></a>
@endforeach