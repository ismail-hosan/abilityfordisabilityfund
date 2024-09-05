@extends('frontend.masterTemp')
@section('fmenuname')
SIGN IN
@endsection
@section('front-main-content')
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
            <div class="col-md-6 col-sm-6 col-md-offset-3" >
                <div class="sidebar-wrapper" >

                    <div class="sidebar-box-header bb-1" >
                        <h4>Create Your Account</h4>
                    </div>
                   <form class="billing-form" method="post" action="{{ route('emp_registration') }}">
                        @csrf
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Full Name</label>
                                <input type="text" name="name" value=" {{old('name')}} " class="form-control" />
                                @error('name')
                                <div class="alert alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>                                                        
                                </div>
                                @enderror
                            </div>
                         <div class="col-xs-6">
                                <label>Email</label>
                                <input type="email" name="email"  class="form-control" />
                                @error('email')
                                <div class="alert  alert-danger" style="padding: 0;">
                                    <strong>    
                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                               <div class="col-xs-6" >
                                <label>Gender</label>
                                <br >
                                <input  type="radio" name="gender" value="1"  checked> Male
                                <input type="radio" name="gender" value="2" > Female
                                @error('name')
                                <div class="alert alert-danger" style="padding: 0;">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                    <br>                                                        
                                </div>
                                @enderror
                            </div>
                            <div class="col-xs-6">
                                <label>Phone Number</label>
                                <input type="text" value="{{old('phone')}}" name="phone" class="form-control" /> 
                                @error('phone')
                                <div class="alert alert-danger" style="padding: 0;">
                                    <strong>

                                        {{$message}}
                                    </strong>
                                    <br>
                                </div>
                                @enderror

                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Password</label>
                                <input type="password"  name="password" class="form-control" />
                            </div>
                            <div class="col-xs-6">
                                <label>Confirm Password</label>
                                <input type="password" value="{{ old('confirm_password') }}" name="confirm_password" class="form-control" />
                            </div>

                        </div>
                        @error('password')
                        <div class="alert alert-danger" style="padding: 0;">
                            <strong>
                                {{$message}}
                            </strong>
                            <br>
                        </div>
                        @enderror
                        <div class="row">
                            <div class="col-xs-12">
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="1">
                                    <label for="1"></label>
                                </span> I agree with terms and Conditions <a target="_blank" href="{{ url('/Our-Rules')}}" style="color: red">Rules</a>
                            </div>
                        </div>
                        <div class="row mrg-top-30">
                            <div class="col-md-12 text-center">
                                <button  class="btn btn-success" type="submit">SignUp</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</section>

@endsection
