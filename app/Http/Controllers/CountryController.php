<?php

namespace Opencycle\Http\Controllers;

use Opencycle\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(5);

        return view('countries.index', compact('countries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Opencycle\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $regions = $country->regions()->paginate(5);

        return view('countries.show', compact('country', 'regions'));
    }
}
