@extends('frontend.masterTemp')
@section('fmenuname')
SIGN IN
@endsection
@section('front-main-content')
<section class="inner-header-title"  style="background-image:url(https://user-images.githubusercontent.com/513929/53929982-e5497700-404c-11e9-8393-dece0b196c98.png);">
    <div class="container">
        <h2>Create An Account</h2>
    </div>
</section>
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

{{-- <div class="container">
    <div class="ibox">
        <div class="i-body">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-3">
                        <form class="billing-form" method="post" action="{{ route('regstore') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Full Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Your Name" />
                                    @error('name')
                                    <div class="alert alert-danger" style="padding: 0;">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                        <br>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12 ">
                                    <label>Phone Number</label>
                                    <input type="text" value="{{old('phone')}}" name="phone" class="form-control" placeholder="Enter Your Phone" />
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
                                <div class="col-md-4 col-xs-12 col-sm-12 ">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" />
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
                                    <label> Country </label>
                                    <input type="text" name="country" class="form-control" placeholder="Enter Your Country Name">
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <label> City </label>
                                    <input type="text" name="city" class="form-control" placeholder="Enter Your City Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password" />
                                </div>
                                <div class="col-xs-6">
                                    <label>Confirm Password</label>
                                    <input type="password" value="{{ old('confirm_password') }}" name="confirm_password"class="form-control" placeholder="Re-Enter Your password" />
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
                                    </span> I agree with terms and Conditions <a target="_blank"
                                        href="{{ url('/Our-Rules')}}" style="color: red">Rules</a>
                                </div>
                            </div>
                            <div class="row mrg-top-30">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-success" type="submit">SignUp</button>
                                </div>
                            </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- <hr> --}}

{{-- <section class="contact-from pt-4"> --}}
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
            <form class="billing-form" method="post" action="{{ route('regstore') }}">
                @csrf
                <div class="row">
                    <div class="col-xs-6">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Your Name" />
                        @error('name')
                        <div class="alert alert-danger" style="padding: 0;">
                            <strong>
                                {{$message}}
                            </strong>
                            <br>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12 ">
                        <label>Phone Number</label>
                        <input type="text" value="{{old('phone')}}" name="phone" class="form-control" placeholder="Enter Your Phone" />
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
                    <div class="col-md-4 col-xs-12 col-sm-12 ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" />
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
                        <label> Country </label>
                        <input type="text" name="country" class="form-control" placeholder="Enter Your Country Name">
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-12">
                        <label> City </label>
                        <input type="text" name="city" class="form-control" placeholder="Enter Your City Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password" />
                    </div>
                    <div class="col-xs-6">
                        <label>Confirm Password</label>
                        <input type="password" value="{{ old('confirm_password') }}" name="confirm_password"class="form-control" placeholder="Re-Enter Your password" />
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
                        </span> I agree with terms and Conditions <a target="_blank"
                            href="{{ url('/Our-Rules')}}" style="color: red">Rules</a>
                    </div>
                </div>
                <div class="row" style="margin: 0 ; padding: 0">
                    <div class="col-xs-12 mrg-top-5">
                        If you have an account? <a href="{{ route('login') }}"
                            class="cl-success">Login Here</a>
                    </div>
                </div>
                <div class="row mrg-top-30">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-success" type="submit">SignUp</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  {{-- </section> --}}



<script>
    $(document).ready(function () {
        $('#division').change(function () {
            var division = $('#division').val();

            $.ajax({
                type: "post",
                url: "/showDistList", // path to function
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
                url: "/showThanaList", // path to function
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
