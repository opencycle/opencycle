<?php

namespace Opencycle\Http\Controllers;

use Opencycle\Country;
use Opencycle\Region;

class RegionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @param Region $region
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country, Region $region)
    {
        $groups = $region->groups()->get();

        return view('regions.show', compact('region', 'country', 'groups'));
    }
}
