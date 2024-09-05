<?php

namespace App\Http\Controllers;

use App\Models\Incentive;
use App\Models\memberCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncentiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = Auth::user()->id;

        $reference = DB::table('users')
            ->join('incentives', 'users.id', '=', 'incentives.user_id')
            ->join('member_categories', 'users.membercategory_id', '=', 'member_categories.id')
            ->orWhere('incentives.user_refer_id', $user_id)
            ->where('payment', 1)
            ->select('users.name', 'member_categories.title', 'incentives.percentage')
            ->get();

        // dd($reference);
        return view('admin/pages/referlist', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function idcard()
    {
        $userid = auth()->user()->id;
        $usertype = Auth()->user()->membercategory_id;
        $memberplans = DB::table('member_categories')->where('id', $usertype)->first();
        //   ->join('users','users.membercategory_id','=','member_categories.id')
        //   ->select('member_categories.title','users.membercategory_id')
        //   ->first();

        // dd($memberplans);
        $userDetails = User::where('id', $userid)->first();

        return view('admin.pages.memberidcard', get_defined_vars());
    }
    public function view()
    {
        $member = DB::table('users')
            ->orWhere('type', 2)
            ->where('reference', null)
            ->select('users.name', 'users.id', 'users.email')
            ->get();

        // dd($member);

        $applypay = DB::table('payments')
            ->select('payments.member_id')
            ->get();

        // dd($applypay);

        $reference = DB::table('users')->Where('payment', '1')->select('id', 'name')->get();

        return view('admin/pages/admin_refer/reference_member', get_defined_vars());
    }


    public function refer_update(Request $request)
    {
        // dd($request->id);
        // dd($request->reference);
        $update_ref = User::find($request->id);
        $update_ref->reference = $request->reference;
        $update_ref->save();
        return back();
    }


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
     * @param  \App\Models\Incentive  $incentive
     * @return \Illuminate\Http\Response
     */
    public function show(Incentive $incentive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incentive  $incentive
     * @return \Illuminate\Http\Response
     */
    public function edit(Incentive $incentive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incentive  $incentive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incentive $incentive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incentive  $incentive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incentive $incentive)
    {
        //
    }
}
