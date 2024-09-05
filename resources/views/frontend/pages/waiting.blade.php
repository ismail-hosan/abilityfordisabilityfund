@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')
<div class="clearfix"></div>

<style>
    @import "compass/css3";

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

.confirm-box {
  /* width: 280px; */
  position: relative;
  margin: 30px auto;

  color: rgba(0, 0, 0, 0.7);
  font-family: Helvetica;
  font-size: 15px;
  font-weight: bold;

  background: #ddd;
  border-radius: 0.4em;
  /* border: 1px solid rgba(0, 0, 0, 0.6); */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);

  &:after {
    content: "";
    display: table;
    clear: both;
  }
}

.confirm-box h1 {
  text-align: center;
  padding: 10px 30px;
  line-height: 1.2em;
  border-radius: 0.4em 0.4em 0 0;
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.1);
  border-bottom: 1px solid rgba(0, 0, 0, 0.3);
  box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3),
    inset 0 1px 0 rgba(255, 255, 255, 0.3),
    inset 0 30px 30px rgba(255, 255, 255, 0.2);
  margin-bottom: 15px;
  background: #224096;
}

.confirm-box a {
  display: block;
  position: relative;

  padding: 7px 40px;
  width: 130px;
  margin: 0 auto;
  margin-bottom: 15px;

  text-decoration: none;
  text-align: center;
  font-size: 13px;

  border: 1px solid rgba(0, 0, 0, 0.7);
  border-radius: 0.2em;
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.5),
    inset 0 20px 20px rgba(255, 255, 255, 0.2), 1px 2px 1px rgba(0, 0, 0, 0.2),
    0 0 2px 8px rgba(50, 50, 50, 0.1);
  transition: all 0.3s ease-out;
  background: #224096;
  z-index: 100;

  font-weight: bold;
  color: rgba(0, 0, 0, 0.6);
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
  -webkit-font-smoothing: subpixel-antialiased;

  &:hover {
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.5),
      inset 0 -20px 20px rgba(200, 200, 200, 0.1),
      1px 2px 1px rgba(0, 0, 0, 0.2), 0 0 2px 8px rgba(100, 100, 100, 0.1);
  }

  &:active {
    top: 1px;
  }
}

#progress-bar {
  width: 90%;
  margin: 0 auto;
  margin-bottom: 15px;
  height: 28px;
  border: 1px solid rgba(0, 0, 0, 0.8);
  background: #232323;
  border-radius: 1em;
  box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.5);
}

#inner-pb {
  position: relative;
  border: 1px solid rgba(0, 0, 0, 0.8);
  width: 0;

  height: 22px;
  margin-left: 5px;
  margin-top: 2px;

  background: repeating-linear-gradient(
    -45deg,
    #0077cc,
    /* #0077cc 20px, */
    /* #0099ff 20px, */
    #0099ff 40px
  );
  border-radius: 0.8em;
  animation: roll 9s linear infinite;
  box-shadow: inset 0 10px 10px rgba(255, 255, 255, 0.2),
    inset 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 -5px 3px rgba(0, 0, 0, 0.2),
    0 3px 2px rgba(0, 0, 0, 0.3);
}

@-moz-keyframes roll {
  0% {
    width: 0;
  }
  100% {
    width: 95%;
  }
}

@-webkit-keyframes roll {
  0% {
    width: 0;
  }
  100% {
    width: 95%;
  }
}
</style>

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
                        <div class="confirm-box">
                            <h1>Please wait for admin Approval.</h1>
                            <div id="progress-bar">
                                <div id="inner-pb"></div>
                            </div>
                            <a href="{{ url('/') }}" title="Cancel">Home</a>
                          </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
