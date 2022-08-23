@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Orders</div>

                    <div class="card-body list-group">
                        @forelse($orders as $order)
                            <li class="list-group-item">
                                <div class="">
                                    <h3>Unique order ID: {{ $order->id }}</h3>
                                    <br>
                                    <span>Item: {{ $order->order_item->name }}</span>
                                    <br>
                                    <span>Restaurant: {{ $order->order_restaurant->title }}</span>
                                    <br>
                                    <span>Quantity: {{ $order->quantity }}</span>
                                    <br>
                                    <span>Order Status: {{ $statuses[$order->status] }}</span>
                                </div>
                            </li>
                            <a class="btn btn-outline-primary" href="{{ route('front-index') }}">Back to Restaurants</a>
                        @empty
                            <li class="list-group-item">No orders yet - nothing to show :/</li>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
