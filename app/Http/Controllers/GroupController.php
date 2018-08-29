<?php

namespace Opencycle\Http\Controllers;

use Opencycle\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \Opencycle\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $posts = $group->posts()->paginate(5);

        return view('groups.show', compact('posts'));
    }
}
