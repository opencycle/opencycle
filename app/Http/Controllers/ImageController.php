<?php

namespace Opencycle\Http\Controllers;

use Illuminate\Http\Request;
use Opencycle\Image;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('images/' . md5($request->user()->id), 'public');

        $image = new Image([
            'name' => $request->name,
            'path' => $path
        ]);

        $image->save();

        return response()->json([
            'url' => url($path),
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Opencycle\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $this->authorize('delete', $image);

        $image->delete();

        return redirect()->back()->with('success', 'Image has been deleted');
    }
}
