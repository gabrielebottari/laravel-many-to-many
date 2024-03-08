<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();

        $types = Type::pluck('id'); // Ottiene tutti gli ID dei tipi esistenti.

        // Assicurati che ci siano tipi da associare
        if ($types->isEmpty()) {
            echo "Nessun tipo trovato. Assicurati di eseguire TypeSeeder prima di ProjectSeeder.\n";
            return;
        }

        foreach (range(1, 12) as $index) {
            DB::table('projects')->insert([
                'title' => $faker->sentence(6, true), // Genera un titolo fittizio
                'slug' => Str::slug($faker->unique()->sentence(6, true), '-'), // Genera uno slug univoco
                'image' => $faker->imageUrl(640, 480, 'projects', true), // Genera un URL di immagine fittizio
                'description' => $faker->paragraphs(asText: true), // Genera una descrizione fittizia
                'date' => $faker->date(), // Genera una data fittizia
                'type_id' => $types->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}