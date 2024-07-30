<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $typesName = [
            "Laravel",
            "Back-end",
            "Front-end",
            "PHP",
            "JavaScript",
            "React",
            "Vue",
            "HTML",
        ];
        foreach ($typesName as $typeName) {
            $type = new Type();
            $type-> name = $typeName;
            $type-> color = $faker->unique()->safeHexColor();
            $type->save();

        }
    }
}
