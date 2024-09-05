<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\User;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

class JobController extends Controller
{

    public function emp_signin()
    {
        return view('frontend.pages.job.empsignin', get_defined_vars());
    }

    public function jobs()
    {
        $userId = auth()->user()->id;
        $userType = auth()->user()->type;

        if ($userType == 1) :
            $allJobs = Job::all();
        else :
            $allJobs = DB::table('jobs')
                ->select('users.name as u_name', 'jobs.*')
                ->join('users', 'users.id', '=', 'jobs.user_id')
                ->where('jobs.user_id', $userId)
                ->get();
        endif;

        return view('admin.pages.job.jobs', get_defined_vars());
    }

    public function add_job()
    {
        $allJobs = Job::all();
        $alljobcategorys = JobCategory::where('type', 'job')->get();
        return view('admin.pages.job.addJob', get_defined_vars());
    }

    public function corp_signin()
    {
        return view('frontend.pages.job.corpSignin', get_defined_vars());
    }

    public function emp_signup()
    {
        return view('frontend.pages.job.empsignup', get_defined_vars());
    }

    public function getDistList(Request $request)
    {
        $division = $request->input('division');
        $allDistricts = DB::table('districts')->where('division_id', $division)->orderBy('name', 'asc')->get();

        if (!empty($allDistricts)) {
            return view('frontend.pages.job.distload', get_defined_vars());
        } else {
            echo '<option> No Date Recored</option>';
        }
    }

    public function getDistList2(Request $request)
    {
        $division = $request->input('division');
        $allDistricts = DB::table('districts')->where('division_id', $division)->orderBy('name', 'asc')->get();

        if (!empty($allDistricts)) {
            return view('frontend.pages.job.distload2', get_defined_vars());
        } else {
            echo '<option> No Date Recored</option>';
        }
    }

    public function getThanaList(Request $request)
    {
        $district = $request->input('district');
        $allThana = DB::table('upazilas')->where('district_id', $district)->orderBy('name', 'asc')->get();
        if (!empty($allThana)) {
            return view('frontend.pages.job.thanaLoad', get_defined_vars());
        } else {
            echo '<option> No Date Recored</option>';
        }
    }

    public function corp_signup()
    {
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();

        return view('frontend.pages.job.corpSignup', get_defined_vars());
    }

