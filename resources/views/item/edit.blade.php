@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit this Dish</div>

                    <div class="card-body list-group">
                        <form action="{{ route('item-update', $item) }}" method="POST">
                            <li class="list-group-item">Dish name: <input type="text" name="name" value={{ $item->name }} required></li>
                            <li class="list-group-item">Dish description: <input type="text" name="description" value={{ $item->description }} required></li>
                            <li class="list-group-item">Link to picture: <input type="text" name="photo" value={{ $item->photo }} required></li>
                            <li class="list-group-item">In which Menu found:
                                <select name="group_id">
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}" @if ($group->id == $item->group_id) selected @endif>{{ $group->menu }} Restaurant: {{ $group->group_restaurant->title }}</option>
                                    @endforeach
                                </select>
                            </li>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success" type="submit">Save Changes</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('item-index') }}">Cancel</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
