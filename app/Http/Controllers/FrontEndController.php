<?php

namespace App\Http\Controllers;

use App\Models\FrontEnd;
use App\Models\Rules;
use App\Models\Job;
use App\Models\User;
use App\Models\Apply;
use App\Models\JobCategory;
use App\Models\MemberShow;
use App\Models\Notice;
use App\Models\Project;
use App\Models\Volunteer;
use App\Models\WebGallery;
use App\Models\webVideo;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//namespace App\Http\Controllers\Auth;

class FrontEndController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function seekerlogin(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $urlid = $request->post('urlid');
        if (Auth::attempt($credentials)) {
            return redirect('jobView/' . $urlid);
        } else {
            return redirect('jobView/' . $urlid);
        }
    }

    public function index()
    {
        $image = WebGallery::where('status', 1)->orderBy('id', 'desc')->take(8)->get();
        $video = webVideo::where('status', 1)->orderBy('id', 'desc')->take(10)->get();
        // dd($video);
        $notice = Notice::all();
        $slidersImages = DB::table('sliders')
            ->select('*')
            ->where('status', 1)->where('type', 1)
            ->get();
        //         dd($slidersImages);
        return view('frontend.pages.home', get_defined_vars());
    }

    public function principle()
    {
        return view('frontend.pages.principles', get_defined_vars());
    }

    public function constitution()
    {
        return view('frontend.pages.constitution', get_defined_vars());
    }

    public function contact()
    {
        return view('frontend.pages.contact', get_defined_vars());
    }

    public function sponsor_child()
    {
        return view('frontend.pages.sponsor-child', get_defined_vars());
    }

    //saiful code
    public function memberList()
    {
        // $userDetails
        //     = DB::table('member_show')
        //     ->join('users', 'users.id', '=', 'member_show.member_id')
        //     ->join('payments', 'payments.member_id', '=', 'member_show.member_id')
        //     // ->join('member_categories', 'member_categories.id', '=', 'users.membercategory_id')
        //     ->get(
        //         [
        //             'member_show.*',
        //             'users.id_number',
        //             'users.name',
        //             'users.email',
        //             'users.phone',
        //             'users.blood',
        //             'users.reference',
        //             'users.payment',
        //             // 'users.membercategory_id',
        //             // 'member_categories.title',
        //         ]
        //     );

        $userDetails = MemberShow::all();

        // dd($userDetails);

        return view('frontend.pages.memberList', get_defined_vars());
    }

    public function gallery()
    {

        $galleriImages = DB::table('web_galleries')
            ->join('categories', 'categories.id', '=', 'web_galleries.category')
            ->where('type', 'Gallery')
            ->get();
        // dd( $galleriImages);
        return view('frontend.pages.gallery', get_defined_vars());
    }

    public function OurRules()
    {
        $rulesdetails = DB::table('rules')->first();
        return view('frontend.pages.OurRules', get_defined_vars());
    }

    public function alljob($id)
    {
        $allJobs = DB::table('jobs')
            ->select('jobs.*', 'users.image', 'users.url', 'users.address')
            ->join('users', 'users.id', '=', 'jobs.user_id')
            ->where('jobs.status', 1)
            ->where('jobs.job_type', $id)
            ->get();

        $categorys = JobCategory::where('type', 'job')->get();
        return view('frontend.pages.job', get_defined_vars());
    }
    public function viewcategory()
    {

        $categories = JobCategory::where('type', 'job')->get();

        $length = ceil($categories->count() / 3);
        $chunked = $categories->chunk($length);
        // dd(get_defined_vars());

        // $categories


        return view('frontend.pages.jobcategory', get_defined_vars());
    }

    public function jobView(Request $request, $id)
    {
        if (Auth::check()) {
            $userid = auth()->user()->id;
        } else {
            $userid = 0;
        }
        $JobDetails = DB::table('jobs')
            ->select('jobs.*', 'users.image', 'users.url', 'users.address', 'users.name as comName', 'users.id as comId')
            ->join('users', 'users.id', '=', 'jobs.user_id')
            ->where('jobs.id', $id)
            ->first();

        $applicationinfo = Apply::where([
            'user_id' => $userid,
            'job_id' => $id,
        ])->first();
        // dd($id);
        $urlid = $id;
        return view('frontend.pages.jobView', get_defined_vars());
    }

    public function showproject($slug)
    {

        $project = Project::where('slug',$slug)->first();

        $projects = Project::where('type', 'current')
                   ->where('id', '!=', $project->id)
                   ->get();
        return view('frontend.pages.project_view', get_defined_vars()); 
    }

    public function store(Request $request)
    {
        //
    }

    public function show(FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontEnd $frontEnd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontEnd  $frontEnd
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontEnd $frontEnd)
    {
        //
    }
    public function blood_view()
    {
        return view('frontend.pages.blood');
    }

    public function sponsor()
    {
        return view('frontend.pages.sponsor');
    }
    public function volunteer()
    {
        $volunteer = Volunteer::all();
        return view('frontend.pages.volunteer', get_defined_vars());
    }
    public function waiting()
    {
        return view('frontend.pages.waiting');
    }

    public function donateForm()
    {
        return view('frontend.pages.donate-form');
    }

    public function vision()
    {
        return view('frontend.pages.vision');
    }

    public function executiveCouncil()
    {
        return view('frontend.pages.executive-council');
    }

    // public function program()
    // {
    //     return view('frontend.pages.program');
    // }
    public function project()
    {
        $projects = Project::where('type','current')->get();
        return view('frontend.pages.project', get_defined_vars());
    }

    public function showProgram(){
        return view('frontend.pages.program');
    }

    public function news()
    {
        return view('frontend.pages.news');
    }
}
