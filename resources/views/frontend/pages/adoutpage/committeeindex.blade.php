@extends('frontend.masterTemp')
@section('fmenuname')
{{App\Models\Category::where('id',$pagename)->pluck('title')->first() }}
@endsection
@section('front-main-content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(https://i.pinimg.com/originals/0c/72/d1/0c72d1d68451748664c67e2d5ac152a1.png);">
    <div class="container">
    <h1>{{App\Models\Category::where('id',$pagename)->pluck('title')->first() }}</h1>
    </div>
</section>

<div class="clearfix"> </div>

@if( count($viewpageedit) == 0)
<br>
<br>
<h1 class="text-center" style="opacity: 0.5;"><b> Nothing Found</b></h1>
<br><br><br><br><br>
@else
<section class="full-detail-description full-detail">
    <div class="container">
        <div class="row row-bottom">
            <h2 class="detail-title"> {{App\Models\Category::where('id',$pagename)->pluck('title')->first()}} </h2>
            @foreach($viewpageedit as $description)
            <p>{!! $description->content !!}</p>
            <br><br>
            @endforeach
        </div>
    </div>
</section>
@endif
<div class="clearfix"></div>


@endsection