<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Group;
use App\Models\Restaurant;
use DB;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $restaurants = Restaurant::all();
        
        return view('front.index', ['restaurants' => $restaurants]);
    }

    public function show(Request $request, int $rID)
    {
        $restaurants = Restaurant::all();
        $groups = Group::all();
        $items = Item::all();
        $restaurant = Restaurant::where('id', $rID)->first();

        return view('front.show', [
            'restaurants' => $restaurants,
            'restaurant' => $restaurant,
            'groups' => $groups,
            'items' => $items,
            
        ]);
    }
}
