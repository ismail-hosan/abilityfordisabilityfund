<?php

namespace App\Http\Controllers;

use App\Models\memberCategory;
use Illuminate\Http\Request;

class MemberCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showcategory = memberCategory::all();
        return view('admin/pages/membercategory/indexcategory',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/pages/membercategory/addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    dd($request);
       $addmember=new memberCategory();
       $addmember->title=$request->title;
       $addmember->fee=$request->fee;
       $addmember->incentive=$request->incentive;
       $addmember->yearly=$request->annual;
       $addmember->plans_detail=$request->plans_detail;
       $addmember->save();
       return redirect('M-Category');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\memberCategory  $memberCategory
     * @return \Illuminate\Http\Response
     */
    public function show(memberCategory $memberCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\memberCategory  $memberCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update =memberCategory::find($id);
        return view('admin/pages/membercategory/update',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\memberCategory  $memberCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updatecat =memberCategory::find($request->id);
        $updatecat->title=$request->title;
        $updatecat->fee=$request->fee;
        $updatecat->incentive=$request->incentive;
        $updatecat->yearly=$request->annual;
        $updatecat->plans_detail=$request->plans_detail;
        $updatecat->save();
        return redirect('M-Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\memberCategory  $memberCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       memberCategory::where('id',$id)->delete();
       return back()->with('delete','SuccessFully Delete');
    }
    public function status($id,$status)
    {
//  dd($status,$id);
    $statusid='';
    if($status == 1){
        $statusid=0; 
    }elseif($status == 0){
        $statusid=1;
    }

    $satusupd=memberCategory::find($id);
    $satusupd->status=$statusid;
    $satusupd->save();
    return back()->with('status','Status Update Successfull');
    }

}