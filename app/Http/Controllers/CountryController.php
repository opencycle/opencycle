<?php

namespace Opencycle\Http\Controllers;

use Opencycle\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $countries = Country::all();

        return view('countries.index', compact('countries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Opencycle\Country  $country
     * @return \Illuminate\View\View
     */
    public function show(Country $country)
    {
        $regions = $country->regions()->get();

        return view('countries.show', compact('country', 'regions'));
    }
}
