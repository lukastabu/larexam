<div class="card">
    <div class="card-header">
        SORT FILTER SEARCH
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="">
                    <form class="" action="{{ route('front-index') }}" method="GET">
                        <label>Sort by</label>
                        <select name="sort">
                            <option value="default" @if ($sort == 'default') selected @endif>Recommended</option>
                            <option value="item-asc" @if ($sort == 'item-asc') selected @endif>Items A-Z</option>
                            <option value="item-desc" @if ($sort == 'item-desc') selected @endif>Items Z-A</option>
                            <option value="group-asc" @if ($sort == 'group-asc') selected @endif>Group A-Z</option>
                            <option value="group-desc" @if ($sort == 'group-desc') selected @endif>Group Z-A</option>
                            <option value="restaurant-asc" @if ($sort == 'restaurant-asc') selected @endif>Restaurant A-Z</option>
                            <option value="restaurant-desc" @if ($sort == 'restaurant-desc') selected @endif>Restaurant Z-A</option>
                        </select>
                        <button class="btn btn-outline-info ml-1" type="submit">Sort</button>
                        <div>
                            <select name="group_id">
                                <option value="0" @if ($filter == 0) selected @endif>All Groups</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}"
                                        @if ($filter == $group->id) selected @endif>{{ $group->title }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-success" type="submit">Filter</button>
                        </div>
                        <a class="btn btn-outline-danger" href="{{ route('front-index') }}">Reset</a>
                    </form>
                </div>
            </div>
        </div>
 
        <form class="" action="{{ route('front-index') }}" method="GET">
            <div class="container">
                <div class="row">
                    <div class="">
                    <label>Search by keyword:</label>
                    <input class="" type="text" name="s" value="{{$s}}"/>
                    </div>
                </div>
                <button class="btn btn-outline-success" type="submit">Find</button>
 
            </div>
        </form>
    </div>
</div>
