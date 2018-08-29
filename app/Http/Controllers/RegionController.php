<?php

namespace Opencycle\Http\Controllers;

use Opencycle\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \Opencycle\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        $groups = $region->groups()->paginate(5);

        return view('regions.show', compact('groups'));
    }
}
