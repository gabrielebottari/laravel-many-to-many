<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    public function run()
    {
        $technologies = [
            'Laravel',
            'Vue.js',
            'React',
            'Angular',
            'Django',
            'Flask',
            'Spring Boot',
            'Express.js',
            'Ruby on Rails',
            'ASP.NET'
        ];

        foreach ($technologies as $technology) {
            DB::table('technologies')->insert([
                'name' => $technology,
                'slug' => Str::slug($technology),
            ]);
        }
    }
}