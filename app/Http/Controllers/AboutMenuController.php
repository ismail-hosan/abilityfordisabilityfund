<?php

namespace App\Http\Controllers;

use App\Models\AboutMenu;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AboutMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fontview($id)
    {
        $pagename = $id;
        $viewpageedit = DB::table('about_menus')->where('menu', $id)->orderBy('orderNo', 'asc')->get();
        //    dd($viewpageedit);
        return view('frontend/pages/adoutpage/aboutindex', get_defined_vars());
    }


    public function index()
    {
        $viewpage = DB::table('categories')
            ->join('about_menus', 'about_menus.menu', '=', 'categories.id')
            ->where('type', 'about')
            ->get();
        // dd($viewpage);
        return view('admin/pages/aboutmenu/indexabout', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = DB::table('categories')->where('type', 'about')->get();
        // dd($Category);
        return view('admin/pages/aboutmenu/addabout', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd($request->all());
        $aboutMenu = new AboutMenu();
        $aboutMenu->menu = $request->menu_id;
        $aboutMenu->content = $request->aboutecontent;
        $aboutMenu->orderNo = $request->order_no;
        $aboutMenu->save();
        return redirect('All-Content');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutMenu  $aboutMenu
     * @return \Illuminate\Http\Response
     */
    public function show(AboutMenu $aboutMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutMenu  $aboutMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);

        $menupage = DB::table('categories')->where('type', 'About')->get();
        $editpagemenu = AboutMenu::find($id);

        // dd($editpage);
        return view('admin/pages/aboutmenu/editabout', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutMenu  $aboutMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updateaboute = AboutMenu::find($request->id);
        $updateaboute->menu = $request->editmenu_id;
        $updateaboute->content = $request->aboutedit;
        $updateaboute->orderNo = $request->order_no;
        $updateaboute->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutMenu  $aboutMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AboutMenu::where('id', $id)->delete();
        return back();
    }
}
