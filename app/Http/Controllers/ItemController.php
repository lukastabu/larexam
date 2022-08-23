<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Group;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index', ['items' => $items]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('item.create', ['groups' => $groups]);
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->name = $request->name;
        $item->group_id = $request->group_id;
        $item->description = $request->description;
        $item->photo = $request->photo;
        $item->save();
        return redirect()->route('item-index')->with('success', 'New item is added');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $groups = Group::all();
        return view('item.edit', [
            'item' => $item,
            'groups' => $groups,
        ]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->name = $request->name;
        $item->group_id = $request->group_id;
        $item->description = $request->description;
        $item->photo = $request->photo;
        $item->save();
        return redirect()->route('item-index')->with('success', 'Item is updated');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back()->with('success', 'Item is deleted');
        }
}
