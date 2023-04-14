<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\AboutHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\AboutHeaderResource;

class AboutHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutheaders = AboutHeaderResource::collection(AboutHeader::all());
        return Inertia::render('Landingpage/AboutHeader/Index', [
            'aboutheaders' => $aboutheaders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Landingpage/AboutHeader/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image'],
            'name' => ['required', 'max:255'],
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('aboutheaders');
            AboutHeader::create([
                'name' => $request->name,
                'subname' => $request->subname,
                'image' => $image,
            ]);

            return Redirect::route('aboutheaders.index')->with('message', 'Header created successfully.');
        }
        return Redirect::back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutHeader $aboutheader)
    {
        return Inertia::render('Landingpage/AboutHeader/Edit', compact('aboutheader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutHeader $aboutheader)
    {
        $image = $aboutheader->image;
        $request->validate([
            'name' => ['required', 'min:3']
        ]);
        if ($request->hasFile('image')) {
            Storage::delete($aboutheader->image);
            $image = $request->file('image')->store('aboutheaders');
        }

        $aboutheader->update([
            'name' => $request->name,
            'image' => $image
        ]);

        return Redirect::route('aboutheaders.index')->with('message', 'Header updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutHeader $aboutheader)
    {
        Storage::delete($aboutheader->image);
        $aboutheader->delete();

        return Redirect::back()->with('message', 'Header deleted successfully.');
    }
}
