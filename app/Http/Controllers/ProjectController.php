<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('oderby', 'asc')->get();
        return view('admin.pages.project.index', get_defined_vars());
    }

    public function create()
    {
        return view('admin.pages.project.create', get_defined_vars());
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            "type" => "required",
            "order_by" => "required",
            "description" => "required",
            "name" => "required",
            "image" => "required",
        ]);

        $project = new Project();
        $project->type = $request->type;
        $project->oderby = $request->order_by;
        $project->name = $request->name;
        $project->slug = Str::slug($request->name, '-');
        if ($request->hasFile('image')) {
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'project-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path('images/project'), $filename);
            $imagepath = '/images/project/' . $filename;
            $project->image = $imagepath;
        } 
        $project->desc = $request->description;
        $project->meta = $request->meta;
        $project->save();

        return redirect('/all-project-list')->with('success', 'Data Store successfully');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.pages.project.edit', get_defined_vars());
    }

    public function update(Request $request,$id)
    {
     
        $this->validate($request, [
            "type" => "required",
            "order_by" => "required",
            "description" => "required",
            "name" => "required",
        ]);
        $project = Project::find($id);
        
        $project->type = $request->type;
        $project->oderby = $request->order_by;
        $project->name = $request->name;
        $project->slug = Str::slug($request->name, '-');
        if ($request->hasFile('image')) {
            $oldImagePath = $project->image;
            $img_ext = $request->file('image')->getClientOriginalExtension();
            $filename = 'project-' . time() . '.' . $img_ext;         
            $path = $request->file('image')->move(public_path('images/project'), $filename);
            $imagepath = '/images/project/' . $filename;
            $project->image = $imagepath;
            $project->save();
            if ($oldImagePath) {
                $fullOldImagePath = public_path($oldImagePath);
                if (file_exists($fullOldImagePath)) {
                    unlink($fullOldImagePath);
                }
            }
        }
        $project->desc = $request->description;
        $project->meta = $request->meta;
        $project->save();

        return redirect('/all-project-list')->with('success', 'Data Updated successfully');
    }


    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        $path = public_path($project->image);
        if (file_exists($path)) {
            @unlink($path);
        }
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
