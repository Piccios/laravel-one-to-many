<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projectList = [
            [
                "nome" => "laravel-auth",
                "linguaggio" => "php",
                "url_repository" => "https://github.com/Piccios/laravel-auth",
            ],
            [
                "nome" => "laravel-auth-remplate",
                "linguaggio" => "php",
                "url_repository" => "https://github.com/Piccios/laravel-auth-template",
            ],
            [
                "nome" => "laravel-base-crud",
                "linguaggio" => "php",
                "url_repository" => "https://github.com/Piccios/laravel-base-crud",
            ],
            [
                "nome" => "laravel-migration-seeder",
                "linguaggio" => "php",
                "url_repository" => "https://github.com/Piccios/laravel-migration-seeder",
            ],
            [
                "nome" => "laravel-model-controller",
                "linguaggio" => "php",
                "url_repository" => "https://github.com/Piccios/laravel-model-controller",
            ],
            [
                "nome" => "laravel-comics",
                "linguaggio" => "php",
                "url_repository" => "https://github.com/Piccios/laravel-comics",
            ],
            [
                "nome" => "laravel-scaffolding-template",
                "linguaggio" => "php",
                "url_repository" => "https://github.com/Piccios/laravel-scaffolding-template",
            ],
            [
                "nome" => "php-oop-2",
                "linguaggio" => "php",
                "url_repository" => "https://github.com/Piccios/php-oop-2",
            ],
            [
                "nome" => "php-todo-list-json",
                "linguaggio" => "php",
                "url_repository" => "https://github.com/Piccios/php-todo-list-json",
            ],
            [
                "nome" => "proj-html-vuejs",
                "linguaggio" => "php, Vue, JavaScript",
                "url_repository" => "https://github.com/Piccios/proj-html-vuejs",
            ],
            [
                "nome" => "vite-boolflix",
                "linguaggio" => "Vue",
                "url_repository" => "https://github.com/Piccios/vite-boolflix",
            ],
            [
                "nome" => "vite-yu-gi-oh",
                "linguaggio" => "Vue, JavaScript",
                "url_repository" => "https://github.com/Piccios/vite-yu-gi-oh",
            ],
            [
                "nome" => "vite-comics",
                "linguaggio" =>"Vue, JavaScript",
                "url_repository" => "https://github.com/Piccios/vite-comics",
            ],
            [
                "nome" => "vue-boolzapp",
                "linguaggio" => "Vue",
                "url_repository" => "https://github.com/Piccios/vue-boolzapp",
            ],
        ];
        $types = Type::all();
        $typeMap = [];
        foreach ($types as $type) {
            $typeMap[strtolower($type->name)] = $type->id;
        }

        foreach ($projectList as $project) {
            $newProject = new Project();

            // Se il linguaggio contiene più linguaggi, scegli il primo per la mappatura
            $primaryLanguage = strtolower(explode(", ", $project["linguaggio"])[0]);

            if (isset($typeMap[$primaryLanguage])) {
                $newProject->type_id = $typeMap[$primaryLanguage];
            } else {
                // Gestisci il caso in cui il linguaggio non sia trovato nella mappa
                $newProject->type_id = null;
            }

            $newProject->nome = $project["nome"];
            $newProject->linguaggio = $project["linguaggio"];
            $newProject->url_repository = $project["url_repository"];
            $newProject->save();
        }
    }
}
