<?php

namespace App\Http\Controllers\Admin;

//importazione controller
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;

// Models
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;


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
        $technologies= Technology::all();

        return view('admin.projects.create', compact('project', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $validated['image'] = $request->image->store('project-images', 'public');
        }

        // La validazione è già avvenuta, quindi possiamo procedere al salvataggio
        $validated = $request->validated();
    
        // Genera lo slug a partire dal titolo
        $validated['slug'] = Str::slug($validated['title']);
    
        // Rimuovi 'technologies' dall'array validato prima di creare il progetto
        // per evitare errori di colonna inesistente durante la creazione
        $projectData = Arr::except($validated, ['technologies']);
        $project = Project::create($projectData);
    
        // Controlla se sono state selezionate delle tecnologie e associale al progetto
        if (isset($validated['technologies'])) {
            $project->technologies()->sync($validated['technologies']);
        }
    
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
        $technologies= Technology::all();
        $selectedTechnologies = $project->technologies()->pluck('technology_id')->toArray();

        return view('admin.projects.edit', compact('project', 'types','technologies', 'selectedTechnologies'));
    }
  
    public function update(UpdateProjectRequest $request, Project $project)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $validated['image'] = $request->image->store('project-images', 'public');
        }

        // Anche qui, la validazione è avvenuta
        $validated = $request->validated();
        
        // Aggiorna il progetto con i dati validati, escludendo esplicitamente 'technologies'
        // se hai incluso altre logiche di validazione per 'technologies' nella tua Form Request
        $projectData = Arr::except($validated, ['technologies']);
        $project->update($projectData);
        
        // Gestisci l'associazione delle tecnologie, se presenti
        // Se 'technologies' non è presente o è vuoto, 'sync' rimuoverà tutte le associazioni
        $project->technologies()->sync($validated['technologies'] ?? []);
    
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