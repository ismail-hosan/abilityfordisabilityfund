@extends('frontend.masterTemp')
@section('fmenuname')
SIGN IN
@endsection
@section('front-main-content')

<style>
    .customCss {
        min-height: 1000px;
    }
</style>
<section class="inner-header-title gray-bg">
    <div class="container">
        <h2 class="cl-default">Create An Account</h2>
    </div>
</section>
<div class="clearfix"></div>
<section class="accordion">
    <div class="container">
        <div class="row">
            <!-- Payment Detail -->
            <div class="col-md-10 col-sm-6 col-md-offset-1">
                <div class="sidebar-wrapper customCss">


                    <h4 style="color: green"><i class="fa fa-book"></i> Account Information</h4>

                    <hr style="border: 1px solid lightblue;">
                    <form class="billing-form" method="post" action="{{ route('corp_registration') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" />
                                @error('email')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" />
                                @error('password')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Confirm Password</label>
                                <input type="password" value="{{ old('confirm_password') }}" name="confirm_password"
                                    class="form-control" />
                                @error('confirm_password')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <h4 style="color: green"><i class="fa fa-home"></i> Company Details Information</h4>
                        <hr style="border: 1px solid lightblue;">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Company Name*</label>
                                <input type="text" name="comp_name" class="form-control" />
                                @error('comp_name')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Year of Establishment</label>
                                <input type="text" name="establishment" class="form-control" />
                                @error('establishment')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Company Address*</label>
                                <input type="text" name="address" class="form-control" />
                                @error('address')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label> Divisions *</label>
                                <select class="form-control" name="divisions" id="division">
                                    <option value="" selected="" disabled="">Select A Division</option>
                                    @foreach($divisions as $each)
                                    <option value="{{ $each->id }}">{{ $each->name }}</option>
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

                            <div class="col-md-4 col-xs-12 col-sm-12 district" id="dist">
                                <label> District *</label>
                                <select class="form-control" name="district">
                                    <option value="" selected="" disabled="">Select A Districts</option>
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
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label> Thana *</label>
                                <select class="form-control thana" name="thana">
                                    <option value="" selected="" disabled="">Select A Thana</option>
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

                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label> Industry Type *</label>
                                <input type="text" name="industry_type" class="form-control" />
                                @error('industry_type')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Business/ Trade License No *</label>
                                <input type="text" name="trade_license" class="form-control" />
                                @error('trade_license')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Website URL *</label>
                                <input type="text" name="url" class="form-control" />
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



                        <h4 style="color: green"><i class="fa fa-info"></i> Contact</h4>
                        <hr style="border: 1px solid lightblue;">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Contact Person's Name* *</label>
                                <input type="text" name="contact_person" class="form-control" />
                                @error('contact_person')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Contact Person's Designation *</label>
                                <input type="text" name="contact_designation" class="form-control" />
                                @error('contact_designation')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label>Contact Person's Email * </label>
                                <input type="text" name="contact_email" class="form-control" />
                                @error('address')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <label> Contact Person's Mobile *</label>
                                <input type="text" name="contact_person_phone" class="form-control" />
                                @error('district')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-12">
                                <div class="col-md-12 text-center mrg-top-30">
                                    <button class="btn btn-success btn-block" type="submit">SignUp</button>
                                </div>
                            </div>



                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    $(document).ready(function () {
        $('#division').change(function () {
            var division = $('#division').val();
            $.ajax({
                type: "post",
                url: "/getDistList", // path to function
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
