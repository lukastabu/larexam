@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $restaurant->office }}</h2>
                    </div>

                    <div class="card-body list-group">
                        <li class="list-group-item">
                            <div class="">
                                <h5>Restaurant: {{ $restaurant->title }}</h5>
                                <span>Address: {{ $restaurant->address }}</span>
                            </div>
                        </li>
                        <h3>Interested? Check out our menus and dishes</h3>
                        <li class="list-group-item">
                            <div name="">
                                @foreach ($groups as $group)
                                    @if ($group->restaurant_id == $restaurant->id)
                                        <h3>Menus:</h3>
                                        <div class="">
                                            <h5>{{ $group->menu }}</h5>
                                        </div>
                                        <div class="mt-5">
                                            <h3>Dishes:</h3>
                                            @foreach ($items as $item)
                                                @if ($item->group_id == $group->id)
                                                    <div class="mt-4">
                                                        <h4>{{ $item->name }}</h4>
                                                        <span>Picture: <img src="{{ $item->photo }}"></span>
                                                        <br>
                                                        <span>Description: {{ $item->description }} </span>
                                                        <br>
                                                        <span>In which Menu found: {{ $item->item_group->menu }}</span>
                                                    </div>
                                                    @if (Auth::user()?->role < 1)
                                                        <a class="btn btn-outline-primary " href="{{ route('login') }}">Log in to Order</a>
                                                    @endif
                                                    @if (Auth::user()?->role > 0)
                                                    <a class="btn btn-outline-success ml-1" href="{{ route('order-create', $item->id) }}">Order this</a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    </div>
                    <div class="card-body list-group">
                        <a class="btn btn-outline-warning" href="{{ route('front-index') }}">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
