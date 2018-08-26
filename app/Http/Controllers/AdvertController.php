<?php

namespace OpenCycle\Http\Controllers;

use OpenCycle\Advert;
use OpenCycle\Http\Requests\Adverts\CreateAdvertRequest;
use OpenCycle\Http\Requests\Adverts\UpdateAdvertRequest;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::paginate(5);

        return view('adverts.index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adverts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAdvertRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdvertRequest $request)
    {
        $advert = new Advert($request->all());
        $advert->user()->associate($request->user());
        $advert->save();

        return redirect()->route('adverts.index')->with('success', 'Created new advert');
    }

    /**
     * Display the specified resource.
     *
     * @param  Advert $advert
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        return view('adverts.show', compact('advert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Advert $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        return view('adverts.edit', compact('advert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdvertRequest $request
     * @param Advert $advert
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertRequest $request, Advert $advert)
    {
        $advert->update($request->all());

        return redirect()->route('adverts.index')->with('success', 'Edited advert');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Advert $advert
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Advert $advert)
    {
        $advert->delete();

        return redirect()->route('adverts.index')->with('success', 'Deleted advert');
    }
}
