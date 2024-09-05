<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AcademicSummarie;
use App\Models\TrainingSummary;
use App\Models\basicInformation;
use App\Models\EmploymentHistory;
use App\Models\Specialization;
use App\Models\LanguageSkill;
use App\Models\Summary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $us_id = Auth::user()->id;
        $user = User::find($us_id);
        $basicInformation = basicInformation::where('user_id', $us_id)->first();
        $divisions = DB::table('divisions')->where('id', $user->divisions)->pluck('name')->first();
        $districts = DB::table('districts')->where('id', $user->district)->pluck('name')->first();
        $thana = DB::table('upazilas')->where('id', $user->thana)->pluck('name')->first();
        $zone = DB::table('zones')->where('id', $user->zone)->pluck('zone')->first();
        $training = TrainingSummary::where('user_id', $us_id)->get();
        $academic = AcademicSummarie::where('user_id', $us_id)->get();
        $employment = EmploymentHistory::where('user_id', $us_id)->get();
        $specialization = Specialization::where('user_id', $us_id)->get();
        $languages = LanguageSkill::where('user_id', $us_id)->get();
        $objective = Summary::where('type', 'CareerObjective')->where('user_id', auth()->id())->first();
        $Summary = Summary::where('type', 'CareerSummary')->where('user_id', auth()->id())->first();
        $qualification = Summary::where('type', 'SpecialQualification')->where('user_id', auth()->id())->first();
        $curricular = Summary::where('type', 'ExtraCurricularActivities')->where('user_id', auth()->id())->first();
        return view('admin.pages.resume.resume', get_defined_vars());
    }

    public function companycvCheck($id)
    {
        $us_id = $id;
        $user = User::find($us_id);
        $basicInformation = basicInformation::where('user_id', $us_id)->first();
        $divisions = DB::table('divisions')->where('id', $user->divisions)->pluck('name')->first();
        $districts = DB::table('districts')->where('id', $user->district)->pluck('name')->first();
        $thana = DB::table('upazilas')->where('id', $user->thana)->pluck('name')->first();
        $zone = DB::table('zones')->where('id', $user->zone)->pluck('zone')->first();
        $training = TrainingSummary::where('user_id', $us_id)->get();
        $academic = AcademicSummarie::where('user_id', $us_id)->get();
        $employment = EmploymentHistory::where('user_id', $us_id)->get();
        $specialization = Specialization::where('user_id', $us_id)->get();
        $languages = LanguageSkill::where('user_id', $us_id)->get();
        return view('admin/pages/resume/resume', get_defined_vars());
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
