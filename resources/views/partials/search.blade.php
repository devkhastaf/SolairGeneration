<div class="mr-4 relative inline-block">
    <form action="{{ route('search') }}" method="get">
        <input type="text" name="query" id="query" value="{{ request()->input('query') }}" class="bg-grey-lighter h-8 px-4 py-2 text-xs w-48 rounded-full focus:outline-none focus:border-blue focus:w-64 transition-slow border-2 border-transparent" placeholder="Search">
        <button type="submit" class="flex items-center absolute pin-r pin-y mr-3 cursor-pointer hover:text-orange focus:outline-none"><i class="fa fa-search" ></i></button>
    </form>
</div>

