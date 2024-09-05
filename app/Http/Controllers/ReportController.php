<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function allmembers(request $request)
    {
        $allmembers = DB::table('users')
            ->select('users.name as userName', 'users.email as uemail', 'users.phone as uphone', 'users.id as autoid', 'users.payment as upay')
            //->join('users', 'users.id', '=', 'applies.user_id')
            ->where('type', 2)
            ->get();


        //  dd($allmembers);
        return view('admin.reports.allmembers', get_defined_vars());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

    public function details_payment_reprot(Request $request)
    {
        $date = '';
        $from_date = '';
        $to_date = '';
        $member_id = '';

        if ($request->method() == 'POST') {
            $memberDetails = '';

            $datas = explode('-', $request->dateRange);
            $from_date = date('Y-m-d', strtotime($datas[0]));
            $to_date = date('Y-m-d', strtotime($datas[1]));
            $member_id = $request->member_id;
            $memberDetails = DB::table('payments')
                ->join('users', 'users.id', '=', 'payments.member_id')
                ->whereBetween('payments.date', [$from_date, $to_date]);

            if ($member_id != 'all') {
                $memberDetails =   $memberDetails->where('payments.member_id', $member_id);
            }
            $memberDetails =   $memberDetails->get();
            // dd($memberDetails);
        }
        $allmembers = DB::table('users')
            ->select('users.id', 'users.id_number', 'users.name as userName', 'users.email as uemail', 'users.phone as uphone', 'users.id as autoid', 'users.payment as upay')
            ->where('type', 2)
            ->get();

        return view('admin.reports.payment', get_defined_vars());
    }
}
