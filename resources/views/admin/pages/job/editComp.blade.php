@extends('admin.masterTemplate')

@section('menu-name')
EDIT COMPANY PROFILE
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">EDIT COMPANY PROFILE</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-blue text-center">-: EDIT COMPANY INFORMATIONS :-</div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="post" action="{{ route('editSave')}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Company Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" value="{{ $userDetails->name }}"
                                                    class="form-control" id="" placeholder="Name">
                                                @error('name')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                    <br>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!--                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" value="{{ $userDetails->email }}"  class="form-control" id="" placeholder="Email Addreess">
                                            @error('email')
                                            <div class="alert  alert-danger" style="padding: 0;">
                                                <strong>
                                                    {{$message}}
                                                </strong>
                                                <br>
                                            </div>
                                            @enderror
                                            </div>
                                        </div>-->


                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Establishment</label>
                                            <div class="col-sm-9">
                                                <input type="text" required="" name="establishment"
                                                    value="{{ $userDetails->establishment }}" class="form-control" id=""
                                                    placeholder="Area Name">
                                                @error('establishment')
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
                                            <label for="inputName" class="col-sm-3 col-form-label">Company
                                                Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" required="" name="address"
                                                    value="{{ $userDetails->address }}" class="form-control" id=""
                                                    placeholder="Area Name">
                                                @error('address')
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
                                            <label for="inputName" class="col-sm-3 col-form-label"> Divisions *</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="divisions" id="division">
                                                    <option value="" selected="" disabled="">Select A Division</option>
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


                                        <div class="form-group row" id="dist">
                                            <label for="inputName" class="col-sm-3 col-form-label"> District *</label>
                                            <div class="col-sm-9">
                                                <div class="district">
                                                    <select class="form-control" name="district">
                                                        <option value="" selected="" disabled="">Select A Districts
                                                        </option>
                                                        @foreach($districts as $each)
                                                        <option {{$userDetails->district == $each->id ? "selected":""}}
                                                            value="{{ $each->id }}">{{ $each->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
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
                                            <label for="inputName" class="col-sm-3 col-form-label"> Thana *</label>
                                            <div class="col-sm-9">
                                                <select class="form-control thana" name="thana">
                                                    <option value="" selected="" disabled="">Select A Thana</option>
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
                                            <label for="inputName" class="col-sm-3 col-form-label"> Industry Type
                                                *</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="{{ $userDetails->industry_type }}"
                                                    name="industry_type" class="form-control" />
                                                @error('industry_type')
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
                                            <label for="inputName" class="col-sm-3 col-form-label">Trade License No
                                                *</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="{{ $userDetails->trade_license }}"
                                                    name="trade_license" class="form-control" />
                                                @error('trade_license')
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
                                            <label for="inputName" class="col-sm-3 col-form-label">Website URL *</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="{{ $userDetails->url }}" name="url"
                                                    class="form-control" />
                                                @error('url')
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
                                            <label for="inputName" class="col-sm-3 col-form-label">Contact Person's
                                                Name* *</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="contact_person"
                                                    value="{{ $userDetails->contact_person }}" class="form-control" />
                                                @error('contact_person')
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
                                            <label for="inputName" class="col-sm-3 col-form-label">Contact Person's
                                                Designation *</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="{{ $userDetails->contact_designation }}"
                                                    name="contact_designation" class="form-control" />
                                                @error('contact_designation')
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
                                            <label for="inputName" class="col-sm-3 col-form-label">Contact Person's
                                                Email * </label>
                                            <div class="col-sm-9">
                                                <input type="text" value="{{ $userDetails->contact_email }}"
                                                    name="contact_email" class="form-control" />
                                                @error('contact_email')
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
                                            <label for="inputName" class="col-sm-3 col-form-label"> Contact Person's
                                                Mobile *</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="{{ $userDetails->contact_person_phone }}"
                                                    name="contact_person_phone" class="form-control" />
                                                @error('contact_person_phone')
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
                                            <label for="inputName" class="col-sm-3 col-form-label">Company logo</label>
                                            <div class="col-sm-9">
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

                                        </div>
                                        <div class="form-group row">

                                            <div class=" col-sm-6">
                                                <button type="submit" class="btn btn-info btn-block">SAVE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- /.tab-pane -->


                                <!-- /.tab-pane -->
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


<script>

    $(document).ready(function () {
        $('#division').change(function () {
            var division = $('#division').val();

            $.ajax({
                type: "post",
                url: "/getDistList2", // path to function
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
                url: "/getThanaList", // path to function
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
@endsection
<!-- Content Wrapper. Contains page content -->
