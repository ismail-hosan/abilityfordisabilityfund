<?php

namespace App\Http\Controllers;

use App\Models\AcademicSummarie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicSummarieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_education(Request $req)
    {
     $this->validate($req,[
         'level_of_education'=>'required',
         'degree_title'=>'required',
         'institute_name'=>'required',
         'result'=>'required',
         'year_of_passing'=>'required',
     ]);
      $education=new AcademicSummarie();
      $education->user_id=Auth::user()->id;
      $education->level_of_education=$req->level_of_education;
      $education->degree_title=$req->degree_title;
      $education->concentration=$req->concentration;
      $education->board=$req->board;
      $education->institute_name=$req->institute_name;
      $education->result=$req->result;
      $education->cgpa=$req->cgpa;
      $education->scale=$req->scale;
      $education->marks=$req->marks;
      $education->year_of_passing=$req->year_of_passing;
      $education->duration=$req->duration;
      $education->achievement=$req->achievement;
      $education->save();
      $req->session()->flash('successpass', 'Academic Summary add Successfully!');
     return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicSummarie  $academicSummarie
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicSummarie $academicSummarie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicSummarie  $academicSummarie
     * @return \Illuminate\Http\Response
     */
    public function edit_education(Request $req)
    {

     $education=AcademicSummarie::find($req->id);
     $education->level_of_education=$req->level_of_education;
     $education->degree_title=$req->degree_title;
     $education->concentration=$req->concentration;
     $education->board=$req->board;
     $education->institute_name=$req->institute_name;
     $education->result=$req->result;
     $education->cgpa=$req->cgpa;
     $education->scale=$req->scale;
     $education->marks=$req->marks;
     $education->year_of_passing=$req->year_of_passing;
     $education->duration=$req->duration;
     $education->achievement=$req->achievement;
     $education->save();
     $req->session()->flash('successpass', 'Academic Summary Update Successfully!');
    return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicSummarie  $academicSummarie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicSummarie $academicSummarie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicSummarie  $academicSummarie
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicSummarie $academicSummarie)
    {
        //
    }
}
