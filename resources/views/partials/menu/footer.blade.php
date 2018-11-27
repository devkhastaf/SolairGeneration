<div class="flex flex-wrap flex-row py-4">
        @foreach($items as $item_menu)
        <div class="flex-1">
                            <div class="font-semibold text-2xl mb-4"><a class="text-white hover:text-red-light" href="#">{{ $item_menu->title }}</a></div>
                            <div class="text-white">
                                <ul class="list-reset">
                                @foreach($item_menu->children as $item)
                                    <a class="text-white text-lg hover:text-red-light" href="{{ $item->link() }}" ><li class="mb-2">{{ $item->title }}</li></a>
                                 @endforeach
                                </ul>
                            </div>
                        </div>
         @endforeach
 </div>