<?php

namespace App\Http\Controllers;

use App\Models\basicInformation;
use App\Models\AcademicSummarie;
use App\Models\memberCategory;
use App\Models\TrainingSummary;
use App\Models\Specialization;
use App\Models\LanguageSkill;
use App\Models\EmploymentHistory;
use App\Models\Payment;
use App\Models\Registration;
use App\Models\Summary;
use App\Models\User;
use App\Models\Zone;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Devfaysal\BangladeshGeocode\Models\Division as ModelsDivision;

class RegistrationController extends Controller
{

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = memberCategory::all();
        $membercat = memberCategory::where('status', 1)->get();
        $getzoon = Zone::all();
        $reference = User::Where('payment', '1')->get();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();

        $id_palss = DB::table('users')->where('type', 2)->count();


        if (!empty($id_palss)) {
            $finalValue = $id_palss + 1;
        } else {
            $finalValue = 1;
        }

        $id_number = 'BIEA21' . str_pad($finalValue, 4, '0', STR_PAD_LEFT);

        if (DB::table('users')->where('id_number', $id_number)->count() > 0) {
            $id_number = 'BIEA21' . str_pad($finalValue + 1, 4, '0', STR_PAD_LEFT);
        }
        $id_numbervalue = $id_number;


        return view('frontend.pages.signin', get_defined_vars());
    }


    public function login(){
        return view('frontend.pages.login');
    }



    public function memberDistList(Request $request)
    {
        //rabbi......................................

        $division = $request->input('division');
        $allDistricts = DB::table('districts')->where('division_id', $division)->orderBy('name', 'asc')->get();

        if (!empty($allDistricts)) {
            return view('admin/pages/memberdistlist', get_defined_vars());
        } else {
            echo '<option> No Date Recored</option>';
        }
    }

    public function memberThanaList(Request $request)
    {
        //rabbi......................................


        $district = $request->input('district');
        $allThana = DB::table('upazilas')->where('district_id', $district)->orderBy('name', 'asc')->get();

        if (!empty($allThana)) {
            return view('admin/pages/memberthanalist', get_defined_vars());
        } else {
            echo '<option> No Date Recored</option>';
        }
    }

    public function showDistList(Request $request)
    {
        //rabbi......................................

        $division = $request->input('division');
        $allDistricts = DB::table('districts')->where('division_id', $division)->orderBy('name', 'asc')->get();

        if (!empty($allDistricts)) {
            return view('frontend/pages/showdistload', get_defined_vars());
        } else {
            echo '<option> No Date Recored</option>';
        }
    }

    public function showThanaList(Request $request)
    {
        //rabbi......................................

        $district = $request->input('district');
        $allThana = DB::table('upazilas')->where('district_id', $district)->orderBy('name', 'asc')->get();
        if (!empty($allThana)) {
            return view('frontend/pages/showthanaload', get_defined_vars());
        } else {
            echo '<option> No Date Recored</option>';
        }
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
    public function edit_profile(Request $request)
    {


        //  dd($request->all());

        $userid = auth()->user()->id;
        if (!empty($request->image)) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:500',
            ]);
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $image);
        } else {
            $image = $request->oldImage;
        }

        if (!empty($request->cv)) {
            $request->validate([
                'cv'   => 'required'
            ]);
            $cv = time() . '.' . $request->cv->extension();
            $request->cv->move(public_path('cv'), $cv);
        } else {
            $filePath = $request->oldCv;
        }


        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        $data['dob'] = $request->input('dob');
        $data['gender'] = $request->input('gender');
        $data['blood'] = $request->input('blood');
        $data['membercategory_id'] = $request->input('memberplans');
        $data['image'] = $image;
        if (!empty($request->cv)) {
            $data['cv'] = $cv;
        }
        User::where('id', $userid)->update($data);

        if (empty(basicInformation::where('user_id', $userid)->first())) {
            $userData = new basicInformation();
            $userData->user_id = $userid;
            $userData->father_name = $request->input('father_name');
            $userData->mother_name = $request->input('mother_name');
            $userData->religion = $request->input('religion');
            $userData->marital_status = $request->input('marital_status');
            $userData->nationality = $request->input('nationality');
            $userData->national_id_no = $request->input('national_id_no');
            $userData->passport_number = $request->input('passport_number');
            $userData->passport_issue_date = $request->input('passport_issue_date');
            $userData->save();
        } elseif (!empty(basicInformation::where('user_id', $userid)->first())) {
            $userData['user_id'] = $userid;
            $userData['father_name'] = $request->input('father_name');
            $userData['mother_name'] = $request->input('mother_name');
            $userData['religion'] = $request->input('religion');
            $userData['marital_status'] = $request->input('marital_status');
            $userData['nationality'] = $request->input('nationality');
            $userData['national_id_no'] = $request->input('national_id_no');
            $userData['passport_number'] = $request->input('passport_number');
            $userData['passport_issue_date'] = $request->input('passport_issue_date');
            basicInformation::where('user_id', $userid)->update($userData);
        }
        session()->flash('success', 'User Status Updated Successfully.');

        return redirect('/profile');
    }

    public function edit_job(Request $request)
    {
        $userid = auth()->user()->id;
        $data['company'] = $request->input('company');
        $data['c_designation'] = $request->input('c_designation');
        User::where('id', $userid)->update($data);
        session()->flash('success', 'User Status Updated Successfully.');

        return redirect('/profile');
    }

    public function change_password(Request $request)
    {

        $this->validate($request, [
            'old_pass' => 'required',
            'new_pass' => 'min:6|required|different:password',
            'confirm_password' => 'required',
        ]);

        $userid = Auth::user()->password;
        if (Hash::check($request->old_pass, $userid)) {
            if ($request->new_pass == $request->confirm_password) {

                $newpass['password'] = Hash::make($request->new_pass);
                DB::table('users')->where('id', auth()->user()->id)->update($newpass);
                $request->session()->flash('successpass', 'Password changed Successfully');
                return back();
            } else {
                $request->session()->flash('errorconfirm', 'The password and confirmation password do not match.');
                return back();
            }
        } else {
            $request->session()->flash('errorpass', 'Password does not match');
            return back();
        }
    }

    public function edit_location(Request $request)
    {

        $userid = auth()->user()->id;
        $data['divisions'] = $request->input('divisions');
        $data['district'] = $request->input('district');
        $data['thana'] = $request->input('thana');
        $data['zone'] = $request->input('zone');
        $data['area'] = $request->input('area');
        User::where('id', $userid)->update($data);
        session()->flash('success', 'User Status Updated Successfully.');

        return redirect('/profile');
    }
    public function edit_education(Request $request)
    {
        $userid = auth()->user()->id;
        $data['education'] = $request->input('education');
        $data['e_uv'] = $request->input('e_uv');
        $data['e_year'] = $request->input('e_year');
        User::where('id', $userid)->update($data);
        session()->flash('success', 'User Status Updated Successfully.');

        return redirect('/profile');
    }




    public function store(Request $request)
    {

        
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|numeric|min:8|unique:users,phone',
            // 'id_number' => 'required|unique:users,id_number',
            'email' => 'unique:users,email|required',
            // 'memberplans' => 'required',
            // 'Zone' => 'required',
            // 'divisions' => 'required',
            // 'district' => 'required',
            // 'thana' => 'required',
            'country' => 'required',
            'city' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:confirm_password',
        ]);
        
        // dd($request);

        $id_numbercheck = DB::table('users')->where('id_number', $request->id_number)->count();
        $idadd = "";
        if ($id_numbercheck > 0) {
            $id_palss = DB::table('users')->where('type', 2)->count();
            $finalValue = $id_palss + 2;
            $id_number = 'BIEA21' . str_pad($finalValue, 4, '0', STR_PAD_LEFT);
            $idadd = $id_number;
        } else {
            $idadd = $request->id_number;
        }

        // dd($idadd);

        $registration = new User();
        $registration->name = $request->name;
        $registration->id_number = $idadd;
        $registration->phone = $request->phone;
        $registration->email = $request->email;
        $registration->reference = $request->reference;
        $registration->membercategory_id = $request->memberplans;
        $registration->divisions = $request->divisions;
        $registration->district = $request->district;
        $registration->thana = $request->thana;
        $registration->Zone = $request->Zone;
        $registration->country = $request->country;
        $registration->city = $request->city;
        $registration->designation = "Member";
        $registration->type = 2;
        $registration->password = Hash::make($request->password);
        $registration->save();

        $credentials = $request->only('email', 'password');
        
        //        echo "<pre>";
        //        print_r($credentials);
        //        die;
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin');
        } else {
            die("not login");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }
    public function myCv(Registration $registration)
    {
        $userid = auth()->user()->id;
        $userDetails = User::where('id', $userid)->first();

        return view('admin.pages.myCv', get_defined_vars());
    }

    public function profile()
    {
        $zone = Zone::all();
        $userid = auth()->user()->id;
        $userDetails = User::where('id', $userid)->first();
        $divisions = Division::all();
        $districts = District::where('division_id', $userDetails->divisions)->get();
        $upazilas = Upazila::where('district_id', $userDetails->district)->get();
        $eductationlist = AcademicSummarie::where('user_id', $userid)->get();
        $trainingsummary = TrainingSummary::where('user_id', $userid)->get();
        $employment = EmploymentHistory::where('user_id', $userid)->get();
        $specialization = Specialization::where('user_id', $userid)->get();
        $languageskill = LanguageSkill::where('user_id', $userid)->get();
        $memberplans = memberCategory::all();
        $objective = Summary::where('type', 'CareerObjective')->where('user_id', auth()->id())->first();
        $Summary = Summary::where('type', 'CareerSummary')->where('user_id', auth()->id())->first();
        $qualification = Summary::where('type', 'SpecialQualification')->where('user_id', auth()->id())->first();
        $curricular = Summary::where('type', 'ExtraCurricularActivities')->where('user_id', auth()->id())->first();
        $basicuserDetails = basicInformation::where('user_id', $userid)->first();
        return view('admin.pages.profile', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }

    public function donorHistory(){

        $user = Auth::user();
        $payments = Payment::Where('member_id', $user->id)->get();
        return view('admin.pages.donorHistory', get_defined_vars());
    }
}
