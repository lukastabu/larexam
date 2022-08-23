@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Dishes</div>
 
                    <div class="card-body list-group">
                        @forelse($items as $item)
                            <li class="list-group-item">
                                <div class="">
                                    <h3>{{ $item->name }}</h3>
                                    <br>
                                    <span>Description: {{ $item->description }}</span>
                                    <br>
                                    <span>Picture: <img src="{{ $item->photo }}"></span>
                                    <br>
                                    <span>In which Menu found: {{ $item->item_group->menu }} Restaurant: {{ $item->item_group->group_restaurant->title }}</span>
                                </div>
                            </li>
                            @if (Auth::user()->role > 1)
                                <div class="controls mb-5">
                                <a class="btn btn-outline-success btn-lg btn-block"
                                    href="{{ route('item-edit', $item) }}">Edit</a>
                                <form class="" action="{{ route('item-delete', $item) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger btn-lg btn-block" type="submit">Delete</button>
                                </form>
                                </div>
                            @endif
 
                        @empty
                            <li class="list-group-item">No Items - nothing to show :/</li>
                        @endforelse
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