    public function emp_registration(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|numeric|min:8|unique:users,phone',
            'email' => 'unique:users,email|required',
            'password' => 'min:6|required_with:password_confirmation|same:confirm_password',
        ]);

        $job = new User();
        $job->name = $request->name;
        $job->phone = $request->phone;
        $job->gender = $request->gender;
        $job->email = $request->email;
        $job->designation = "seeker";
        $job->type = 3;
        $job->password = Hash::make($request->password);
        $job->save();
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin');
        } else {
            die("not login");
        }
    }

    public function corp_registration(Request $request)
    {

        //  dd($request->all());

        $this->validate($request, [
            'comp_name' => 'required|max:355',
            //  'phone' => 'required|numeric|min:8|unique:users,phone',
            'establishment' => 'required',
            'address' => 'required',
            'comp_name' => 'required',
            'divisions' => 'required',
            'district' => 'required',
            'thana' => 'required',
            'industry_type' => 'required',
            'trade_license' => 'required',
            'url' => 'required',
            'contact_person' => 'required',
            'contact_designation' => 'required',
            'contact_email' => 'required',
            'contact_person_phone' => 'required',
            'email' => 'unique:users,email|required',
            'password' => 'min:6|required_with:password_confirmation|same:confirm_password',
        ]);

        $job = new User();
        $job->name = $request->comp_name;
        $job->phone = 0;
        $job->email = $request->email;

        $job->establishment = $request->establishment;
        $job->address = $request->address;
        $job->divisions = $request->divisions;
        $job->district = $request->district;
        $job->thana = $request->thana;
        $job->industry_type = $request->industry_type;
        $job->trade_license = $request->trade_license;
        $job->url = $request->url;
        $job->contact_person = $request->contact_person;
        $job->contact_designation = $request->contact_designation;
        $job->contact_email = $request->contact_email;
        $job->contact_person_phone = $request->contact_person_phone;
        $job->designation = "Company";
        $job->type = 4;
        $job->password = Hash::make($request->password);

        //  dd($job);
        $job->save();
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin');
        } else {
            die("not login");
        }
    }

    public function company_profile()
    {
        $userid = auth()->user()->id;
        //$userDetails = User::where('id', $userid)->first();
        $userDetails = DB::table('users')
            ->select('users.*', 'divisions.name as diviName', 'districts.name as distName', 'upazilas.name as thanaName')
            ->join('divisions', 'divisions.id', '=', 'users.divisions')
            ->join('districts', 'districts.id', '=', 'users.district')
            ->join('upazilas', 'upazilas.id', '=', 'users.thana')
            ->where('users.id', $userid)
            ->first();

        return view('admin.pages.job.companyProfile', get_defined_vars());
    }

    public function edit($id)
    {
        $allJobs = Job::find($id);
        $alljobcategorys = JobCategory::where('type', 'job')->get();
        return view('admin.pages.job.editJob', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $userid = auth()->user()->id;
        $this->validate($request, [
            'job_category' => 'required|max:355',
            'job_type' => 'required',
            'job_description' => 'required',
            'number_of_vacancies' => 'required',
            'employee_status' => 'required',
            'application_deadline' => 'required',
        ]);

        $job = Job::find($id);
        $job->job_category = $request->job_category;
        $job->job_type = $request->job_type;
        $job->job_description = $request->job_description;
        $job->number_of_vacancies = $request->number_of_vacancies;
        $job->application_deadline = $request->application_deadline;
        $job->user_id = $userid;
        $job->status = 0;
        $job->employee_status = implode(', ', $request->employee_status);
        $insertValue = $job->save();


        if (isset($insertValue)) :
            session()->flash('success', 'Job Data Inserted Successfully, Please Wait for Admin Approvel.');
            return redirect('/jobs');
        else :
            session()->flash('alert', 'Job Data Inserted Successfully, Please Wait for Admin Approvel.');
            return redirect('/add_job');
        endif;
    }

    public function edit_comp()
    {
        $userid = auth()->user()->id;
        $userDetails = User::where('id', $userid)->first();
        $divisions = Division::all();
        $districts = District::where('division_id', $userDetails->divisions)->get();
        $upazilas = Upazila::where('district_id', $userDetails->district)->get();
        return view('admin.pages.job.editComp', get_defined_vars());
    }

    public function editSave(Request $request)
    {
        // dd($request->all());
        $userid = auth()->user()->id;
        if (!empty($request->image)) {
            $this->validate($request, [
                'name' => 'required|max:355',
                'establishment' => 'required',
                'address' => 'required',
                'divisions' => 'required',
                'district' => 'required',
                'thana' => 'required',
                'industry_type' => 'required',
                'trade_license' => 'required',
                'url' => 'required',
                'contact_person' => 'required',
                'contact_designation' => 'required',
                'contact_email' => 'required',
                'contact_person_phone' => 'required',
            ]);
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $image);
        } else {
            $image = $request->oldImage;
        }

        $data['name'] = $request->name;
        $data['establishment'] = $request->establishment;
        $data['address'] = $request->address;
        $data['divisions'] = $request->divisions;
        $data['district'] = $request->district;
        $data['thana'] = $request->thana;
        $data['industry_type'] = $request->industry_type;
        $data['trade_license'] = $request->trade_license;
        $data['url'] = $request->url;
        $data['contact_person'] = $request->contact_person;
        $data['contact_designation'] = $request->contact_designation;
        $data['contact_email'] = $request->contact_email;
        $data['contact_person_phone'] = $request->contact_person_phone;
        $data['designation'] = "Company";
        $data['type'] = 4;
        $data['image'] = $image;


        User::where('id', $userid)->update($data);

        session()->flash('success', 'Company Data Updated Successfully.');
        return redirect('/Company-profile');
    }

    public function saveJob(Request $request)
    {
        $userid = auth()->user()->id;
        $this->validate($request, [
            'job_category' => 'required|max:355',
            'job_type' => 'required',
            'job_description' => 'required',
            'number_of_vacancies' => 'required',
            'employee_status' => 'required',
            'application_deadline' => 'required',
        ]);

        $job = new Job();
        $job->job_category = $request->job_category;
        $job->job_type = $request->job_type;
        $job->job_description = $request->job_description;
        $job->number_of_vacancies = $request->number_of_vacancies;
        $job->application_deadline = $request->application_deadline;
        $job->user_id = $userid;
        $job->status = 0;
        $job->employee_status = implode(', ', $request->employee_status);
        $insertValue = $job->save();

        // dd($insertValue);

        if (isset($insertValue)) :
            session()->flash('success', 'Job Data Inserted Successfully, Please Wait for Admin Approvel.');
            return redirect('/jobs');
        else :
            session()->flash('alert', 'Job Data Inserted Successfully, Please Wait for Admin Approvel.');
            return redirect('/add_job');
        endif;
    }

    public function Job_Circular()
    {
        $joblist = Job::all();
        return view('admin/pages/job/approvecircular', get_defined_vars());
    }

    public function jobcircular($status, $id)
    {
        //  dd($id);
        $Jobapprove['status'] = $status;
        $Jobapprove['approved_by'] = Auth::user()->name;
        DB::table('jobs')->where('id', $id)->update($Jobapprove);

        $listjob = Job::all();
        return view('admin/pages/job/ajaxapprove', get_defined_vars());
    }

    public function jobpoststatus(request $request)
    {
        $status = $request->status;
        $job_id = $request->job_id;
        // $jobDetails =  DB::table('payments')->where('id', $job_id)->first();
        DB::table('jobs')->where('id', $job_id)
            ->update([
                'status' =>  $status,
                'approved_by' => Auth::user()->name
            ]);
        $listjob = Job::all();

        return view('admin/pages/job/ajaxapprove', get_defined_vars());
    }

    public function jobsearch(Request $request)
    {
        // dd($request->all());
        $allJobs = DB::table('jobs')
            ->select('jobs.*', 'users.image', 'users.url', 'users.address')
            ->join('users', 'users.id', '=', 'jobs.user_id')
            ->where('jobs.status', 1);

        if ($request->category) {
            $allJobs = $allJobs->where('jobs.job_type', $request->category);
        }
        if ($request->title) {
            $allJobs = $allJobs->where('jobs.job_category', 'like', '%' . $request->title . '%');
        }
        $allJobs = $allJobs->get();

        return view('frontend.pages.jobajax', get_defined_vars());
    }
}
