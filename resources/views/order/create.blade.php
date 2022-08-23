@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order this Item</div>
 
                    <div class="card-body">
                        <form action="{{ route('order-store', $item) }}" method="POST">
                        <div class="">
                            <h3>{{ $item->name }}</h3>
                            <span><img src="{{ $item->photo }}"></span>
                            <input type="hidden" name="item_id" value={{ $item->id }}>
                            <br>
                            <span>Ordering from: {{ $item->item_group->group_restaurant->title }}</span>
                            <input type="hidden" name="restaurant_id" value={{ $item->item_group->group_restaurant->id }}>
                            <br>
                            <span>Quantity: <input type="text" name="quantity" value=1>
                        </div>
                            <br><br>
                            @csrf
                            @method('post')
                            <button class="btn btn-outline-success" type="submit">Submit Order</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('front-index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
