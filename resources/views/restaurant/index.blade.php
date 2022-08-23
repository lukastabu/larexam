@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Restaurants</div>

                    <div class="card-body list-group">
                        @forelse($restaurants as $restaurant)
                            <li class="list-group-item">
                                <div class="">
                                    <h3>Restaurant: {{ $restaurant->title }}</h3>
                                    <br>
                                    <span>Restaurant code: {{ $restaurant->code }}</span>
                                    <br>
                                    <span>Restaurant address: {{ $restaurant->address }}</span>
                                </div>
                            </li>
                            {{-- <a class="btn btn-outline-primary" href="{{ route('restaurant-show', $restaurant->id) }}">Learn more</a> --}}
                            @if (Auth::user()->role > 1)
                                <div class="controls controls mb-5">
                                <a class="btn btn-outline-success btn-lg btn-block"
                                    href="{{ route('restaurant-edit', $restaurant) }}">Edit</a>
                                <form class="" action="{{ route('restaurant-delete', $restaurant) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger btn-lg btn-block" type="submit">Delete</button>
                                </form>
                                </div>
                            @endif

                        @empty
                            <li class="list-group-item">No restaurants - nothing to show :/</li>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
