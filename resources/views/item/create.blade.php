@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Dish</div>
 
                    <div class="card-body list-group">
                        <form method="POST" action="{{ route('item-store') }}">
                            <li class="list-group-item">Dish name: <input type="text" name="name" required></li>
                            <li class="list-group-item">Dish description: <input type="text" name="description" required></li>
                            <li class="list-group-item">Link to picture: <input type="text" name="photo" required></li>
                            <li class="list-group-item">In which Menu found:
                                <select name="group_id">
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->menu }} Restaurant: {{ $group->group_restaurant->title }}</option>
                                    @endforeach
                                </select>
                            </li>
                            @csrf
                            <button class="btn btn-outline-success" type="submit">Add Item</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('item-index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
