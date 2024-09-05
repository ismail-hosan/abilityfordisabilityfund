<?php

namespace App\Http\Controllers;

use App\Models\TrainingSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Transient;

class TrainingSummaryController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingSummary  $trainingSummary
     * @return \Illuminate\Http\Response
     */
    public function add_training(Request $req)
    {
       $this->validate($req,[
        'title'=>'required',
        'country'=>'required',
        'institute'=>'required',
        'duration'=>'required',
        'year'=>'required',
    ]);
    //   dd($req->all());
     $Training=new TrainingSummary();
     $Training->user_id=Auth::user()->id;
     $Training->title=$req->title;
     $Training->country=$req->country;
     $Training->topics=$req->topics;
     $Training->institute=$req->institute;
     $Training->duration=$req->duration;
     $Training->location=$req->location;
     $Training->year=$req->year;
     $Training->save();
     $req->session()->flash('successpass', 'Training Summary add Successfully!');
    return back();

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingSummary  $trainingSummary
     * @return \Illuminate\Http\Response
     */
    public function edit_training(Request $req)
    {

     $Training=TrainingSummary::find($req->id);
     $Training->user_id=Auth::user()->id;
     $Training->title=$req->title;
     $Training->country=$req->country;
     $Training->topics=$req->topics;
     $Training->institute=$req->institute;
     $Training->duration=$req->duration;
     $Training->location=$req->location;
     $Training->year=$req->year;
     $Training->save();
     $req->session()->flash('successpass', 'Training Summary Update Successfully!');
    return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingSummary  $trainingSummary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingSummary $trainingSummary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingSummary  $trainingSummary
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingSummary $trainingSummary)
    {
        //
    }
}
