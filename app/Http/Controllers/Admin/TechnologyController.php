<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;


use App\Models\Technology;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $technologies = Technology::all();

      return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Technology::all();
        return view('admin.technologies.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);
    
        Technology::create($validated);
    
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia creata con successo.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technologies)
    {
        $validated = $request->validated();
    
        $technologies->update($validated);
    
        return redirect()->route('admin.technologies.index',['technology'=>$technologies->slug])->with('success', 'Tecnologia aggiornata con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technologies)
    {
        $technologies->delete();
    
        return redirect()->route('admin.technologies.index')->with('success', 'Tipo eliminato con successo.');
    }
}