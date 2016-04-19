<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;

use Carbon\Carbon;

use App\Project;
use App\Image;

use Auth;
use Session;
use Html;

class ProjectAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest('published_at')->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = Image::latest('created_at')->get();

        return view('admin.projects.create', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = Auth::user()->projects()->create($request->all());

        $image_id = $request->image_id;
        if($image_id) 
        {
            $id = $project->id;
            foreach($image_id as $image)
            {
                $project = new Project;
                $project->id = $id;

                $project = $project->images()->attach($image);
            }
        }

        Session::flash('flash_message', 'Grejt sukces! Projekt utworzony pomyślnie.');
       return redirect('/admin/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        $images = $project->images;

        return view('admin.projects.show', compact('project', 'images'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        $proj_images = $project->images()->get();
        $images = Image::latest('created_at')->get();
        
        return view('admin.projects.edit', compact('project', 'images', 'proj_images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $slug)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        $project->update($request->all());

        $image_id = $request->image_id;
        if($image_id) 
        {
            $project->images()->sync($image_id);
        }

        Session::flash('flash_message', 'Hurra! Edycja pomyślna.');
        return redirect('admin/projects/');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect('/admin/projects');
    }
}
