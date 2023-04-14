<?php

namespace App\Http\Controllers;

use App\Models\Hero;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\HeroResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroes = HeroResource::collection(Hero::all());
        return Inertia::render('Landingpage/Heroes/Index', [
            'heroes' => $heroes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Landingpage/Heroes/Create');
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
            $image = $request->file('image')->store('heroes');
            Hero::create([
                'name' => $request->name,
                'subname' => $request->subname,
                'image' => $image,
            ]);

            return Redirect::route('heroes.index')->with('message', 'Hero created successfully.');
        }
        return Redirect::back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hero $hero)
    {
        return Inertia::render('Landingpage/Heroes/Edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hero $hero)
    {
        $image = $hero->image;
        $request->validate([
            'name' => ['required', 'min:3']
        ]);
        if ($request->hasFile('image')) {
            Storage::delete($hero->image);
            $image = $request->file('image')->store('heroes');
        }

        $hero->update([
            'name' => $request->name,
            'image' => $image
        ]);

        return Redirect::route('heroes.index')->with('message', 'Hero updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        Storage::delete($hero->image);
        $hero->delete();

        return Redirect::back()->with('message', 'Hero deleted successfully.');
    }
}
