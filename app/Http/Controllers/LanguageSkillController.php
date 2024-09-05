<?php

namespace App\Http\Controllers;

use App\Models\LanguageSkill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LanguageSkillController extends Controller
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
    public function add_languageskill(Request $req)
    {
    
        $this->validate($req,[
            'language'=>'required',
            'reading'=>'required',
            'writing'=>'required',
            'speaking'=>'required',
        ]);
        $languageskill=new LanguageSkill();
        $languageskill->user_id=Auth::user()->id;
        $languageskill->name=$req->language;
        $languageskill->reading=$req->reading;
        $languageskill->writing=$req->writing;
        $languageskill->speaking=$req->speaking;
        $languageskill->save();
        $req->session()->flash('successpass', 'Language Add Successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LanguageSkill  $languageSkill
     * @return \Illuminate\Http\Response
     */
    public function m_language_edit(Request $req)
    {
        $languageskill=LanguageSkill::find($req->id);
        $languageskill->name=$req->language;
        $languageskill->reading=$req->reading;
        $languageskill->writing=$req->writing;
        $languageskill->speaking=$req->speaking;
        $languageskill->save();
        $req->session()->flash('successpass', 'Language Update Successfully!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LanguageSkill  $languageSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(LanguageSkill $languageSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LanguageSkill  $languageSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LanguageSkill $languageSkill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LanguageSkill  $languageSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(LanguageSkill $languageSkill)
    {
        //
    }
}
