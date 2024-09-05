<?php

namespace App\Http\Controllers;

use App\Models\Summary;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function objectivestore(Request $request)
    {
        $this->validate($request, [
            'objective' => "required",
        ]);

        Summary::updateOrCreate(
            ['type' => 'CareerObjective', 'user_id' => auth()->id()],
            ['summarie' => $request->objective]
        );
        return back()->with('errorconfirm', 'Data Store Successfully');
    }
    public function summarystore(Request $request)
    {
        $this->validate($request, [
            'Summary' => "required",
        ]);

        Summary::updateOrCreate(
            ['type' => 'CareerSummary', 'user_id' => auth()->id()],
            ['summarie' => $request->Summary]
        );
        return back()->with('errorconfirm', 'Data Store Successfully');
    }

    public function SpecialQualification(Request $request)
    {
        $this->validate($request, [
            'qualification' => "required",
        ]);

        Summary::updateOrCreate(
            ['type' => 'SpecialQualification', 'user_id' => auth()->id()],
            ['summarie' => $request->qualification]
        );
        return back()->with('errorconfirm', 'Data Store Successfully');
    }
    public function curricularstore(Request $request)
    {
        $this->validate($request, [
            'curricular' => "required",
        ]);

        Summary::updateOrCreate(
            ['type' => 'ExtraCurricularActivities', 'user_id' => auth()->id()],
            ['summarie' => $request->curricular]
        );
        return back()->with('errorconfirm', 'Data Store Successfully');
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
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function show(Summary $summary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function edit(Summary $summary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Summary $summary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Summary $summary)
    {
        //
    }
}
