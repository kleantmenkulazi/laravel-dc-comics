<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comic;

class DcComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string|url',
            'series' => 'required|string',
            'price' => 'required|min:0|max:100|numeric',
            'type' => 'required|string',
        ]);

        $comic = Comic::create($request->all());


        return redirect()->route('comics.show', ['id' => $comic->id]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::find($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::find($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comic = Comic::find($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string|url',
            'series' => 'required|string',
            'price' => 'required|min:0|max:100|numeric',
            'type' => 'required|string',
        ]);

        $comic->update($request->all());

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::find($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
