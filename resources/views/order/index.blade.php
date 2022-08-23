@extends('layouts.app')
@section('content')
 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>All Orders</h2>
                    </div>
 
                    <div class="card-body">
 
                        <ul class="list-group">
                            @forelse($orders as $order)
                                <li class="list-group-item">
                                    <div class="">
                                        <div class="col-7">
                                            <h3>Unique order ID: {{ $order->id }}</h3>
                                            <br>
                                            <span>Restaurant: {{ $order->order_restaurant->title }}</span>
                                            <br>
                                            <span>Item: {{ $order->order_item->name }}</span>
                                            <br>
                                            <span>Quantity: {{ $order->quantity }}</span>
                                            <br>
                                            <span>Client ID: {{ $order->user_id }}</span>
                                            <br>
                                            <span>Client Name: {{ $order->orderUserName->name }}</span>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="">
                                        <span><h4>Order Status: {{ $statuses[$order->status] }}<h4></span>
                                        <a class="btn btn-outline-success" href="{{ route('order-edit', $order) }}">Update Status</a>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">Nothing to show :/</li>
                            @endforelse
                        </ul>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
