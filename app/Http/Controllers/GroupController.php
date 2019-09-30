<?php

namespace Opencycle\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Opencycle\Country;
use Opencycle\Group;
use Opencycle\Http\Requests\Groups\UpdateGroupRequest;
use Opencycle\Region;

class GroupController extends Controller
{
    /**
     * GroupController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Group::class);
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @param Region $region
     * @param Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country, Region $region, Group $group)
    {
        $posts = $group->posts()->paginate(8);

        return view('groups.show', compact('country', 'region', 'group', 'posts'));
    }

    /**
     * Display a listing of the logged in users groups.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $user = Auth::user();
        $groups = $user->groups()->get();

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGroupRequest $request
     * @param Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->all());

        return redirect()->route('groups.edit', $group)->with('success', 'Edited group');
    }
}
