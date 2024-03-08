<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;

class ProjectTechnologyTableSeeder extends Seeder
{
    public function run()
    {
    
        $projects = Project::all();
        $technologies = Technology::all()->pluck('id')->toArray();

        
        if ($projects->isEmpty() || empty($technologies)) {
            return;
        }

        // Per ogni progetto, associa alcune tecnologie in modo casuale
        $projects->each(function ($project) use ($technologies) {
            shuffle($technologies); 
            $technologiesForProject = array_slice($technologies, 0, rand(1, count($technologies)));
            $project->technologies()->attach($technologiesForProject); 
        });
    }
}