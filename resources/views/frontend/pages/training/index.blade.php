@extends('frontend.masterTemp')
@section('fmenuname')
Training
@endsection
@section('front-main-content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title"
    style="background-image:url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE135F8vF4FlCvqBO1MsnR7OywdQBz0_epKg&usqp=CAU);">
    <div class="container">
        <h1>Training</h1>
        <p></p>
    </div>
</section>

<section class="brows-job-category">
    <div class="container">
        <!-- Company Searrch Filter Start -->
        <div class="row extra-mrg">
            <div class="wrap-search-filter">
                <form id="trainingSearchForm" method="post">
                    @csrf
                    <div class="col-md-4 col-sm-4">
                        <input type="text" class="form-control searchTitle" id="jobtitle" name="title"
                            placeholder="Keyword: Name, Tag">
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <select id="choose-city" name="category" class="form-control searchCategory">
                            <option selected disabled>Choose Category</option>
                            @foreach($categorys as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-2 col-sm-2">
                        <button type="submit" class="btn btn-success full-width">Filter</button>
                    </div>
                    <div class="col-md-2 col-sm-2 ">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-success"
                                onclick="searchTrainingType('Paid')">Paid</button>
                            <button type="button" class="btn btn-warning" onclick="searchTrainingType('Free')">
                                Free</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row extra-mrg" id="trainingview">
                @foreach($trainings as $value)
                <div class="col-md-4 col-sm-6">
                    <div class="grid-view brows-job-list" style=" min-height: 300px">
                        <div class="brows-job-company-img">
                            @if(!empty($value->image))
                            <a href="{{asset($value->image)}}"><img class="img-responsive"
                                    src="{{asset($value->image)}}" alt="User profile picture"></a>
                            @else
                            <img class="img-responsive" src="{{asset('/memeberImage/noimage.png')}}"
                                alt="User profile picture">
                            @endif
                        </div>
                        <div class="brows-job-position">
                            <h4><a href="{{route('training.details',$value->id)}}"> {{Str::limit($value->title,
                                    64,$end='.......')}}</a>
                            </h4>
                        </div>
                        <div class="job-position">
                            <span class="job-num">{{$value->techer_name}}</span>
                        </div>
                        <br>

                        <div class="brows-job-type">
                            @if($value->type == "Free")
                            <span class="full-time bg-warning">{{$value->type}}</span>
                            @elseif($value->type == "Paid")
                            <span class="full-time bg-success">{{$value->type}}</span>
                            @endif
                        </div>
                        <ul class="grid-view-caption">
                            <li>
                                <div class="brows-job-location">
                                    <p><i class="fa fa-calendar"></i>{{
                                        \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans()}}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <p><span class="brows-job-sallery"><i class="fa fa-money"></i>{{$value->type == "Free" ?
                                        "0.00":$value->amount}} TK</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Company Searrch Filter End -->

        <!--Browse Job In Grid-->
        <div class="row extra-mrg" id="jobfilter">

        </div>
        <!--/.Browse Job In Grid-->
    </div>
</section>

@endsection

@section('script')
<script>

    function searchTrainingType(value) {

        $.ajax({
            url: "{{route('training.type.search')}}",
            method: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                value: value,
            },
            success: function (data) {
                $('#trainingview').hide().html(data).fadeIn(1000);
            },
        })
    }

    $(document).ready(function () {
        $('#trainingSearchForm').on('submit', function (e) {
            e.preventDefault();
            var title = $('.searchTitle').val();
            var category = $('.searchCategory').val();

            $.ajax({
                url: "{{route('training.search')}}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    title: title,
                    category: category,
                },

                success: function (data) {

                    // $('#jobfilter').html(data).fadeIn('slow');
                    $('#trainingview').hide().html(data).fadeIn(1000);
                },
            })
        })
    })
</script>
@endsection
