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
        <h1>MISSION</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- ========== Begin: Brows job Category ===============  -->
<section class="brows-job-category">
    <div class="container">
        <div class="ibox">
            <div class="i-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 35rem;">
                            <img src="{{ URL::to('/') }}/frontend_assets/assets/img/demo2.png" style="width:35rem" class="card-img-top img-responsive" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="width: 35rem;">
                            <img src="{{ URL::to('/') }}/frontend_assets/assets/img/demo2.png" style="width:35rem" class="card-img-top img-responsive" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card " style="width: 35rem;">
                            <img src="{{ URL::to('/') }}/frontend_assets/assets/img/demo2.png" style="width:35rem" class="card-img-top img-responsive" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========== Begin: Brows job Category End ===============  -->
@endsection
