<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller

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
        // return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $newProject = new Project($data);
        $newProject->save();

        return redirect()->route('admin.projects.show', ['project' => $newProject->id])->with($newProject->nome . "e' stato creato correttamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view ('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data["nome"] = Auth::nome()->nome;
        $data["date"] = Carbon::now();
        $project->update($data);
        return redirect()->route('admin.projects.show', ['project' => $project->id])->with($project->nome . "e' stato aggiornato correttamente");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route("admin.projects.index");
    }
}
