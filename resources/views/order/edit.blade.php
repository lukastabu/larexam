@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit this Order</div>
                    <div class="card-body list-group">
                        <div class="">
                            <div class="col-7">
                                <h3>Unique order ID: {{ $order->id }}</h3>
                                <br>
                                <span>Item: {{ $order->order_item->name }}</span>
                                <br>
                                <span>Quantity: {{ $order->quantity }}</span>
                                <br>
                                <span>Restaurant: {{ $order->order_restaurant->title }}</span>
                                <br>
                            </div>
                        </div>
 
                        <form action="{{ route('order-update', $order) }}" method="POST">
                            @csrf
                            @method('put')
                            <label>Order Status:</label>
                            <select name="order_status_admin">
                                @foreach ($statuses as $key => $status)
                                    <option value="{{ $key }}" @if ($key == $order->status) selected @endif>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-success col-5" type="submit">Change Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
