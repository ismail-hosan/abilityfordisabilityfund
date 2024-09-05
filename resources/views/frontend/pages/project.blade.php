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
        <h1>PROJECT</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<style>
    .card {
        width: 35rem;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        height: 394px;
    }

    .col-md-4 {
        padding-top: 28px;
    }
</style>

<!-- ========== Begin: Brows job Category ===============  -->
<section class="brows-job-category">
    <div class="container">
        <div class="ibox">
            <div class="i-body">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($projects as $project)
                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{ route('project.show', ['slug' => $project->slug]) }}">
                                    <img src="{{ asset($project->image)}}" style="width:35rem;height: 23rem;" class="card-img-top img-responsive" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-size: 21px;font-weight: 600;line-height: 25px;margin-bottom: 38px;">{{$project->name ??''}}</h5>
                                        <a href="{{ route('project.show', ['slug' => $project->slug]) }}" class="" style="color:blue">Read More »</a>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <!-- <div class="col-md-4">
                            <div class="card">
                                <img src="{{ URL::to('/') }}/frontend_assets/assets/img/demo2.png" style="width:35rem" class="card-img-top img-responsive" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ URL::to('/') }}/frontend_assets/assets/img/demo2.png" style="width:35rem" class="card-img-top img-responsive" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========== Begin: Brows job Category End ===============  -->
@endsection