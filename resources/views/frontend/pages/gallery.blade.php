@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')
{{-- <style type="text/css">
    .grid-view.brows-job-lis {
        position: relative;
        text-align: center;
        padding-bottom: 0;
        margin-bottom: 45px;
    }
    .brows-job-lis {
        display: table;
        width: 100%;
        clear: both;
        padding: 15px 0;
        padding-bottom: 15px;
        margin-bottom: 15px;
        transition: .4s;
        border: 1px solid #eaeff5;
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 0 10px 0 rgba(88, 96, 109, .14);
        -webkit-box-shadow: 0 0 10px 0 rgba(88, 96, 109, .14);
        -moz-box-shadow: 0 0 10px 0 rgba(88, 96, 109, .14);
    }
</style> --}}
<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title"
    style="background-image:url(https://user-images.githubusercontent.com/513929/53929982-e5497700-404c-11e9-8393-dece0b196c98.png);">
    <div class="container">
        <h1>GALLERY</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->
<br><br> 
<div class="container">
    <div class="i-box">
        <div class="i-head">
            <div class="i-body">
                <div class="row">
                    @foreach($galleriImages as $gallery)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <img src="{{ asset('/uploads/gallery/'.$gallery->images) }}" width="100%" class="img-thumbnail" style="width: 100%; height: 300px; object-fit: cover;" alt="...">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<section class="brows-job-category">


    {{-- <div class="container">
        @if( count($galleriImages) == 0)
        <h1 class="text-center opacity-3">There are no image found !</h1>
        @else
        <div class="row">
            @foreach($galleriImages as $gallery)
            <div class="col-md-4">
                        <img width="100%" src="{{ asset('/uploads/gallery/'.$gallery->images)}}"  alt="" />
              
            </div>
            @endforeach
        </div>
        @endif
    </div> --}}
</section>
@endsection
