<div class="search" >
    <form method="get" action="{{ route('search') }}">
        <input type="text" name="query" id="query" value="{{ request()->input('query') }}" placeholder="Search">
        <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
    </form>
</div>

