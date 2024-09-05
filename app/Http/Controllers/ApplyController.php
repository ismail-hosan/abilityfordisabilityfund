<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use App\Models\Apply;
use DB;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{

    public function applicationStore(Request $request)
    {
        //  dd($request->all());

        $this->validate($request, [
            'expectedSalary' => 'required|numeric',
            'company_id' => 'required',
            'job_id' => 'required',
            'user_id' => 'required'
        ]);

        $applyed = new Apply();
        $applyed->expectedSalary = $request->expectedSalary;
        $applyed->company_id = $request->company_id;
        $applyed->job_id = $request->job_id;
        $applyed->user_id = Auth::user()->id;
        $applyed->save();

        $request->session()->flash('message', 'Applied');
        return redirect('jobView/' . $request->job_id);
    }

    public function appliedJobs()
    {
        $userType = auth()->user()->type;
        $userid = auth()->user()->id;

        if ($userType == 1) :
            $applications = Apply::get();
        elseif ($userType == 4) :

            $applications = DB::table('applies')
                ->select('applies.*', 'users.name as userName')
                ->join('users', 'users.id', '=', 'applies.user_id')
                ->where('applies.company_id', $userid)
                ->get();
        endif;

        //  dd($applications);

        return view('admin.pages.job.appliedJobs', get_defined_vars());
    }
}
