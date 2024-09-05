<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //rabbi......................................


        $zoneindex = DB::table('zones')
            ->join('divisions', 'zones.division', '=', 'divisions.id')
            ->join('districts', 'zones.district', '=', 'districts.id')
            ->join('upazilas', 'zones.upazila', '=', 'upazilas.id')
            ->select('zones.*', 'divisions.name as divisions', 'districts.name as districts', 'upazilas.name as upazilas')
            ->get();

        // dd($zoneindex);

        return view('admin/pages/zone/zone', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          //rabbi......................................


        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();

        return view('admin/pages/zone/addzone', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //rabbi......................................

        // dd($request);
        $store = new Zone();
        $store->zone = $request->zone;
        $store->division = $request->divisions;
        $store->district = $request->district;
        $store->upazila = $request->thana;
        $store->save();
        return redirect('zone');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        //
    }

    public function zoneDistList(Request $request)
    {
          //rabbi......................................

        $division = $request->input('division');
        $allDistricts = DB::table('districts')->where('division_id', $division)->orderBy('name', 'asc')->get();

        if (!empty($allDistricts)) {
            return view('admin/pages/zone/zonedistload', get_defined_vars());
        } else {
            echo '<option> No Date Recored</option>';
        }
    }

    public function zoneThanaList(Request $request)
    {
          //rabbi......................................

        $district = $request->input('district');
        $allThana = DB::table('upazilas')->where('district_id', $district)->orderBy('name', 'asc')->get();
        if (!empty($allThana)) {
            return view('admin/pages/zone/zonethanaload', get_defined_vars());
        } else {
            echo '<option> No Date Recored</option>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //rabbi......................................


        $zoneedit = Zone::find($id);
        // dd($zoneedit);
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();


        return view('admin/pages/zone/editzone', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
          //rabbi......................................


        // dd($request->id);
       $updatezone=Zone::find($request->id);
       $updatezone->zone = $request->zone;
       $updatezone->division = $request->divisions;
       $updatezone->district = $request->district;
       $updatezone->upazila = $request->thana;
       $updatezone->save();
       return redirect('zone');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          //rabbi......................................

        // dd($id->all());
        $delete = Zone::find($id)->delete();
        return back();
    }
}
