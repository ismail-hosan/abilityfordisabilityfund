<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMenu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CommitteeMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fontview($id)
    {
        $pagename = $id;
        $viewpageedit = DB::table('committee_menus')->where('menu', $id)->orderBy('orderNo', 'asc')->get();
        //    dd($viewpageedit);
        return view('frontend/pages/adoutpage/committeeindex', get_defined_vars());
    }
    public function index()
    {
        $viewpage = DB::table('categories')
            ->join('committee_menus', 'committee_menus.menu', '=', 'categories.id')
            ->where('type', 'Committee')
            ->get();

        return view('admin/pages/committeemenu/indexcommittee', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = DB::table('categories')->where('type', 'Committee')->get();
        // dd($Category);
        return view('admin/pages/committeemenu/addcommittee', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $committeeMenu = new CommitteeMenu();
        $committeeMenu->menu = $request->menu_id;
        $committeeMenu->content = $request->committeecontent;
        $committeeMenu->orderNo = $request->order_no;
        $committeeMenu->save();
        return redirect('All-committee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommitteeMenu  $committeeMenu
     * @return \Illuminate\Http\Response
     */
    public function show(CommitteeMenu $committeeMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommitteeMenu  $committeeMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menupage = DB::table('categories')->where('type', 'Committee')->get();
        $editpagemenu = CommitteeMenu::find($id);

        return view('admin/pages/committeemenu/editcommittee', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommitteeMenu  $committeeMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $updatecommittee = CommitteeMenu::find($request->id);
        $updatecommittee->menu = $request->editmenu_id;
        $updatecommittee->content = $request->committeeedit;
        $updatecommittee->orderNo = $request->order_no;
        $updatecommittee->save();
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommitteeMenu  $committeeMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CommitteeMenu::where('id', $id)->delete();
        return back();
    }
}
