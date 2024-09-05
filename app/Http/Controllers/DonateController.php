<?php

namespace App\Http\Controllers;

use App\Models\Doante;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donates = Doante::orderBy('created_at', 'desc')->get();
        return view('admin.pages.donate.index', get_defined_vars());
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
      $donate = New Doante();
      $donate->	first_name = $request->first_name;
      $donate->last_name = $request->last_name;
      $donate->email = $request->email;
      $donate->contact_number = $request->number;
      $donate->sponsor_number = $request->sponsor_number;
      $donate->contribution_type = $request->contribution_type;
      $donate->date = now();
      $donate->save();

      $notification = array(
        'message' => 'Your Donation Data Send Successfully!!',
        'alert-type' => 'success'
        );

      return redirect()->back()->with($notification);
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
        $donates = Doante::find($id);
        return view('admin.pages.donate.edit', get_defined_vars());
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
        $data = Doante::findOrFail($id);
        $data->delete();
        return redirect('/all-donate-list')->with('success', 'Delete successfully');
    }
}
