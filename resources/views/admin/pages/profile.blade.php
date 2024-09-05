@extends('admin.masterTemplate')

@section('menu-name')
PROFILE
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">PROFILE</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session()->has('errorconfirm'))
                    <div class="alert alert-success">
                        {{session()->get('errorconfirm')}}
                    </div>
                    @endif
                    @if(session()->has('successpass'))
                    <div class="alert alert-success">
                        {{session()->get('successpass')}}
                    </div>
                    @endif
                    @if(session()->has('errorpass'))
                    <div class="alert alert-danger">
                        {{session()->get('errorpass')}}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#profile"
                                        data-toggle="tab">Profile</a></li>
                                {{-- <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">
                                        Education/Training</a></li>
                                <li class="nav-item"><a class="nav-link" href="#employment" data-toggle="tab">
                                        Employment History</a></li>
                                <li class="nav-item"><a class="nav-link" href="#otherinformation" data-toggle="tab">
                                        Other Information</a></li>
                                <li class="nav-item"><a class="nav-link" href="#location" data-toggle="tab">Location</a> --}}
                                <li class="nav-item bg-warning ml-3"><a class="nav-link" href="#password"
                                        data-toggle="tab">Change Password</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="profile">

                                    <div class="text-center">
                                        @if(!empty($userDetails->image))
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('/images/' . $userDetails->image)}}"
                                            alt="User profile picture">
                                        @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('/memeberImage/noimage.png')}}" alt="User profile picture">
                                        @endif
                                    </div>
                                    <br>
                                    <form class="form-horizontal" method="post" action="{{ route('edit-profile')}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Full Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="name" value="{{ $userDetails->name }}"
                                                    class="form-control" id="">
                                            </div>
                                            <label for="inputName" class="col-sm-2 col-form-label">Email / User
                                                Name</label>
                                            <div class="col-sm-4">
                                                <input type="email" name="email" value="{{ $userDetails->email }}"
                                                    class="form-control" id="">
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- WOrking -->
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Father's Name*</label>
                                            <div class="col-sm-4">
                                                <input type="text" required="" name="father_name" value="<?php if (!empty($basicuserDetails->father_name)) {echo $basicuserDetails->father_name;} ?>"
                                                    class="form-control">
                                            </div>
                                            <label for="inputName" class="col-sm-2 col-form-label">Mother's Name
                                                *</label>
                                            <div class="col-sm-4">
                                                <div class="input-group date" required="" data-target-input="nearest">
                                                    <input required="" type="text" name="mother_name"
                                                        class="form-control"
                                                        value="<?php if (!empty($basicuserDetails->mother_name)) {echo $basicuserDetails->mother_name; } ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Gender</label>
                                            <div class="col-sm-4">
                                                <div class="input-group date">
                                                    <select class="form-control inline-block" name="gender">
                                                        <option {{ ($userDetails->gender== 0)? 'selected':'' }}
                                                            value="0" selected="">Select</option>
                                                        <option {{ ($userDetails->gender== 'M')? 'selected':'' }}
                                                            value="M">Male</option>
                                                        <option {{ ($userDetails->gender== 'F')? 'selected':'' }}
                                                            value="F">Female</option>
                                                        <option {{ ($userDetails->gender== 'O')? 'selected':'' }}
                                                            value="O">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <label for="inputName" class="col-sm-2 col-form-label">Date of Birth</label>
                                            <div class="col-sm-4">
                                                <div class="input-group date" id="reservationdate"
                                                    data-target-input="nearest">
                                                    <input required="" type="text" name="dob"
                                                        class="form-control datetimepicker-input"
                                                        value="{{ $userDetails->dob }}" data-target="#reservationdate">
                                                    <div class="input-group-append" data-target="#reservationdate"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="inputName" required="" class="col-sm-2 col-form-label">Religion
                                                *</label>
                                            <div class="col-sm-4">

                                                <div class="input-group date">
                                                    <select class="form-control inline-block" name="religion">
                                                        <option value="0">Select </option>
                                                        <option @if (!empty($basicuserDetails->religion) &&
                                                            $basicuserDetails->religion == 'Islam' ) selected='' @endif
                                                            value="Islam">Islam</option>
                                                        <option @if (!empty($basicuserDetails->religion) &&
                                                            $basicuserDetails->religion == 'Buddhism' ) selected=''
                                                            @endif
                                                            value="Buddhism">Buddhism</option>
                                                        <option @if (!empty($basicuserDetails->religion) &&
                                                            $basicuserDetails->religion == 'Christianity' ) selected=''
                                                            @endif value="Christianity">Christianity</option>
                                                        <option @if (!empty($basicuserDetails->religion) &&
                                                            $basicuserDetails->religion == 'Sikhism' ) selected=''
                                                            @endif value="Sikhism">Sikhism</option>
                                                        <option @if (!empty($basicuserDetails->religion) &&
                                                            $basicuserDetails->religion == 'Jainism' ) selected=''
                                                            @endif value="Jainism">Jainism</option>
                                                        <option @if (!empty($basicuserDetails->religion) &&
                                                            $basicuserDetails->religion == 'Hinduism' ) selected=''
                                                            @endif value="Hinduism">Hinduism</option>
                                                        <option @if (!empty($basicuserDetails->religion) &&
                                                            $basicuserDetails->religion == 'Judaism' ) selected=''
                                                            @endif value="Judaism">Judaism</option>
                                                        <option @if (!empty($basicuserDetails->religion) &&
                                                            $basicuserDetails->religion == 'Others' ) selected='' @endif
                                                            value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <label for="inputName" class="col-sm-2 col-form-label">Marital
                                                Status *</label>
                                            <div class="col-sm-4">
                                                <div class="input-group date">
                                                    <select class="form-control inline-block" name="marital_status">
                                                        <option value="0">Select </option>
                                                        <option @if (!empty($basicuserDetails->marital_status) &&
                                                            $basicuserDetails->marital_status == '1' ) selected=''
                                                            @endif value="1"> Married </option>
                                                        <option @if (!empty($basicuserDetails->marital_status) &&
                                                            $basicuserDetails->marital_status == '2' ) selected=''
                                                            @endif value="2">Unmarried</option>
                                                        <option @if (!empty($basicuserDetails->marital_status) &&
                                                            $basicuserDetails->marital_status == '3' ) selected=''
                                                            @endif value="3"> Single </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nationality *</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="nationality" value="<?php if (!empty($basicuserDetails->nationality)) {echo $basicuserDetails->nationality;} ?>"class="form-control">
                                            </div>
                                            <label for="inputName" class="col-sm-2 col-form-label">National Id
                                                No *</label>
                                            <div class="col-sm-4">
                                                <div class="input-group date" required="" data-target-input="nearest">
                                                    <input type="text" name="national_id_no"
                                                        class="form-control datetimepicker-input"
                                                        value="<?php if (!empty($basicuserDetails->national_id_no)) { echo $basicuserDetails->national_id_no;} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Passport
                                                Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="passport_number" value="<?php if (!empty($basicuserDetails->passport_number)) {echo $basicuserDetails->passport_number; } ?>"class="form-control">
                                            </div>
                                            <label for="inputName" class="col-sm-2 col-form-label">Passport Issue
                                                Date</label>
                                            <div class="col-sm-4">
                                                <div class="input-group date" data-target-input="nearest">
                                                    <input type="date" name="passport_issue_date"
                                                        class="form-control datetimepicker-input"
                                                        value="<?php if (!empty($basicuserDetails->passport_issue_date)) {echo $basicuserDetails->passport_issue_date;} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Member Plans</label>
                                            <div class=" col-sm-4">
                                                <select {{$userDetails->payment == 1 ? 'disabled':'' }}
                                                    class="form-control inline-block" name="memberplans">
                                                    <option selected="" disabled="">Select </option>
                                                    @foreach($memberplans as $memberplans)
                                                    <option value=" {{$memberplans->id}}" {{ $userDetails->
                                                        membercategory_id==$memberplans->id ? 'selected' : '' }}>
                                                        {{ $memberplans->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @if($userDetails->payment == 1)
                                                <input type="hidden" value="{{$userDetails->membercategory_id}}"
                                                    name="memberplans">
                                                @endif
                                            </div>
                                            <label for="inputName" class="col-sm-2 col-form-label">Blood </label>
                                            <div class="col-sm-4">
                                                <select name="blood" id="blood" class="form-control" required="">
                                                    <option disabled="" value="">Blood Group</option>
                                                    <option value="1" {{ $userDetails->blood == 1 ? 'selected' : '' }}>
                                                        A+</option>
                                                    <option value="2" {{ $userDetails->blood == 2 ? 'selected' : '' }}>
                                                        A-</option>
                                                    <option value="3" {{ $userDetails->blood == 3 ? 'selected' : '' }}>
                                                        B+</option>
                                                    <option value="4" {{ $userDetails->blood == 4 ? 'selected' : '' }}>
                                                        B-</option>
                                                    <option value="5" {{ $userDetails->blood == 5 ? 'selected' : '' }}>
                                                        O+</option>
                                                    <option value="6" {{ $userDetails->blood == 6 ? 'selected' : '' }}>
                                                        O-</option>
                                                    <option value="7" {{ $userDetails->blood == 7 ? 'selected' : '' }}>
                                                        AB+</option>
                                                    <option value="8" {{ $userDetails->blood == 8 ? 'selected' : '' }}>
                                                        AB-</option>
                                                    <option value="0" {{ $userDetails->blood == 0 ? 'selected' : '' }}>
                                                        Unknown</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Photo</label>
                                            <div class="col-sm-4">
                                                <input type="file" name="image" class="form-control">
                                                <input type="hidden" value=" {{ $userDetails->image }}" name="oldImage"
                                                    class="form-control">
                                                @error('image')
                                                <div class="alert alert-danger">
                                                    <strong>

                                                        {{$message}}
                                                    </strong>
                                                    <br>
                                                </div>
                                                @enderror
                                            </div>
                                            <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="phone" value="{{ $userDetails->phone }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        {{-- <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">CV *</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="cv" class="form-control">
                                                <input type="hidden" value=" {{ $userDetails->cv }}" name="oldCv"
                                                    class="form-control">
                                                @error('cv')
                                                <div class="alert alert-danger">
                                                    <strong>

                                                        {{$message}}
                                                    </strong>
                                                    <br>
                                                </div>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label"></label>
                                            <div class=" col-sm-4">
                                                <button type="submit" class="btn btn-info btn-block ">SAVE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="employment">
                                    <div class="card card-body">
                                        @foreach($employment as $no=>$employments)
                                        <form class="form-horizontal" action="{{'edit_employment/'.$employments->id}}"
                                            method="post">
                                            @csrf
                                            <h5>Employment {{$no+1}}</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="inputName" class="col-form-label">Company
                                                        Name</label>
                                                    <input type="text" name="name" value="{{ $employments->c_name}}"
                                                        class="form-control" id="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputName" class="col-form-label">Company Business
                                                    </label>
                                                    <input type="text" name="business"
                                                        value="{{ $employments->c_business}}" class="form-control"
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="inputName" class="col-form-label">Designation</label>
                                                    <input type="text" name="designation"
                                                        value="{{ $employments->c_designation}}" class="form-control"
                                                        id="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputName" class="col-form-label">Department
                                                    </label>
                                                    <input type="text" name="department"
                                                        value="{{ $employments->c_department}}" class="form-control"
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="inputName" class="col-form-label">Area of
                                                        Experiences </label><span> Use (,)</span>
                                                    <input type="text" name="experiences"
                                                        value="{{ $employments->c_experiences}}" data-role="tagsinput">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="inputName" class="col-form-label">
                                                        Responsibilities </label>
                                                    <textarea class="form-control" name="responsibilities" rows="3"
                                                        placeholder="Enter ...">{{ $employments->c_responsibilities}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="inputName" class="col-form-label">Company Location
                                                    </label>
                                                    <input type="text" name="location"
                                                        value="{{ $employments->c_location}}" class="form-control"
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="inputName" class="col-form-label">Employment
                                                        Period</label>
                                                    <input type="date" name="start_period" required
                                                        value="{{ $employments->start_period}}" class="form-control" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="date" style="margin-top:37px ;" name="end_period"
                                                        value="{{ $employments->end_period}}" class="form-control"
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-12 col-sm-12">
                                                    <button type="submit" class="btn btn-success btn-md">SAVE</button>
                                                </div>
                                            </div>
                                        </form>
                                        @endforeach
                                        <div class="form-group row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-default" data-toggle="modal"
                                                    data-target="#employment-xl"><i class="far fa-plus-square"></i>
                                                    Add
                                                    Employement (If
                                                    Required)</button>
                                            </div>
                                            <div class="col-sm-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="password">
                                    <div class="job job-inverse">
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('change_password')}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Old
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="old_pass" value="" class="form-control"
                                                        id="" placeholder="Old Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">New
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="new_pass" value="" id="myInput"
                                                        class="form-control" id="" placeholder="New Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Confirm
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="confirm_password" value="" id="myInput"
                                                        class="form-control" id="" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            onclick="myFunction()">
                                                        <label class="form-check-label">Show Password</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-info">SAVE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane" id="otherinformation">
                                    <p>
                                        <button class="btn btn-block btn-secondary btn-md btn-block btn-flat"
                                            type="button" data-toggle="collapse" data-target="#Otherinformation"
                                            aria-expanded="false" aria-controls="Otherinformation"><i
                                                class="fas fa-arrow-down"></i>
                                            Specialization
                                        </button>
                                    </p>
                                    <div class="collapse" id="Otherinformation">
                                        <div class="card card-body">
                                            @foreach($specialization as $no=>$speci )
                                            <form class="form-horizontal" method="post"
                                                action="{{'edit_skill/'.$speci->id}}">
                                                @csrf
                                                <h4>Skill-{{$no+1}}</h4>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="inputName" class="col-form-label">Skill</label>
                                                        <input type="text" name="skill" value="{{$speci->skill}}"
                                                            class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="inputName" class="col-form-label">How did you
                                                            learn
                                                            the
                                                            skill?</label>
                                                        <input type="text" name="learnby" value="{{$speci->learnfrom}}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-info">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @endforeach
                                            <div class="form-group row">
                                                <div class="col-sm-5"></div>
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#skill-xl"><i class="far fa-plus-square"></i> Add
                                                        Education (If
                                                        Required)</button>
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <button class="btn btn-block btn-secondary btn-md btn-block btn-flat"
                                            type="button" data-toggle="collapse" data-target="#Language"
                                            aria-expanded="false" aria-controls="Language"><i
                                                class="fas fa-arrow-down"></i>
                                            Language Proficiency
                                        </button>
                                    </p>
                                    <div class="collapse" id="Language">
                                        <div class="card card-body">
                                            @foreach($languageskill as $no=>$languagesk)
                                            <form class="form-horizontal" method="post"
                                                action="{{'m_language_edit/'.$languagesk->id}}">
                                                @csrf
                                                <h5>Language {{$no+1}}</h5>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Language</label>
                                                        <input type="text" value="{{$languagesk->name}}" name="language"
                                                            class="form-control" id="">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Reading</label>
                                                        <select name="reading" class="form-control" id="">
                                                            <option {{$languagesk->reading == 'Select'? 'selected':''}}
                                                                value="Select">Select</option>
                                                            <option {{$languagesk->reading == 'High'? 'selected':''}}
                                                                value="High">High</option>
                                                            <option {{$languagesk->reading == 'Medium'? 'selected':''}}
                                                                value="Medium">Medium</option>
                                                            <option {{$languagesk->reading == 'Low'? 'selected':''}}
                                                                value="Low">Low</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Writing</label>
                                                        <select name="writing" class="form-control" id="">
                                                            <option {{$languagesk->writing == 'Select'? 'selected':''}}
                                                                value="Select">Select</option>
                                                            <option {{$languagesk->writing == 'High'? 'selected':''}}
                                                                value="High">High</option>
                                                            <option {{$languagesk->writing == 'Medium'? 'selected':''}}
                                                                value="Medium">Medium</option>
                                                            <option {{$languagesk->writing == 'Low'? 'selected':''}}
                                                                value="Low">Low</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Speaking</label>
                                                        <select name="speaking" class="form-control" id="">
                                                            <option {{$languagesk->speaking == 'Select'? 'selected':''}}
                                                                value="Select">Select</option>
                                                            <option {{$languagesk->speaking == 'High'? 'selected':''}}
                                                                value="High">High</option>
                                                            <option {{$languagesk->speaking == 'Medium'? 'selected':''}}
                                                                value="Medium">Medium</option>
                                                            <option {{$languagesk->speaking == 'Low'? 'selected':''}}
                                                                value="Low">Low</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-info">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @endforeach
                                            <div class="form-group row">
                                                <div class="col-sm-5"></div>
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#language-xl"><i class="far fa-plus-square"></i>
                                                        Add
                                                        Education (If
                                                        Required)</button>
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <button class="btn btn-block btn-secondary btn-md btn-block btn-flat"
                                            type="button" data-toggle="collapse" data-target="#cObjective"
                                            aria-expanded="false" aria-controls="cObjective"><i
                                                class="fas fa-arrow-down"></i>
                                            Career Objective
                                        </button>
                                    </p>
                                    <div class="collapse" id="cObjective">
                                        <div class="card card-body">
                                            <form class="form-horizontal" method="post"
                                                action="{{route('Career.Objective.croud')}}">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="inputName" class="col-form-label">Objective</label>
                                                        <textarea name="objective" id="" class="form-control"
                                                            rows="7">{{$objective->summarie ?? ""}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-info">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <p>
                                        <button class="btn btn-block btn-secondary btn-md btn-block btn-flat"
                                            type="button" data-toggle="collapse" data-target="#Summary"
                                            aria-expanded="false" aria-controls="Summary"><i
                                                class="fas fa-arrow-down"></i>
                                            Career Summary
                                        </button>
                                    </p>
                                    <div class="collapse" id="Summary">
                                        <div class="card card-body">
                                            <form class="form-horizontal" method="post"
                                                action="{{route('Career.summary.croud')}}">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="inputName" class="col-form-label">Summary</label>
                                                        <textarea name="Summary" id="" class="form-control"
                                                            rows="7">{{$Summary->summarie ?? ""}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-info">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <p>
                                        <button class="btn btn-block btn-secondary btn-md btn-block btn-flat"
                                            type="button" data-toggle="collapse" data-target="#qualification"
                                            aria-expanded="false" aria-controls="qualification"><i
                                                class="fas fa-arrow-down"></i>
                                            Special Qualification
                                        </button>
                                    </p>
                                    <div class="collapse" id="qualification">
                                        <div class="card card-body">
                                            <form class="form-horizontal" method="post"
                                                action="{{route('Career.qualification.croud')}}">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="inputName"
                                                            class="col-form-label">Qualification</label>
                                                        <textarea name="qualification" id="" class="form-control"
                                                            rows="7">{{$qualification->summarie ?? ""}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-info">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <p>
                                        <button class="btn btn-block btn-secondary btn-md btn-block btn-flat"
                                            type="button" data-toggle="collapse" data-target="#Curricular"
                                            aria-expanded="false" aria-controls="Curricular"><i
                                                class="fas fa-arrow-down"></i>
                                            Extra Curricular Activities:
                                        </button>
                                    </p>
                                    <div class="collapse" id="Curricular">
                                        <div class="card card-body">
                                            <form class="form-horizontal" method="post"
                                                action="{{route('Career.curricular.croud')}}">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="inputName" class="col-form-label">Curricular
                                                            Activities</label>
                                                        <textarea name="curricular" id="" class="form-control"
                                                            rows="7">{{$curricular->summarie ?? ""}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-info">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="location">
                                    <!-- The job -->
                                    <div class="job job-inverse">
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('edit-location')}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Divisions</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="divisions" id="division">
                                                        <option selected="" disabled="">Select A Division
                                                        </option>
                                                        @foreach($divisions as $each)
                                                        <option {{$userDetails->divisions == $each->id ? "selected":""}}
                                                            value="{{ $each->id }}">{{ $each->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('divisions')
                                                    <div class="alert  alert-danger" style="padding: 0;">
                                                        <strong>
                                                            {{$message}}
                                                        </strong>
                                                        <br>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label for=" inputName" class="col-sm-2 col-form-label">District
                                                    *</label>
                                                <div class="col-sm-10  district" id="dist">
                                                    <select class="form-control" name="district">
                                                        <option selected="" disabled="">Select A Districts
                                                        </option>
                                                        @foreach($districts as $each)
                                                        <option {{$userDetails->district == $each->id ? "selected":""}}
                                                            value="{{ $each->id }}">{{ $each->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('district')
                                                    <div class="alert  alert-danger" style="padding: 0;">
                                                        <strong>
                                                            {{$message}}
                                                        </strong>
                                                        <br>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for=" inputName" class="col-sm-2 col-form-label">Thana *
                                                </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control thana" name="thana">
                                                        <option selected="" disabled="">Select A Thana</option>
                                                        @foreach($upazilas as $each)
                                                        <option {{$userDetails->thana == $each->id ? "selected":""}}
                                                            value="{{ $each->id }}">{{ $each->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('thana')
                                                    <div class="alert  alert-danger" style="padding: 0;">
                                                        <strong>
                                                            {{$message}}
                                                        </strong>
                                                        <br>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for=" inputName" class="col-sm-2 col-form-label">Zone *
                                                </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="zone">
                                                        <option value="" selected="" disabled="">Select A Zone</option>
                                                        @foreach($zone as $zone)
                                                        <option {{$userDetails->zone == $zone->id ? "selected":""}}
                                                            value="{{$zone->id}}">{{$zone->zone}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('thana')
                                                    <div class="alert  alert-danger" style="padding: 0;">
                                                        <strong>
                                                            {{$message}}
                                                        </strong>
                                                        <br>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Area</label>
                                                <div class="col-sm-10">
                                                    <input type="text" required="" name="area"
                                                        value="{{ $userDetails->area }}" class="form-control" id=""
                                                        placeholder="Area Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-info">SAVE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="education">
                                    <p>
                                        <button class="btn btn-block btn-secondary btn-md btn-block btn-flat"
                                            type="button" data-toggle="collapse" data-target="#collapseExample"
                                            aria-expanded="false" aria-controls="collapseExample"><i
                                                class="fas fa-arrow-down"></i>
                                            Academic Summary
                                        </button>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            @foreach($eductationlist as $no=>$list)
                                            <form class="form-horizontal" method="post"
                                                action="{{'/edit_education/'.$list->id}}">
                                                @csrf
                                                <h5>Academic {{$no+1}}</h5>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Level of
                                                            Education </label>
                                                        <select name="level_of_education" class="form-control">
                                                            <option {{ $list->level_of_education == 0? 'selected':'' }}
                                                                value="0">Select</option>
                                                            <option {{ $list->level_of_education == 1? 'selected':'' }}
                                                                value="1">PSC/5 pass</option>
                                                            <option {{ $list->level_of_education == 2? 'selected':'' }}
                                                                value="2">JSC/JDC/8 pass</option>
                                                            <option {{ $list->level_of_education == 3? 'selected':'' }}
                                                                value="3">Secondary</option>
                                                            <option {{ $list->level_of_education == 4? 'selected':'' }}
                                                                value="4">Higher Secondary</option>
                                                            <option {{ $list->level_of_education == 5? 'selected':'' }}
                                                                value="5">Diploma</option>
                                                            <option {{ $list->level_of_education == 6? 'selected':'' }}
                                                                value="6">Bachelor/Honors</option>
                                                            <option {{ $list->level_of_education == 7? 'selected':'' }}
                                                                value="7">Masters</option>
                                                            <option {{ $list->level_of_education == 8? 'selected':'' }}
                                                                value="8">PhD (Doctor of Philosophy)</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Exam/Degree
                                                            Title</label>
                                                        <input type="text" name="degree_title"
                                                            value="{{$list->degree_title}}" class="form-control" id="">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Concentration/
                                                            Major/Group </label>
                                                        <input type="text" name="concentration"
                                                            value="{{$list->concentration}}" class="form-control" id="">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Board </label>
                                                        <input type="text" name="board" value="{{$list->board}}"
                                                            class="form-control" id="">
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="inputName" class="col-form-label">Institute
                                                            Name</label>
                                                        <input type="text" name="institute_name"
                                                            value="{{$list->institute_name}}" class="form-control"
                                                            id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Result </label>
                                                        <select name="result" class="form-control">
                                                            <option {{ $list->result == 0? 'selected':'' }} value="0">
                                                                Select</option>
                                                            <option {{ $list->result == 1? 'selected':'' }} value="1">
                                                                First Division/Class</option>
                                                            <option {{ $list->result == 2? 'selected':'' }} value="2">
                                                                Second Division/Class</option>
                                                            <option {{ $list->result == 3? 'selected':'' }} value="3">
                                                                Third Division/Class</option>
                                                            <option {{ $list->result == 4? 'selected':'' }} value="4">
                                                                Grade</option>
                                                            <option {{ $list->result == 5? 'selected':'' }} value="5">
                                                                Appeared</option>
                                                            <option {{ $list->result == 6? 'selected':'' }} value="6">
                                                                Enrolled</option>
                                                            <option {{ $list->result == 7? 'selected':'' }} value="7">
                                                                Awarded</option>
                                                            <option {{ $list->result == 8? 'selected':'' }} value="8">Do
                                                                not mention</option>

                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">CGPA</label>
                                                        <input type="text" name="cgpa" value="{{$list->cgpa}}"
                                                            class="form-control" id="">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label for="inputName" class="col-form-label">Scale </label>
                                                        <input type="text" name="scale" value="{{$list->scale}}"
                                                            class="form-control" id="">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="inputName" class="col-form-label">Marks </label>
                                                        <input type="text" name="marks" value="{{$list->marks}}"
                                                            class="form-control" id="">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="inputName" class="col-form-label">Year of passing
                                                        </label>
                                                        <input type="text" name="year_of_passing"
                                                            value="{{$list->year_of_passing}}" class="form-control"
                                                            id="">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Duration
                                                            (Years)</label>
                                                        <input type="text" name="duration" value="{{$list->duration}}"
                                                            class="form-control" id="">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputName"
                                                            class="col-form-label">Achievement</label>
                                                        <input type="text" name="achievement"
                                                            value="{{$list->achievement}}" class="form-control" id="">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="offset-sm-12 col-sm-12">
                                                        <button type="submit"
                                                            class="btn btn-success btn-md">SAVE</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @endforeach
                                            <div class="form-group row">
                                                <div class="col-sm-5"></div>
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#modal-xl"><i class="far fa-plus-square"></i> Add
                                                        Education (If
                                                        Required)</button>
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>
                                        </div>

                                    </div>

                                    <p>
                                        <button class="btn btn-block btn-secondary  btn-md btn-block btn-flat"
                                            type="button" data-toggle="collapse" data-target="#training"
                                            aria-expanded="false" aria-controls="training"><i
                                                class="fas fa-arrow-down"></i>
                                            Training Summary
                                        </button>
                                    </p>
                                    <div class="collapse" id="training">
                                        <div class="card card-body">
                                            @foreach($trainingsummary as $no=>$training)
                                            <form class="form-horizontal" method="post"
                                                action="{{'edit_training/'.$training->id}}">
                                                @csrf
                                                <h5>Academic {{$no+1}}</h5>

                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Training
                                                            Title</label>
                                                        <input type="text" name="title" value="{{$training->title}}"
                                                            class="form-control" id="">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Country </label>
                                                        <input type="text" name="country" value="{{$training->country}}"
                                                            class="form-control" id="">
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Topics
                                                            Covered</label>
                                                        <input type="text" name="topics" value="{{$training->topics}}"
                                                            class="form-control" id="">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Training Year
                                                        </label>
                                                        <input type="number" name="year" value="{{$training->year}}"
                                                            placeholder="YYYY" class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Duration </label>
                                                        <input type="text" name="duration"
                                                            value="{{$training->duration}}" class="form-control" id="">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputName" class="col-form-label">Institute </label>
                                                        <input type="text" name="institute"
                                                            value="{{$training->institute}}" class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <label for="inputName" class="col-form-label">Location </label>
                                                        <input type="text" name="location"
                                                            value="{{$training->location}}" class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-12 col-sm-12">
                                                        <button type="submit"
                                                            class="btn btn-success btn-md">SAVE</button>
                                                    </div>

                                                </div>
                                            </form>
                                            @endforeach
                                            <div class="form-group row">
                                                <div class="col-sm-5"></div>
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#training-xl"><i class="far fa-plus-square"></i>
                                                        Add
                                                        Training (If
                                                        Required)</button>
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>
                                        </div>

                                    </div>


                                </div> --}}
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@include('admin/pages/model/profilemodel')

<script>
    $(document).ready(function () {
        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('#division').change(function () {
            var division = $('#division').val();

            $.ajax({
                type: "post",
                url: "/memberDistList", // path to function
                cache: false,

                data: {
                    "_token": "{{ csrf_token() }}",
                    division: division
                },
                success: function (val) {
                    try {
                        $('.district').html(val);
                    } catch (e) {
                        alert('Exception while request..');
                    }

                },
                error: function () {
                    alert('Error while request..');
                }
            });
        });

        $('#dist').change(function () {
            var district = $('#district').val();
            $.ajax({
                type: "post",
                url: "/memberThanaList", // path to function
                cache: false,

                data: {
                    "_token": "{{ csrf_token() }}",
                    district: district
                },
                success: function (val) {

                    try {
                        $('.thana').html(val);
                    } catch (e) {
                        alert('Exception while request..');
                    }

                },
                error: function () {
                    alert('Error while request..');
                }
            });
        });
    });
</script>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>


@endsection
<!-- Content Wrapper. Contains page content -->
