<?php

namespace App\Http\Controllers\Admin;

//importazione controller
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use Illuminate\Support\Str;

// Models
use App\Models\Project;
use App\Models\Type;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $types = Type::all();

        return view('admin.projects.create', compact('project', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // La validazione è già avvenuta, quindi possiamo procedere al salvataggio
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail(); // Trova il progetto tramite slug
    
        return view('admin.projects.show', compact('project')); // Passa il singolo progetto alla view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }
  
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // Anche qui, la validazione è avvenuta
        $validated = $request->validated();
        $project->update($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $project->delete();
    
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo!');
    }
}