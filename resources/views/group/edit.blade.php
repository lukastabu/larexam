@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit this Menu</div>

                    <div class="card-body list-group">
                        <form action="{{ route('group-update', $group) }}" method="POST">
                            <li class="list-group-item">Menu name: <input type="text" name="name"
                                    value={{ $group->menu }} required></li>
                            <li class="list-group-item">To which Restaurant belongs:
                                <select name="restaurant_id">
                                    @foreach ($restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}"
                                            @if ($restaurant->id == $group->restaurant_id) selected @endif>{{ $restaurant->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @csrf
                                @method('put')
                                <button class="btn btn-outline-success" type="submit">Save Changes</button>
                                <a class="btn btn-outline-danger ml-3" href="{{ route('group-index') }}">Cancel</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
