<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = JobCategory::all();
        return  view('admin.pages.job.job_category.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.pages.job.job_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            "category" => "required",
            "type" => "required"
        ]);
        $category = new JobCategory();
        $category->name = $request->category;
        $category->type = $request->type;
        $category->save();

        return redirect('/job-category')->with('success', 'Data Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function show(JobCategory $jobCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req, $id)
    {
        $category = JobCategory::findOrfail($id);
        return view('admin.pages.job.job_category.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "category" => "required",
            "type" => "required"
        ]);

        $category = JobCategory::find($id);
        $category->name = $request->category;
        $category->type = $request->type;
        $category->save();

        return redirect('/job-category')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCategory  $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = JobCategory::find($id);
        $category->delete();

        return redirect('/job-category');
    }
}
