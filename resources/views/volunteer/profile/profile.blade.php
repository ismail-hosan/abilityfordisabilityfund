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
                <div class="col-md-12">
                    <div class="container">
                        <div class="card border-primary mb-3">
                          <div class="card-header fw-bold" style="font-size: 30px">Gereral Information</div>
                            <div class="card-body text-primary">
                                <form action="{{ route('volunteer.profile.update', Auth::guard('volunteer')->user()->id) }}" method="post">
                                  @csrf
                                  {{-- @method('put') --}}
                                  <div class="row">
                                      <div class="col-md-6">
                                          <Label>First Name :</Label>
                                          <input type="text" class="form-control" name="name" value="{{ $volunteer->name }}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Family Name :</Label>
                                          <input type="text" class="form-control" name="family_name" value="{{ $volunteer->family_name }}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <Label>Address :</Label>
                                          <input type="text" class="form-control" name="address" value="{{ $address->address ?? ''}}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Town/City :</Label>
                                          <input type="text" class="form-control" name="city" value="{{ $address->city ?? '' }}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <Label>Post/Zip Code :</Label>
                                          <input type="text" class="form-control" name="zip_code" {{ $address->zip_code ?? '' }}>
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Country :</Label>
                                          <input type="text" class="form-control" name="country" value="{{ $address->country ?? '' }}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <Label>Email :</Label>
                                          <input type="text" class="form-control" name="email" value="{{ $volunteer->email }}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Telephone :</Label>
                                          <input type="text" class="form-control" name="telephone" value="{{ $volunteer->phone }}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <Label>Fax :</Label>
                                          <input type="text" class="form-control" name="fax" value="{{ $volunteer->fax }}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Nationality :</Label>
                                          <input type="text" class="form-control" name="nationality"  value="{{ $volunteer->nationality }}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <Label>Passport/NID Number :</Label>
                                          <input type="text" class="form-control" name="nid_number" value="{{ $volunteer->nid_number }}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Date Of Birth :</Label>
                                          <input type="date" class="form-control" name="dob" value="{{ $volunteer->dob }}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label for="">Gender</label>
                                        <div class="form-control">
                                          <label for="male" class="ml-3">Male</label>
                                          <input name="gender" id="male" type="radio" value="male"  {{ $volunteer->gender == 'male' ? 'checked' : '' }} >
                                          <label for="femail" class="ml-3">Female</label>
                                          <input name="gender" id="female" type="radio" value="female"  {{ $volunteer->gender == 'female' ? 'checked' : '' }}>
                                          <label for="femail" class="ml-3" >Others</label>
                                          <input name="gender" id="female" type="radio" value="other"  {{ $volunteer->gender == 'other' ? 'checked' : '' }} >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mt-5">
                                      <h5 class="">Details of partner/family/dependents who are travelling with you</h5>
                                      <hr>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label for="">Name</label>
                                        <input type="text" name="partner_name" class="form-control" value="{{ $volunteer->partner_name }}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Details :</Label>
                                          <input type="text" class="form-control" name="partner_details" value="{{ $volunteer->partner_details }}">
                                      </div>
                                    </div>
                                    <div class="row mt-3">
                                      <div class="col-md-6">
                                        <label for="">Are you registered as persons with disabilities ?  </label>
                                        <div class="input-group">
                                          <label for="" class="ml-3">Yes</label>
                                          <input type="checkbox" name="disabled_person" class="ml-2" value="1" {{ $volunteer->disabled_person == 1 ? 'checked' : '' }} />
                                          <label for="" class="ml-3">NO</label>
                                          <input type="checkbox"  name="disabled_person" class="ml-2" value="2" {{ $volunteer->disabled_person == 2 ? 'checked' : '' }} />
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                          <Label>If yes , please give details :</Label>
                                          <textarea name="disabled_details" id="" cols="2" rows="1" class="form-control">{{ $volunteer->disabled_details }}</textarea>
                                      </div>
                                    </div>
                                    <div class="mt-4">
                                      <h5 class="">Emergency contact person</h5> <hr>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <Label>First Name :</Label>
                                          <input type="text" class="form-control" name="contact_person_first_name" value="{{ $volunteer->contact_person_first_name }}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Family Name :</Label>
                                          <input type="text" class="form-control" name="contact_person_family_name" value="{{ $volunteer->contact_person_family_name }}">
                                      </div>
                                    </div>
                                    {{-- @dd($contact_address); --}}
                                    <div class="row">
                                      <div class="col-md-6">
                                          <Label>Address :</Label>
                                          <input type="text" class="form-control" name="contact_person_address" value="{{ $contact_address->contact_person_address ?? ''}}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Town/City :</Label>
                                          <input type="text" class="form-control" name="contact_person_city" value="{{ $contact_address->contact_person_city ?? ''}}" >
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <Label>Post/Zip Code :</Label>
                                          <input type="text" class="form-control" name="contact_person_zip_code" value="{{ $contact_address->contact_person_zip_code ?? ''}}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Country :</Label>
                                          <input type="text" class="form-control" name="contact_person_country" value="{{ $contact_address->contact_person_country ?? ''}}" >
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <Label>Email :</Label>
                                          <input type="text" class="form-control" name="contact_person_email" value="{{ $volunteer->contact_person_email ?? ''}}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Telephone :</Label>
                                          <input type="text" class="form-control" name="contact_person_telephone" value="{{ $volunteer->contact_person_telephone ?? '' }}">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                          <Label>Fax :</Label>
                                          <input type="text" class="form-control" name="contact_person_fax" value="{{ $volunteer->contact_person_fax ?? ''}}">
                                      </div>
                                    </div><hr>
                                    <div class="row mt-3">
                                      <div class="col-md-12">
                                        <label for="">Have you ever been convicted in a court of law for any offence except for minor traffice violation ?  </label>
                                          <label for="" class="ml-3">Yes</label>
                                          <input type="checkbox" name="minor_traffice" class="ml-2" value="1" {{ $volunteer->minor_traffice == 1 ? 'checked' : ''}} />
                                          <label for="" class="ml-3">NO</label>
                                          <input type="checkbox" name="minor_traffice" class="ml-2" value="2" {{ $volunteer->minor_traffice == 2 ? 'checked' : ''}} />
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                          <Label>If yes please give details :</Label>
                                          <textarea name="minor_traffice_details" id="" cols="30" rows="2" class="form-control">{{ $volunteer->minor_traffice_details ?? '' }}</textarea>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                          <Label>How did you find about ARDRID :</Label>
                                          <textarea name="about_ardrid" id="" cols="30" rows="2" class="form-control">{{ $volunteer->about_ardrid ?? '' }}</textarea>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                          <Label>Extra details :</Label>
                                          <textarea name="extra_details" id="" cols="30" rows="2" class="form-control"> {{ $volunteer->extra_details ?? '' }} </textarea>
                                      </div>
                                    </div>
                                    <div class="row"> 
                                      <div class="col-md-6">
                                          <Label>Desired arrival date:</Label>
                                          <input type="date" name="desired_arrival_date" id="" class="form-control" value="{{ $volunteer->desired_arrival_date }}">
                                      </div>
                                      <div class="col-md-6">
                                          <Label>Desired departure date:</Label>
                                          <input type="date" name="desired_departure_date" id="" class="form-control"  value="{{ $volunteer->desired_departure_date ?? '' }}">
                                      </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                      <button class="btn btn-success btn-lg" type="submit">Update</button>
                                    </div>
                                </form>
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
