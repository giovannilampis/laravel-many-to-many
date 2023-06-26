<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Technology;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $projects = Project::all();

        return response()->view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $technologies = Technology::all();

        return response()->view('admin.projects.create', compact('categories', 'technologies'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'title' => 'required|max:20',
            'category_id' => 'integer|exists:categories,id'
            ],
            [
            'title.required' => 'Il campo "Title" deve essere necessariamente riempito',
            'title.max' => 'Bisogna scegliere un titolo composto da non più di 20 caratteri',
            'title.unique' => "Non può essere scelto un titolo già assegnato ad un'altra rivista"
            ]
        );

        dd($request->hasFile('cover_image'));

    
        Project::create($request->all());

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return response()->view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::all();

        return response()->view('admin.projects.edit', compact('project', 'categories'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {   
        $request->validate(
            [
            'title' => 'required|max:20',
            'category_id' => 'integer|exists:categories,id'
            ],
            [
            'title.required' => 'Il campo "Title" deve essere necessariamente riempito',
            'title.max' => 'Bisogna scegliere un titolo composto da non più di 20 caratteri',
            'title.unique' => "Non può essere scelto un titolo già assegnato ad un'altra rivista"
            ]
        );

        $project->update($request->all());

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
