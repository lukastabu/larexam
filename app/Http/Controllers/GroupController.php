<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Group;
use App\Models\Item;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('group.index', ['groups' => $groups]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();

        return view('group.create', ['restaurants' => $restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group;
        $group->menu = $request->menu;
        $group->restaurant_id = $request->restaurant_id;
        $group->save();
        return redirect()->route('group-index')->with('success', 'New group is added');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $restaurants = Restaurant::all();
        return view('group.edit', [
            'group' => $group,
            'restaurants' => $restaurants,
        ]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->menu = $request->menu;
        $group->restaurant_id = $request->restaurant_id;
        $group->save();
        return redirect()->route('group-index')->with('success', 'Group is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        if($group->group_item->count())
        {
            return redirect()->route('group-index')->with('deleted', 'This Menu has linked Items - deletion is not allowed');
        }
        $group->delete();
        return redirect()->back()->with('success', 'Group is deleted');
        }
}
