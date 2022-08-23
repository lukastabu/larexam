@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Restaurants</div>
                    {{-- @include('front.box') --}}

                    <div class="card-body list-group">
                        @forelse($restaurants as $restaurant)
                            <li class="list-group-item">
                                <div class="">
                                    <h3>{{ $restaurant->title }}</h3>
                                    <br>
                                    Address: <span>{{ $restaurant->address }}</span>
                                </div>
                            </li>
                            <a class="btn btn-outline-primary controls mb-5" href="{{ route('front-show', $restaurant->id) }}">See Menu of this Restaurant</a>
                        @empty
                            <li class="list-group-item">Nothing to show :/</li>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
