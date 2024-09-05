<?php

namespace App\Http\Controllers;

use App\Models\Socialmedia;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social=Socialmedia::all()->first();
    return view('admin/pages/social/socialmedia',get_defined_vars());
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
     * @param  \App\Models\Socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function show(Socialmedia $socialmedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function edit(Socialmedia $socialmedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update=Socialmedia::find('1');
        $update->facebook=$request->facebook;
        $update->google=$request->google;
        $update->twitter=$request->twitter;
        $update->instagram=$request->instagram;
        $update->youtube=$request->youtube;
        $update->linkedin=$request->linkedin;
        $update->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Socialmedia  $socialmedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socialmedia $socialmedia)
    {
        //
    }
}
