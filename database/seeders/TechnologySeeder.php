<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = ['fa-html5', 'fa-css3-alt', 'fa-square-js', 'fa-vuejs', 'fa-sass', 'fa-php', 'fa-laravel'];

        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->icon = '';
            $new_technology->color = $faker->rgbColor();
            $new_technology->save();
        }
    }
}
