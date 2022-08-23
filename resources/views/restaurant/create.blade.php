@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Restaurant</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('restaurant-store') }}">
                            <li>Restaurant: <input type="text" name="title" required></li>
                            <li>Restaurant Code: <input type="text" name="code" required></li>
                            <li>Address: <input type="text" name="address" required></li>
                            @csrf
                            <button class="btn btn-outline-success" type="submit">Add Restaurant</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('restaurant-index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
