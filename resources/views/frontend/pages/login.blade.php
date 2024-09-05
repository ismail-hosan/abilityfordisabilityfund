@extends('frontend.masterTemp')
{{-- @section('fmenuname')
SIGN IN
@endsection --}}
@section('front-main-content')
<style>
    body{
        /* font-family: 'Poiret One', cursive; */
      background: #dfdede;  /* fallback for old browsers */
    /* background: -webkit-linear-gradient(to right, #EC6EAD, #3494E6);  Chrome 10-25, Safari 5.1-6 */
    /* background: linear-gradient(to right, #EC6EAD, #3494E6); W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    
    }
    h4{
      font-weight: bold;
      margin-bottom: 2.5rem;
    }
    .form-wrapper{
      background: #fff;
      border-radius: 5px;
      padding: 40px;
      margin: 20px
    }
    .form-control, .custom-select{
      border-radius: 0px;
        color: #495057;
        background-color: #f1f1f1;
        border-color: none;
    
    }
    
    .form-control:focus {
        color: #495057;
        background-color: #ffffff;
        border:1px solid #b5b6b3;
        outline: 0;
        box-shadow: none;
    
    }
    
    .btn{
        font-size: 14px;
    }
    .btn:hover, .btn:focus, .btn:active, .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show > .btn-primary.dropdown-toggle {
      background: #3494E6;
      border: #3494E6;
      outline: 0;
    }
</style>
<section class="inner-header-title"  style="background-image:url(https://user-images.githubusercontent.com/513929/53929982-e5497700-404c-11e9-8393-dece0b196c98.png);">
    <div class="container">
        <h2>Login Your Account</h2>
    </div>
</section>


<div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="form-wrapper">
          <div class="row">
            <div class="col-md-12">
              <h4>Registration form</h4>
            </div>
          </div>
          <form class="billing-form"  method="post" action="{{ route('login') }}" >
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
            <div class="row" style="margin: 0 ; padding: 0">
                <div class="col-xs-12 mrg-top-5">
                    <span class="custom-checkbox">
                        <input type="checkbox" id="1">
                        <label for="1"></label>
                        @if (Route::has('password.request'))
                    </span> Forgat Password? <a href="{{ route('password.request') }}"
                        class="cl-success">Click Here</a>
                    @endif
                </div>
            </div>
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
@endsection
