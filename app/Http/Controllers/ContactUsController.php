<?php

namespace App\Http\Controllers;

use App\Models\contactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact=contactUs::all()->first();
        // dd($contact);
        return view('admin/pages/contact/addcontactus', get_defined_vars());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
     * @param  \App\Models\contactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(contactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(contactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
        // dd($request->location_map);
        $update=contactUs::find($request->id);
        $update->address_one=$request->address_one;
        $update->address_two=$request->address_two;
        $update->email=$request->email;
        $update->phone=$request->phone;
        $update->fax=$request->fax;
        $update->location_map=$request->location_map;
        $update->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactUs $contactUs)
    {
        //
    }
}
