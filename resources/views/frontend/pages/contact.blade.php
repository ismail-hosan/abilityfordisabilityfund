@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')
<div class="clearfix"></div>

<section class="inner-header-title" style="background-image:url(https://modimarketing.com/wp-content/uploads/2016/01/Contact-header-background-image-1.jpg);">
    <div class="container">
    <h1>Contact Us</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->
<!-- Contact Page Section Start -->
<section class="contact-page">
    <div class="container">
        <h2>Drop A Mail</h2>

        <div class="col-md-4 col-sm-4">
            <div class="contact-box">
                <i class="fa fa-map-marker"></i>
                <p>Uttara Dhaka</p>
                <p>Bangladesh</p>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="contact-box">
                <i class="fa fa-envelope"></i>
                <p>info@bibs.com<br>support@bibs.com</p>
            </div>
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="contact-box">
                <i class="fa fa-phone"></i>
                <p>01675390962</p>
                <p>01313712784</p>
            </div>
        </div>

    </div>
</section>
<!-- contact section End -->
<!-- contact form -->
<section class="contact-form">
    <div class="container">
        <h2>Drop A Mail</h2>

        <div class="col-md-6 col-sm-6">
            <input type="text" class="form-control" placeholder="Your Name">
        </div>

        <div class="col-md-6 col-sm-6">
            <input type="email" class="form-control" placeholder="Your Email">
        </div>

        <div class="col-md-6 col-sm-6">
            <input type="text" class="form-control" placeholder="Phone Number">
        </div>

        <div class="col-md-6 col-sm-6">
            <input type="text" class="form-control" placeholder="Subject">
        </div>

        <div class="col-md-12 col-sm-12">
            <textarea class="form-control" placeholder="Message"></textarea>
        </div>

        <div class="col-md-12 col-sm-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
</section>
<!-- Contact form End -->


@endsection