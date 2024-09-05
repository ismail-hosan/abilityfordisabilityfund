@extends('frontend.masterTemp')
@section('fmenuname')
RULES
@endsection
@section('front-main-content')
<style type="text/css">
    .principle{
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .principle h2{
        color: #016401;
    }
    .principle img{
        width: 200px;
    }
    .principle h3{
        background: #016401;
        color: #ffff;
        display: block;
        padding: 5px 0px;
    }
    .principle p{
    }
</style>
<div class="clearfix"></div>
<section class="inner-header-title" >
    <div class="container">
        <h1>Terms and Conditions</h1>
    </div>
</section>
<div class="clearfix"></div>
<div class="principle">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 banner-text">{!! $rulesdetails->rules !!}</div>
        </div>

    </div>
</div>
<div class="clearfix"></div>
@endsection

