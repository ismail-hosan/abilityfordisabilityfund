@extends('frontend.masterTemp')
@section('fmenuname')
Project
@endsection
@section('front-main-content')


<div class="clearfix" style="margin-bottom: 96px;"></div>


<style>
    @media (min-width: 1200px) {
        .container {
            width: 1200px;
        }

        span {
            color: black;
        }

        ul {
            padding-left: 49px;
        }

        p {
            color: black;
        }
    }

    .section-title {
        display: flex;
        align-items: center;
        text-align: center;
        font-size: 18px;
        color: #000;
        width: 50%;
        /* Set the text color */
    }

    .section-title::before,
    .section-title::after {
        content: "";
        flex-grow: 1;
        height: 1px;
        background-color: #000;
        /* Set the line color */
        margin: 0 10px;
    }

    .card {
        height: 394px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;

    }

    .col-md-4 {
        padding-top: 28px;
    }
</style>

<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <img style="width: 100%;border-radius:20px" src="{{ asset( $project->image) }}"
                    alt="{{ $project->alt ?? 'ability' }}">
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>{{$project->name}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $project->desc !!}
                </div>
            </div>

        </div>
    </div>
    <br><br>
    <div class="col-md-12" style="display: flex;justify-content:center">
        <div class="section-title">
            Read More Completed Projects
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="col-md-12" style="padding: 0px 80px;">
            @foreach($projects as $project)
            <div class="col-md-4">
                <div class="card">
                    <a href="{{ route('project.show', ['slug' => $project->slug]) }}">
                        <img src="{{ asset($project->image)}}" style="width:35rem;height: 23rem;" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 21px;font-weight: 600;line-height: 25px;">{{$project->name ??''}}</h5>
                            <a href="{{ route('project.show', ['slug' => $project->slug]) }}" class="" style="color:blue;padding:0px 10px">Read More »</a>
                        </div>
                    </a>
                </div>
                
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
            @endforeach
        </div>
</section>
@endsection