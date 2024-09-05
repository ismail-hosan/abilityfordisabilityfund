<?php

namespace App\Http\Controllers;

use App\Models\JournalAndPublication;
use Illuminate\Http\Request;

class JournalAndPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $publication = JournalAndPublication::all();
        return view('admin/pages/Journalpublications/Journalpublications', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/Journalpublications/addpublications');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $storePublication=new JournalAndPublication();
       $storePublication->title=$request->title;
       $storePublication->description=$request->description;
       $storePublication->save();
       return redirect('Journal-publications');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JournalAndPublication  $journalAndPublication
     * @return \Illuminate\Http\Response
     */
    public function show(JournalAndPublication $journalAndPublication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JournalAndPublication  $journalAndPublication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $editJournal = JournalAndPublication::find($id);
        return view('admin/pages/Journalpublications/editJournal',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JournalAndPublication  $journalAndPublication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update=JournalAndPublication::find($request->id);
        $update->title=$request->title;
        $update->description=$request->description;
        $update->save();
        return redirect('Journal-publications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JournalAndPublication  $journalAndPublication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JournalAndPublication::find($id)->delete();
        return back();
    }
}
