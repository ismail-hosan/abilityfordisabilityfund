<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use App\Models\Payment;
use App\Models\StudentApplication;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AcademicSummarie;
use App\Models\TrainingSummary;
use App\Models\basicInformation;
use App\Models\EmploymentHistory;
use App\Models\Specialization;
use App\Models\LanguageSkill;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $categorys = JobCategory::where('type', 'training')->get();
        $trainings = Training::all();
        return view('frontend.pages.training.index', get_defined_vars());
    }
    public function details($id)
    {
        $trainings = Training::find($id);
        $user = auth()->id();
        $studentadmission = StudentApplication::where('training', $id)->where('user_id', $user)->first();
        $payment = Payment::where('member_id', $user)->where('accept_status', 1)->latest();
        return view('frontend.pages.training.details', get_defined_vars());
    }

    function traininglogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $urlid = $request->post('urlid');
        if (Auth::attempt($credentials)) {
            return back();
        } else {
            return back();
        }
    }
    function admission(Request $request)
    {
        $user = auth()->id();
        $studentadmission = StudentApplication::where('training', $request->trainingID)
            ->where('user_id', $user)
            ->first();

        $message = "You are already applied";
        if (!$studentadmission) {
            $variable = new StudentApplication();
            $variable->training = $request->trainingID;
            $variable->user_id = auth()->id();
            $variable->save();
            $message = "You Are applied successfully";
        }
        $button =  '<button class="btn btn-success" >You are already applied</button>';
        return response()->json(['message' => $message, 'button' => $button]);
    }

    public function viewstudent(Request $request)
    {
        $us_id = $request->id;
        $user = User::find($us_id);
        $basicInformation = basicInformation::where('user_id', $us_id)->first();
        $divisions = DB::table('divisions')->where('id', $user->divisions)->pluck('name')->first();
        $districts = DB::table('districts')->where('id', $user->district)->pluck('name')->first();
        $thana = DB::table('upazilas')->where('id', $user->thana)->pluck('name')->first();
        $zone = DB::table('zones')->where('id', $user->zone)->pluck('zone')->first();
        $training = TrainingSummary::where('user_id', $us_id)->get();
        $academic = AcademicSummarie::where('user_id', $us_id)->get();
        $employment = EmploymentHistory::where('user_id', $us_id)->get();
        $specialization = Specialization::where('user_id', $us_id)->get();
        $languages = LanguageSkill::where('user_id', $us_id)->get();
        return view('admin/pages/resume/resume', get_defined_vars());
    }

    public function trainingType(Request $request)
    {
        $trainings = Training::select('trainings.*');

        if ($request->value) {
            $trainings = $trainings->where('type', $request->value);
        }
        $trainings = $trainings->get();

        return view('frontend.pages.training.trainingajax', get_defined_vars());
    }

    public function trainingsearch(Request $request)
    {
        $trainings = Training::select('trainings.*');
        if ($request->category) {
            $trainings = $trainings->where('trainings.category', $request->category);
        }
        if ($request->title) {
            $trainings = $trainings->where('trainings.title', 'like', '%' . $request->title . '%');
        }
        $trainings = $trainings->get();

        return view('frontend.pages.training.trainingajax', get_defined_vars());
    }

    public function applicationList()
    {
        $studentApplyed = StudentApplication::all();
        return view('admin.pages.training.applicationList', get_defined_vars());
    }
    public function index()
    {
        $training = Training::all();
        return view('admin.pages.training.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caregorys = JobCategory::where('type', 'training')->get();
        return view('admin.pages.training.addtraining', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "category" => "required",
            "type" => "required",
        ]);
        $imagepath = null;
        $training = new Training();
        if ($request->hasFile('img')) {
            $img_ext = $request->file('img')->getClientOriginalExtension();
            $filename = 'training-' . time() . '.' . $img_ext;
            $path = $request->file('img')->move(public_path() . '/images/training', $filename); //image save public folder
            $imagepath = '/images/training/' . $filename;
        }

        $training->techer_name = $request->techer_name;
        $training->title = $request->title;
        $training->description = $request->description;
        $training->category = $request->category;
        $training->type = $request->type;
        $training->image = $imagepath;
        $training->amount = $request->amount;
        $training->date = $request->date;
        $training->save();

        return redirect('/all-training-list')->with('success', 'Data Store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trainings = Training::find($id);
        $caregorys = JobCategory::where('type', 'training')->get();
        // dd(get_defined_vars());
        return view('admin.pages.training.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "category" => "required",
            "type" => "required",
        ]);
        $imagepath = null;
        $training = Training::find($id);
        if ($request->hasFile('img')) {
            $img_ext = $request->file('img')->getClientOriginalExtension();
            $filename = 'training-' . time() . '.' . $img_ext;
            $path = $request->file('img')->move(public_path() . '/images/training', $filename); //image save public folder
            $imagepath = '/images/training/' . $filename;
        }

        $training->techer_name = $request->techer_name;
        $training->title = $request->title;
        $training->description = $request->description;
        $training->category = $request->category;
        $training->type = $request->type;
        if ($request->hasFile('img')) {
            $training->image = $imagepath;
        }
        $training->amount = $request->amount;
        $training->date = $request->date;
        $training->save();

        return redirect('/all-training-list')->with('success', 'Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::find($id);
        $training->delete();
        return redirect('/all-training-list')->with('success', 'Delete successfully');
    }
}
