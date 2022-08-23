<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;
use App\Models\Group;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
 
        return view('order.index', [
            'orders' => $orders,
            'statuses' => Order::STATUSES,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, int $iID)
    {
        $item = Item::where('id', $iID)->first();
        $groups = Group::all();
        $restaurants = Restaurant::all();
 
        return view('order.create', [
            'item' => $item,
            'groups' => $groups,
            'restaurants' => $restaurants,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order -> restaurant_id = $request -> restaurant_id;
        $order -> item_id = $request -> item_id;
        $order -> quantity = $request -> quantity;
        $order -> user_id = Auth::user()->id;
       
        $order->save();
 
        return redirect()->route('my-orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function showMyOrders(Order $order)
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
 
        return view('front.myorders', [
            'orders' => $orders,
            'statuses' => Order::STATUSES,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit', [
            'order' => $order,
            'statuses' => Order::STATUSES,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->status = $request->order_status_admin;
        $order->save();
        return redirect()->route('order-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
