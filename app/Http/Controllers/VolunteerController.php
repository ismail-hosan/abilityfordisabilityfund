<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use App\Models\VolunteerTerm;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::all();
        return view('admin.pages.volunteer.all_volunteer')->with(['volunteers' => $volunteers]);
    }

    public function volunteerRequest()
    {
        $volunteerTerm = VolunteerTerm::with('volunteer')->get();
        return view('admin.pages.volunteer.volunteer_request', get_defined_vars());
    }
    public function showVolunteer()
    {
        $volunteerTerm = volunteerTerm::with('volunteer')->first();
        $address = json_decode($volunteerTerm->volunteer->address);
        $reference = json_decode($volunteerTerm->reference);
        return view('admin.pages.volunteer.showVolunteer', get_defined_vars());
    }

    // public function store(Request $request)
    // {
    //     if('password' === 'confirm_password'){

    //     }else{
    //         return back()->with('password_mag', 'Password Dousnot match');
    //     }

    //     Volunteer::create($request->all());
    //     return redirect()->back()->with('mag', 'Your request has been submited');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'phone' => 'required|string',
    //         'email' => 'required|email',
    //         'nid_number' => 'required|string',
    //         'country' => 'required|string',
    //         'city' => 'required|string',
    //         'password' => 'required|string|min:8',
    //         'confirm_password' => 'required|string|same:password',
    //     ]);

    //     $password = $request->input('password');
    //     $confirmPassword = $request->input('confirm_password');

    //     if ($password !== $confirmPassword) {
    //         return with('password_msg', 'Password does not match');
    //     }

    //     Volunteer::create($request->all());
    //     return redirect()->back()->with('success', 'Your request has been submitted');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'nid_number' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',
        ]);

        // Hash the password before storing it
        $hashedPassword = Hash::make($request->input('password'));

        // Replace the plain password with the hashed one
        $request->merge(['password' => $hashedPassword]);


        $volunteer = Volunteer::create($request->only('name', 'phone', 'email', 'nid_number', 'password'));
        $volunteer->address = json_encode($request->except('_token', 'name', 'phone', 'email', 'nid_number', 'password', 'confirm_password'));
        $volunteer->save();
        return redirect()->back()->with('success', 'Your request has been submitted');
    }



    public function status(VolunteerTerm $volunteer)
    {
        $volunteer->update(['status' => 'Approved']);
        return redirect()->back()->with('msg', 'Request Approved');
    }

    public function login()
    {
    }
    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::guard('volunteer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('volunteer')->user()->status == 'Panding') {
                return redirect()->route('volunteer.waiting');
            } else {
                return redirect()->route('volunteer.dashboard');
            }
        } else {
            return 'Wrong Password';
        };
    }


    public function dashboard()
    {
        return view('volunteer.pages.volunteer.dashboard');
    }

    // public function profile(){
    //     $volunteer
    //     return view('volunteer.profile.profile');
    // }

    public function edit($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $address = json_decode($volunteer->address);
        $contact_address = json_decode($volunteer->contact_person_address);
        // dd($contact_address);
        return view('volunteer.profile.profile', get_defined_vars());
    }

    public function update(Request $request, $id)
    {

        $volunteer = Volunteer::findOrFail($id);

        $volunteer->update($request->only('name', 'phone', 'family_name', 'email', 'nid_number', 'fax', 'nationality', 'dob', 'gender', 'partner_name', 'partner_details', 'disabled_person', 'disabled_details', 'contact_person_first_name', 'contact_person_family_name', 'contact_person_email', 'contact_person_telephone', 'contact_person_fax', 'minor_traffice', 'minor_traffice_details', 'about_ardrid', 'extra_details', 'desired_arrival_date', 'desired_departure_date',));

        $volunteer->address = json_encode($request->except('_token', 'name', 'family_name', 'phone', 'email', 'nid_number', 'fax', 'nationality', 'dob', 'gender', 'partner_name', 'partner_details', 'disabled_person', 'disabled_details', 'contact_person_first_name', 'contact_person_family_name', 'contact_person_email', 'contact_person_telephone', 'contact_person_fax', 'contact_person_address', 'minor_traffice', 'minor_traffice_details', 'about_ardrid', 'extra_details', 'desired_arrival_date', 'desired_departure_date'));
        $volunteer->contact_person_address = json_encode($request->only('contact_person_address','contact_person_city','contact_person_zip_code','contact_person_country'));
        $volunteer->save();

        return back()->with('msg', 'Request Approved');
    }

    public function shortTermVolunteerStore(Request $request, $id)
    {


        $volunteerId = $id;

        $shortVolunteer = VolunteerTerm::where('volunteer_id', $volunteerId)->first();

        // If the Short-Term Volunteer record doesn't exist, create a new one
        // if (!$shortVolunteer) {
        // }

        $shortVolunteer = new VolunteerTerm();
        $shortVolunteer->term = 'short';
        $shortVolunteer->volunteer_id = $volunteerId;
        $shortVolunteer->activity_volunteer = $request->input('activity_volunteer');
        $shortVolunteer->higher_education = $request->input('higher_education');
        $shortVolunteer->relevant_training = $request->input('relevant_training');
        $shortVolunteer->elaborate = $request->input('elaborate');
        $shortVolunteer->curriculam_activities = $request->input('curriculam_activities');

        // Save the reference as JSON
        $referenceData = $request->except('_token', 'term', 'curriculam_activities', 'volunteer_id', 'activity_volunteer', 'higher_education', 'relevant_training', 'elaborate');
        $shortVolunteer->reference = json_encode($referenceData);

        // Save the Short-Term Volunteer record
        $shortVolunteer->save();

        return back()->with('msg', 'Request Approved');
    }

    // public function longTermVolunteerStore(Request $request, $id)
    // {

    //     $longVolunteer = VolunteerTerm::where('volunteer_id', $id)->first();

    //     $longVolunteer = new VolunteerTerm;
    //     $longVolunteer->volunteer_id = $id;
    //     $longVolunteer->term = 'long';



    //     $longVolunteer->fill($request->only([
    //         'term', 'volunteer_id', 'position', 'extra_details', 'experience_year', 'employer_name', 'employer_address',
    //         'reason_for_leaving', 'professional_capacity', 'professional_capacity_details', 'institute_name', 'institute_address', 'certificates',
    //         'attended_from', 'attended_to', 'registered_country', 'qualification', 'professional_body',
    //         'type_of_registration',
    //         'first_organization', 'elaborate',
    //     ]));

    //     // Save reference information as JSON
    //     $referenceData = $request->except(
    //         '_token','term','position','extra_details','experience_year','employer_name','employer_address','job_title','reason_for_leaving',
    //         'professional_capacity','professional_capacity_details','institute_name','institute_address',
    //         'certificates','attended_from','attended_to','registered_country',
    //         'qualification','professional_body','type_of_registration','first_organization','elaborate'
    //     );
    //     $longVolunteer->reference = json_encode($referenceData);
    //     $longVolunteer->reference = json_encode($referenceData);

    //     $longVolunteer->save();

    //     return back();
    // }

    public function longTermVolunteerStore(Request $request, $id)
    {
        $longVolunteer = VolunteerTerm::where('volunteer_id', $id)->first();

        // Create a new VolunteerTerm if not found
        if (!$longVolunteer) {
            $longVolunteer = new VolunteerTerm;
            $longVolunteer->volunteer_id = $id;
            $longVolunteer->term = 'long';
        }

        $longVolunteer->fill($request->only([
            'term', 'volunteer_id', 'position', 'extra_details', 'experience_year', 'employer_name', 'employer_address',
            'professional_capacity', 'professional_capacity_details', 'institute_name', 'institute_address',
            'attended_from', 'attended_to', 'registered_country', 'qualification', 'professional_body',
            'type_of_registration', 'first_organization', 'elaborate',
        ]));

        // Save reference information as JSON
        $referenceData = $request->except(
            '_token',
            'term',
            'position',
            'extra_details',
            'experience_year',
            'employer_name',
            'employer_address',
            'job_title',
            'reason_for_leaving',
            'professional_capacity',
            'relevant_training',
            'curriculam_activities',
            'volunteering_at_ardrid',
            'professional_capacity_details',
            'institute_name',
            'institute_address',
            'certificates',
            'attended_from',
            'attended_to',
            'registered_country',
            'qualification',
            'professional_body',
            'type_of_registration',
            'first_organization',
            'elaborate'
        );
        $longVolunteer->reference = json_encode($referenceData);

        $jobData = $request->except(
            '_token',
            'reference',
            'relevant_training',
            'term',
            'position',
            'extra_details',
            'experience_year',
            'employer_name',
            'employer_address',
            'professional_capacity',
            'professional_capacity_details',
            'institute_name',
            'institute_address',
            'certificates',
            'attended_from',
            'attended_to',
            'registered_country',
            'qualification',
            'professional_body',
            'type_of_registration',
            'first_organization',
            'elaborate',
            'curriculam_activities',
            'volunteering_at_ardrid',
            'first_ref_name',
            'first_ref_position',
            'first_ref_organization',
            'first_ref_email',
            'first_ref_telephone',
            'second_ref_name',
            'second_ref_position',
            'second_ref_organization',
            'second_ref_email',
            'second_ref_telephone',
        );

        $longVolunteer->job_info = json_encode($jobData);

        // Upload certificates
        if ($request->hasFile('certificates')) {
            $certificateNames = [];

            foreach ($request->file('certificates') as $certificate) {
                $fileName = time() . "-" . $certificate->getClientOriginalName();
                $certificate->move(public_path('_uploads/'), $fileName);
                $certificateNames[] = $fileName;
            }

            // Save file names as a comma-separated string
            $longVolunteer->certificates = implode(',', $certificateNames);
        }

        $longVolunteer->save();

        return back();
    }
}
