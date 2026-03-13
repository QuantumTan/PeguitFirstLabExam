<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateCharactersRequest;
use App\Http\Requests\EditCharactersRequest;
use App\Models\Characters;


class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Characters::all();

        return view('index', ['characters' => $characters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCharactersRequest $request)
    {
        $validated = $request->validated();
        Characters::create($validated);

        return redirect()->route('index')->with('success', 'Character created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $character = Characters::findOrFail($id);

        return view('edit', ['character' => $character]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditCharactersRequest $request, $id)
    {
        $character = Characters::findOrFail($id);
        $character->update($request->validated());

        $character->save();

        return redirect()->route('index')->with('success', 'Character updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $character = Characters::findOrFail($id);

        $character->delete();

        return redirect()->route('index')->with('success', 'Character deleted successfully.');
    }
}
