<?php

namespace App\Http\Controllers\Guest;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $projects = Project::all();

            return view('guest.projects.index', compact('projects'));
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('guest.projects.show', compact('project'));
    }

    public function welcome()
    {
        $technologies = Technology::all(); // Assicurati che questo corrisponda al tuo modello e alla tabella
        $types = Type::all(); // Lo stesso vale per i tipi
        return view('guest.welcome', compact('technologies', 'types'));
    }

}