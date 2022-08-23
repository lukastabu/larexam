@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Menu</div>

                    <div class="card-body list-group">
                        <form method="POST" action="{{ route('group-store') }}">
                            <li class="list-group-item">Menu name: <input type="text" name="menu" required></li>
                            <li class="list-group-item">Menu belongs to this Restaurant:
                                <select name="restaurant_id">
                                    @foreach ($restaurants as $restaurant)
                                        <option value="{{ $restaurant->id }}">{{ $restaurant->title }}</option>
                                    @endforeach
                                </select>
                            </li>
                            @csrf
                            <button class="btn btn-outline-success" type="submit">Add Menu</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('group-index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
