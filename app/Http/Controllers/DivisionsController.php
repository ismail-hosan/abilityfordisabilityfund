<?php

namespace App\Http\Controllers;

use App\Models\Divisions;
use App\Models\Rules;
use App\Models\Job;
use App\Models\User;
use App\Models\Apply;
use App\Models\District;
use App\Models\Notice;
use App\Models\Upazila;
use App\Models\WebGallery;
use App\Models\webVideo;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila as ModelsUpazila;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function division_list()
    {

        $user_id = Auth::user()->id;
        $divisions = Division::get();
        // dd($divisions);
        return view('admin/pages/area/divisions/index', get_defined_vars());
    }
    public function district_list()
    {
        $user_id = Auth::user()->id;
        $divisions = Division::get();
        $districts = District::get();

        return view('admin/pages/area/districts/index', get_defined_vars());
    }



    public function create()
    {
        //
    }


    public function division_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $division = new Divisions;
        $division->name = $request->name;
        $division->bn_name = $request->bn_name;
        $division->url = $request->url;
        $division->save();
        return back()->with('success', 'Division Create successfully');
    }

    public function district_store(Request $request)
    {
        $this->validate($request, [
            'division_id' => 'required',
            'name' => 'required',
        ]);
        $district = new District();
        $district->division_id = $request->division_id;
        $district->name = $request->name;
        $district->bn_name = $request->bn_name;
        $district->url = $request->url;
        $district->save();
        return back()->with('success', 'District Create successfully');
    }

    public function district_update(Request $request)
    {
        $this->validate($request, [
            'division_id' => 'required',
            'name' => 'required',
        ]);
        $updateId = $request->updateId;
        $district = District::find($updateId);
        $district->division_id = $request->division_id;
        $district->name = $request->name;
        $district->bn_name = $request->bn_name;
        $district->url = $request->url;
        $district->save();
        return back()->with('success', 'District updated successfully');
    }


    public function division_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $updateId = $request->updateId;
        $division = Divisions::find($updateId);
        $division->name = $request->name;
        $division->bn_name = $request->bn_name;
        $division->url = $request->url;
        $division->save();
        return back()->with('success', 'Division updated successfully');
    }













    public function upazila_list()
    {
        $user_id = Auth::user()->id;
        $districts = District::get();
        $upazilas = upazila::get();

        return view('admin/pages/area/upazila/index', get_defined_vars());
    }
    public function upazila_update(Request $request)
    {
        $this->validate($request, [
            'district_id' => 'required',
            'name' => 'required',
        ]);
        $updateId = $request->updateId;
        $district = Upazila::find($updateId);
        $district->district_id = $request->district_id;
        $district->name = $request->name;
        $district->bn_name = $request->bn_name;
        $district->url = $request->url;
        $district->save();
        return back()->with('success', 'Upazila updated successfully');
    }

    public function upazila_store(Request $request)
    {
        $this->validate($request, [
            'district_id' => 'required',
            'name' => 'required',
        ]);
        $district = new Upazila();
        $district->district_id = $request->district_id;
        $district->name = $request->name;
        $district->bn_name = $request->bn_name;
        $district->url = $request->url;
        $district->save();
        return back()->with('success', 'Upazila Create successfully');
    }
}
