<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Group;
use App\Models\Item;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
 
        return view('restaurant.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;

        $restaurant->title = $request->title;

        $restaurant->code = $request->code;

        $restaurant->address = $request->address;

        $restaurant->save();

        return redirect()->route('restaurant-index')->with('success', 'New restaurant is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurant.edit', ['restaurant' => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->title = $request->title;

        $restaurant->code = $request->code;

        $restaurant->address = $request->address;

        $restaurant->save();

        return redirect()->route('restaurant-index')->with('success', 'Restaurant is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if($restaurant ->restaurant_group->count())
        {
            return redirect()->route('restaurant-index')->with('deleted', 'This Restaurant has linked Menus - deletion is not allowed');
        }
        $restaurant -> delete();
        return redirect()->back()->with('success', 'Restaurant is deleted ');
    }
}
