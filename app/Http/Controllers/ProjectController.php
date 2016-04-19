<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Project;
use App\Image;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::latest('published_at')->published()->get();
        
        return view('projects.index', compact('projects', 'images'));
    }

    public function show($slug)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        $images = $project->images;

        return view('projects.show', compact('project', 'images'));
    }
}
