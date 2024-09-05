@extends('frontend.masterTemp')
@section('fmenuname')
SIGN IN
@endsection
@section('front-main-content')
<section class="inner-header-title gray-bg">
    <div class="container">
        <h2 class="cl-default">LogIn Your Account</h2>
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
                        <h4>LogIn Your Account</h4>
                    </div>
                    <form class="billing-form" method="post" action="{{ route('login') }}" >
                        @csrf
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Email</label>
                                <input type="text" name="email" class="form-control">
                                @error('email')
                                <div class="alert alert-danger" style="padding: 0;">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" />
                                @error('password')
                                <div class="alert alert-danger" style="padding: 0;">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-12 col-sm-12 mrg-top-5">
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="1">
                                    <label for="1"></label>
                                </span> Forgat Password? <a href="#" class="cl-success">Click Here</a>
                            </div>
                            <div class="col-md-6 col-xs-12 col-sm-12 mrg-top-5 float-right">
                                <span class="">
                                    <label for="1"></label>
                                </span> Create New Account ? <a href="#" class="cl-success">Click Here</a>
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
</section>

@endsection
