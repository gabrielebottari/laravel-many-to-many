<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            'Mobile',
            'Web',
            'OS',
            'Games',
            'App',
            'Driver',
            'IA',
            'Software',
            'Machine Learning',
            'Big Data'
        ];

        foreach ($types as $type) {
            DB::table('types')->insert([
                'name' => $type,
                'slug' => Str::slug($type),
            ]);
        }
    }
}