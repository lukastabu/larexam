@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Menus</div>
 
                    <div class="card-body list-group">
                        @forelse($groups as $group)
                            <li class="list-group-item">
                                <div class="">
                                    <h3>{{ $group->menu }}</h3>
                                    <br>
                                    <span>Belongs to Restaurant: {{ $group->group_restaurant->title }}</span>
                                </div>
                            </li>
                            @if (Auth::user()->role > 1)
                                <div class="controls controls mb-5">
                                <a class="btn btn-outline-success btn-lg btn-block"
                                    href="{{ route('group-edit', $group) }}">Edit</a>
                                <form class="" action="{{ route('group-delete', $group) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger btn-lg btn-block" type="submit">Delete</button>
                                </form>
                                </div>
                            @endif
 
                        @empty
                            <li class="list-group-item">No Menus - nothing to show :/</li>
                        @endforelse
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
