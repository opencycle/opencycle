<?php

namespace Opencycle\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Opencycle\Country;
use Opencycle\Group;
use Opencycle\Region;

class GroupController extends Controller
{
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
        $posts = $group->posts()->paginate(6);

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
        $groups = $user->groups->paginate(5);

        return view('posts.index', compact('posts', 'groups'));
    }

    /**
     * Makes the current user a member of the specified group.
     *
     * @param Group $group
     * @return \Illuminate\Http\Response
     */
    public function join(Group $group)
    {
        $user = Auth::user();
        $user->groups()->attach($group);

        return redirect()->back()->with('success', 'You have joined this group');
    }
}
