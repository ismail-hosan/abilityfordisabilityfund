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
            <div class="row">
                <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-cyan">
                                <h4 class="card-title"> <i class="fa fa-list-alt"></i> VOLUNTREE REGISTRATION FORM</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <label> Name *</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12 district" id="dist">
                                            <label> Phone *</label>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Your Number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <label> Email </label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Email">
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12 district" id="dist">
                                            <label> NID Number *</label>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Your NID Number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <label> Divisions *</label>
                                            <select class="form-control" name="divisions" id="division">
                                                <option value="" selected="" disabled="">Select A Division</option>
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
                                        <div class="col-md-6 col-xs-12 col-sm-12 district" id="dist">
                                            <label> District *</label>
                                            <select class="form-control" name="district">
                                                <option value="" selected="" disabled="">Select A Districts</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <label> Thana *</label>
                                            <select class="form-control thana" name="thana">
                                                <option value="" selected="" disabled="">Select A Thana</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <label> Zone *</label>
                                            <input type="text" placeholder="Zone name" name="zone" class="form-control">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row col-md-12 offset-md-5">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
