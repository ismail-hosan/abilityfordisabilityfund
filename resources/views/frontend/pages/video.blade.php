@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')
<style type="text/css">
    .card {
        margin-bottom: 30px;
        margin-top: 30px;
        shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .embed-responsive {
        border: 5px solid #a7a7a7;
    }
</style>
<div class="clearfix"></div>
<section class="inner-header-title" style="background-image:url(https://i.pinimg.com/originals/d2/7a/7c/d27a7c048f9e8cf8c77add494dc64fbc.jpg);">
    <div class="container">
        <h1>Video</h1>
    </div>
</section>

<div class="container">
    <div class="i-box">
        <div class="i-head">
            <div class="i-body">
                <div class="row">
                    @foreach($videoget as $video)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="560" height="315"
                                        src="{{$video->video}}"
                                        title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection