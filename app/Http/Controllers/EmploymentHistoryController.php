<?php

namespace App\Http\Controllers;

use App\Models\EmploymentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploymentHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function add_employement(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'business' => 'required',
            'experiences' => 'required',
            'designation' => 'required',
            'department' => 'required',
            'location' => 'required',
            'start_period' => 'required',
        ]);
        $employement = new EmploymentHistory();
        $employement->user_id = Auth::user()->id;
        $employement->c_name = $req->name;
        $employement->c_business = $req->business;
        $employement->c_designation = $req->designation;
        $employement->c_department = $req->department;
        $employement->c_experiences = $req->experiences;
        $employement->c_responsibilities = $req->responsibilities;
        $employement->c_location = $req->location;
        $employement->start_period = $req->start_period;
        $employement->end_period = $req->end_period;
        $employement->save();
        $req->session()->flash('successpass', 'Employment History Add Successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmploymentHistory  $employmentHistory
     * @return \Illuminate\Http\Response
     */
    public function edit_employment(Request $req)
    {
        $employement = EmploymentHistory::find($req->id);
        $employement->c_name = $req->name;
        $employement->c_business = $req->business;
        $employement->c_designation = $req->designation;
        $employement->c_department = $req->department;
        $employement->c_experiences = $req->experiences;
        $employement->c_responsibilities = $req->responsibilities;
        $employement->c_location = $req->location;
        $employement->start_period = $req->start_period;
        $employement->end_period = $req->end_period;
        $employement->save();
        $req->session()->flash('successpass', 'Employment History Update Successfully!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmploymentHistory  $employmentHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(EmploymentHistory $employmentHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmploymentHistory  $employmentHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmploymentHistory $employmentHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmploymentHistory  $employmentHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmploymentHistory $employmentHistory)
    {
        //
    }
}
