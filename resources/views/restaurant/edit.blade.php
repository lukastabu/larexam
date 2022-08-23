@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit this Restaurant</div>

                    <div class="card-body">
                        <form action="{{ route('restaurant-update', $restaurant) }}" method="POST">
                            Restaurant : <input type="text" name="title" value={{ $restaurant->title }}>
                            <br>
                            Restaurant code: <input type="text" name="city" value={{ $restaurant->code }}>
                            <br>
                            Address: <input type="text" name="address" value={{ $restaurant->address }}>
                            <br><br>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success" type="submit">Save Changes</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('restaurant-index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
