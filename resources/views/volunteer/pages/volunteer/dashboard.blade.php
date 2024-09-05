@extends('volunteer.masterTemplate')

{{-- @section('menu-name')
DASHBOARDss
@endsection --}}

@section('main-content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">DASHBOARD</h5>
                </div>
            </div>
        </div>
        <hr class="style18">
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    @php
                        $volunteer = App\Models\VolunteerTerm::where('volunteer_id' , Auth::guard('volunteer')->user()->id)->first();
                    @endphp

                    @if(!$volunteer)
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Join with us as a volunteer</h1>
                            <hr class="mb-5"> 
                            <ul class="nav nav-tabs mb-2 bg-light">
                              <li class="active"><a href="#firsttab" class="btn btn-success mr-5 " data-toggle="tab">Long Term Volunteer</a></li>
                              <li><a href="#secondtab" class="btn btn-success" data-toggle="tab">Short Term Volunteer</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="firsttab">
                                    <div class="card border-primary mb-3">
                                        <div class="card-header bg-light">To be completed only by long term volunteers (more than 3 months)</div>
                                          <div class="card-body text-primary">
                                              <form action="{{ route('longTerm.volunteer.store', Auth::guard('volunteer')->user()->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row"> 
                                                    <input type="hidden" value="long" name="term">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <Label>Position/Department :</Label>
                                                        <input type="text" name="position" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <Label>Extra details :</Label>
                                                        <textarea name="extra_details" id="" cols="30" rows="1" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mt-3">
                                                        <h5 class="font-weight-bold text-uppercase">Work Experince</h5>
                                                        <hr class="font-weight-bold">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <Label>How many years of post-qualification experience do you have ?</Label>
                                                        <input type="number" class="form-control" name="experience_year">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mt-3">
                                                        <h5 class="font-weight-bold text-uppercase">Present/previous employer</h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <Label>Employer Name :</Label>
                                                        <input type="text" class="form-control" name="employer_name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <Label>Employer Address :</Label>
                                                        <input type="text" class="form-control" name="employer_address">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <Label>Job title and main responsibilities :</Label>
                                                        <input type="text" class="form-control" name="job_title">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <Label>Reason for leaving (if already left) :</Label>
                                                        <input type="text" class="form-control" name="reason_for_leaving">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <label for="">Have you worked in your professional capacity in a developing country ? : </label>
                                                        <label for="" class="ml-3">Yes</label>
                                                        <input type="checkbox" name="professional_capacity" class="ml-2" value="1" />
                                                        <label for="" class="ml-3">NO</label>
                                                        <input type="checkbox" name="professional_capacity" class="ml-2" value="2" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <Label>If yes please give details :</Label>
                                                        <textarea name="professional_capacity_details" id="" cols="30" rows="2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mt-3">
                                                        <h5 class="font-weight-bold text-uppercase">Education and training</h5>
                                                        <hr class="font-weight-bold">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <Label>Name and address of institute :</Label>
                                                        <input type="text" class="form-control mb-2" name="institute_name" placeholder="Institute Name">
                                                        <textarea name="institute_address" id="" class="form-control" cols="30" rows="2" placeholder="Institute Address"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <Label>Qualifications and grades achieved (copies of certificates will be required):</Label>
                                                        <input type="file" class="form-control" name="certificates[]" multiple > 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <Label>Attended from :</Label>
                                                        <input type="date" class="form-control" name="attended_from">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <Label>Attended to :</Label>
                                                        <input type="date" class="form-control" name="attended_to">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <Label>Which country are you registered in? </Label>
                                                        <input type="text" class="form-control" name="registered_country">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <Label>Date of full professional qualification :</Label>
                                                        <input type="date" class="form-control" name="qualification">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <Label>Name of professional body :</Label>
                                                        <input type="text" class="form-control" name="professional_body">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <Label>Number and type of registration :</Label>
                                                        <select name="type_of_registration" id="" class="form-control">
                                                            <option value="1">---select---</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <Label>Any other relevant information regarding your qualifacation , experience or availability if necessary :</Label>
                                                        <textarea name="relevant_training" id="" cols="30" rows="2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <Label>Extra curriculam activities/interests/skills :</Label>
                                                        <textarea name="curriculam_activities" id="curriculamActivities" cols="30" rows="1" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <Label>Please state why you are interested in volunteering at ARDRID? :</Label>
                                                        <textarea name="volunteering_at_ardrid" id="" cols="30" rows="2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mt-3">
                                                        <h5 class="font-weight-bold text-uppercase">Name two referees with position, address, and contact number (they will be contacted only in the final stage)</h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row" style="text-decoration: underline;">
                                                    <div class="col-md-6">                
                                                        <h6 class="card-title font-weight-bold"><u> First Referees</u></h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="card-title font-weight-bold"><u> Second Referees </u></h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <Label>First Name :</Label>
                                                        <input type="text" class="form-control" name="first_ref_name">
                                                        <Label>Position  :</Label>
                                                        <input type="text" class="form-control" name="first_ref_position">
                                                        <Label>Organization :</Label>
                                                        <input type="text" class="form-control" name="first_ref_organization">
                                                        <Label>Email :</Label>
                                                        <input type="text" class="form-control" name="first_ref_email">
                                                        <Label>Telephone :</Label>
                                                        <input type="text" class="form-control" name="first_ref_telephone">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <Label>First Name :</Label>
                                                        <input type="text" class="form-control" name="second_ref_name">
                                                        <Label>Position  :</Label>
                                                        <input type="text" class="form-control" name="second_ref_position">
                                                        <Label>Organization :</Label>
                                                        <input type="text" class="form-control" name="second_ref_organization">
                                                        <Label>Email :</Label>
                                                        <input type="text" class="form-control" name="second_ref_email">
                                                        <Label>Telephone :</Label>
                                                        <input type="text" class="form-control" name="second_ref_telephone">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="text-decoration-underline mt-3">
                                                        <h6 class="font-weight-bold text-uppercase "> If you want to elaborate on the above categories, or give any other information , plese do so below :</h6>
                                                      </div>
                                                  </div>
                                                   <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Elaborate</label>
                                                        <textarea name="elaborate" id="" cols="30" rows="2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                  <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                                    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                                                  </div>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                @if(Session::has('error-msg'))
                                    <p class="text-danger">{{ Session::get('error-msg') }}</p>
                                @endif
                                <div class="tab-pane" id="secondtab">
                                    <div class="container">
                                        <div class="card border-primary mb-3">
                                          <div class="card-header bg-light">To be completed only by short term volunteers (3 months or less) </div>
                                            <div class="card-body text-primary">
                                                <form action="{{ route('shortTerm.volunteer.store', Auth::guard('volunteer')->user()->id) }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="hidden" value="short" name="term">
                                                    </div>
                                                  <div class="row">
                                                    <div class="col-md-12">
                                                      <label for="">Is there any particular area/activity in which you would like to volunteer ? </label>
                                                      <input type="text" name="activity_volunteer" class="form-control">
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <Label>Details of Higher Education :</Label>
                                                          <textarea name="higher_education" id="" cols="30" rows="2" class="form-control"></textarea>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <Label>Details of any relevant training :</Label>
                                                          <textarea name="relevant_training" id="" cols="30" rows="2" class="form-control"></textarea>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <Label>Extra curriculam activities/interests/skills :</Label>
                                                          <textarea name="curriculam_activities" id="" cols="30" rows="1" class="form-control"></textarea>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="mt-3">
                                                        <h5 class="font-weight-bold text-uppercase">Name two referees with position, address, and contact number (they will be contacted only in the final stage)</h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row" style="text-decoration: underline;">
                                                    <div class="col-md-6">                
                                                        <h6 class="card-title font-weight-bold"><u> First Referees</u></h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="card-title font-weight-bold"><u> Second Referees </u></h6>
                                                    </div>
                                                </div>
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <Label>First Name :</Label>
                                                          <input type="text" class="form-control" name="first_ref_name">
                                                          <Label>Position  :</Label>
                                                          <input type="text" class="form-control" name="first_ref_position">
                                                          <Label>Organization :</Label>
                                                          <input type="text" class="form-control" name="first_ref_organization">
                                                          <Label>Email :</Label>
                                                          <input type="text" class="form-control" name="first_ref_email">
                                                          <Label>Telephone :</Label>
                                                          <input type="text" class="form-control" name="first_ref_telephone">
                                                      </div>
                                                      <div class="col-md-6">
                                                          <Label>First Name :</Label>
                                                          <input type="text" class="form-control" name="second_ref_name">
                                                          <Label>Position  :</Label>
                                                          <input type="text" class="form-control" name="second_ref_position">
                                                          <Label>Organization :</Label>
                                                          <input type="text" class="form-control" name="second_ref_organization">
                                                          <Label>Email :</Label>
                                                          <input type="text" class="form-control" name="second_ref_email">
                                                          <Label>Telephone :</Label>
                                                          <input type="text" class="form-control" name="second_ref_telephone">
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="text-decoration-underline mt-3">
                                                            <h6 class="font-weight-bold text-uppercase "> If you want to elaborate on the above categories, or give any other information , plese do so below :</h6>
                                                          </div>
                                                      </div>
                                                     <div class="row">
                                                      <div class="col-md-12">
                                                          <textarea name="elaborate" id="" cols="30" rows="2" class="form-control"></textarea>
                                                      </div>
                                                  </div>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                                      <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                                                    </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @else
    
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                @if($volunteer->status ==  'Approved')
                                @include('volunteer.include.congratulation')
                                @else
                                @include('volunteer.include.waiting')
                                @endif
                            </div>
                        </div>
                    @endif

                
                </div>
            </div>
            


            </div>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>

<script>

    $(document).ready(function() {
        $('#curriculamActivities').on('input', function () {
            alert('Working');
        });
    });

    let contactForm = document.getElementById('contactForm');
    contactForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        let name = document.getElementById('name').value;
        let skillList  = document.getElementsByTagName('li');
        let skills = [];
        for (let i = 0; i < skillList.length; i++) {
            skills.push(skillList[i].textContent.trim());
        }
        if (name.length == 00) {
            alert('insert your name')
        } else {
            let formData = {
                name: name,
                skills: skills
            }
            let url = "/employee";
            let result = await axios.post(url, formData);
            if (result.data.success == true) {
                alert('success');
                contactForm.reset();
            } else {
                alert('error')
            }
        }
    });
</script>
@endsection
