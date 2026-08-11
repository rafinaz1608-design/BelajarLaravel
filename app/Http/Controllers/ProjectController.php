<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $allProjects = Project::where('id', '!=', $project->id)->take(5)->get();

        return view('project-details', compact('project', 'allProjects'));
    }
}
