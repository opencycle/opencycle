<?php

namespace Opencycle\Http\Controllers;

use Opencycle\Group;
use Opencycle\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    /**
     * Search for groups.
     *
     * @param SearchRequest $request
     * @return \Illuminate\Http\Response
     */
    public function search(SearchRequest $request)
    {
        $groups = Group::search($request->query)->get();

        return view('groups.index', compact('groups'));
    }
}
