<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\Specificity;

class SpecializationController extends Controller
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
    public function add_skill(Request $req)
    {
        $this->validate($req,[
            'skill'=>'required',
            'learnby'=>'required',
        ]);
        $specialization=new Specialization();
        $specialization->user_id=Auth::user()->id;
        $specialization->skill=$req->skill;
        $specialization->learnfrom=$req->learnby;
        $specialization->save();
        $req->session()->flash('successpass', 'Specialization Add Successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function edit_skill(Request $req)
    {
        $specialization=Specialization::find($req->id);
        $specialization->skill=$req->skill;
        $specialization->learnfrom=$req->learnby;
        $specialization->save();
        $req->session()->flash('successpass', 'Specialization Update Successfully!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialization $specialization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialization $specialization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialization $specialization)
    {
        //
    }
}
