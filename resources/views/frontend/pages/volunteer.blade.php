@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')
<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title"
    style="background-image:url(https://user-images.githubusercontent.com/513929/53929982-e5497700-404c-11e9-8393-dece0b196c98.png);">
    <div class="container">
        <h1>VOLUNTEER</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                @include('frontend.include.session')
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h1>Join with us as a volunteer</h1>
                        <hr class="mb-5">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#firsttab" data-toggle="tab">Registration</a></li>
                          <li><a href="#secondtab" data-toggle="tab">Login</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="firsttab">
                                <div class="card">
                                    <div class="card-header bg-cyan">
                                        <h4 class="card-title"> <i class="fa fa-list-alt"></i> VOLUNTREE REGISTRATION</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('volunteer.store') }}" method="POST">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <label> Name *</label>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                                                    @error('name')
                                                    <div class="alert  alert-danger" style="padding: 0;">
                                                        <strong>
                                                            {{$message}}
                                                        </strong>
                                                        <br>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12 district" id="dist">
                                                    <label> Phone *</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Your Number">
                                                    @error('phone')
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
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <label> Email </label>
                                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Email">
                                                    @error('email')
                                                    <div class="alert  alert-danger" style="padding: 0;">
                                                        <strong>
                                                            {{$message}}
                                                        </strong>
                                                        <br>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12 district" id="dist">
                                                    <label> NID Number </label>
                                                    <input type="text" class="form-control" name="nid_number" id="nid_number" placeholder="Enter Your NID Number">
                                                    @error('nid_number')
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
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <label> Country </label>
                                                    <input type="text" class="form-control" name="country" placeholder="Enter Your Country Name">
                                                    @error('country')
                                                    <div class="alert  alert-danger" style="padding: 0;">
                                                        <strong>
                                                            {{$message}}
                                                        </strong>
                                                        <br>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12 district" id="dist">
                                                    <label> City </label>
                                                    <input type="text" class="form-control" name="city" placeholder="Enter Your City Name">
                                                    @error('city')
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
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <label> Password </label>
                                                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                                                    @error('country')
                                                    <div class="alert  alert-danger" style="padding: 0;">
                                                        <strong>
                                                            {{$message}}
                                                        </strong>
                                                        <br>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12 district" id="dist">
                                                    <label> Confirm Password </label>
                                                    <input type="password" class="form-control" name="confirm_password" placeholder="Enter Your Confirm Password">
                                                    @error('city')
                                                    <div class="alert  alert-danger" style="padding: 0;">
                                                        <strong>
                                                            {{$message}}
                                                        </strong>
                                                        <br>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row col-md-12 offset-md-5">
                                                <button type="submit" class="btn btn-info">Registration</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if(Session::has('error-msg'))
                                <p class="text-danger">{{ Session::get('error-msg') }}</p>
                            @endif
                            <div class="tab-pane" id="secondtab">
                                <div class="card">
                                    <div class="card-header bg-cyan">
                                        <h4 class="card-title"> <i class="fa fa-list-alt"></i> VOLUNTREE LOGIN</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="billing-form"  method="post" action="{{ route('volunteer.submit') }}" >
                                            @csrf
                                            <div class="row" style="margin: 0 ; padding: 0" >
                                                <div class="col-xs-12">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
                                                    @error('email')
                                                    <div class="alert alert-danger" style="padding: 0;">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror 
                                                </div>
                                            </div>
                                            <div class="row" style="margin: 0 ; padding: 0">
                                                <div class="col-xs-12">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password"/>
                                                    @error('password')
                                                    <div class="alert alert-danger" style="padding: 0;">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div> 
                                            </div>
                                            {{-- <div class="row" style="margin: 0 ; padding: 0">
                                                <div class="col-xs-12 mrg-top-5">
                                                    <span class="custom-checkbox">
                                                        <input type="checkbox" id="1">
                                                        <label for="1"></label>
                                                        @if (Route::has('password.request'))
                                                    </span> Forgat Password? <a href="{{ route('password.request') }}"
                                                        class="cl-success">Click Here</a>
                                                    @endif
                                                </div>
                                            </div> --}}
                                            <div class="row" style="margin: 0 ; padding: 0">
                                                <div class="col-xs-12 mrg-top-5">
                                                  If you have no account? <a href="{{ route('signin') }}"
                                                        class="cl-success">Create an account</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center mrg-top-25">
                                                    <button type="submit" class="btn btn-success">LogIn</button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
