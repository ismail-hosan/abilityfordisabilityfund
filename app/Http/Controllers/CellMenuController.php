<?php

namespace App\Http\Controllers;

use App\Models\CellMenu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CellMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fontview($id)
    {
        $pagename = $id;
        $viewpageedit = DB::table('cell_menus')->where('menu', $id)->orderBy('orderNo', 'asc')->get();
        //    dd($viewpageedit);
        return view('frontend/pages/adoutpage/cellindex', get_defined_vars());
    }
    public function index()
    {
        $viewpage = DB::table('categories')
            ->join('cell_menus', 'cell_menus.menu', '=', 'categories.id')
            ->where('type', 'Cell')
            ->get();

        return view('admin/pages/cellmenu/indexcell', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = DB::table('categories')->where('type', 'Cell')->get();
        // dd($Category);
        return view('admin/pages/cellmenu/addcell', get_defined_vars());
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
        $cellMenu = new CellMenu();
        $cellMenu->menu = $request->menu_id;
        $cellMenu->content = $request->cellcontent;
        $cellMenu->orderNo = $request->order_no;
        $cellMenu->save();
        return redirect('All-cell');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CellMenu  $cellMenu
     * @return \Illuminate\Http\Response
     */
    public function show(CellMenu $cellMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CellMenu  $cellMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menupage = DB::table('categories')->where('type', 'Cell')->get();
        $editpagemenu = CellMenu::find($id);

        return view('admin/pages/cellmenu/editcell', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CellMenu  $cellMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updatecell = CellMenu::find($request->id);
        $updatecell->menu = $request->editmenu_id;
        $updatecell->content = $request->celledit;
        $updatecell->orderNo = $request->order_no;
        $updatecell->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CellMenu  $cellMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CellMenu::where('id', $id)->delete();
        return back();
    }
}
