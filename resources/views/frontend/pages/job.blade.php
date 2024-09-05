@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title"
    style="background-image:url(https://mars-metcdn-com.global.ssl.fastly.net/content/uploads/sites/101/2019/04/30162428/Top-Header-Background.png);">
    <div class="container">
        <h3>Jobs Details</h3>

    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- ========== Begin: Brows job Category ===============  -->
<section class="brows-job-category">
    <div class="container">
        <!-- Company Searrch Filter Start -->
        <div class="row extra-mrg">
            <div class="wrap-search-filter">
                <form id="jobSearchForm" method="post">
                    @csrf
                    <div class="col-md-4 col-sm-4">
                        <input type="text" class="form-control searchTitle" id="jobtitle" name="title"
                            placeholder="Keyword: Name, Tag">
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <select id="choose-city" name="category" class="form-control searchCategory">
                            <option selected disabled>Choose Category</option>
                            @foreach($categorys as $value)
                            <option {{$id==$value->id ? "selected":""}} value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-2 col-sm-2">
                        <button type="submit" class="btn btn-success full-width">Filter</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Company Searrch Filter End -->

        <!--Browse Job In Grid-->
        <div class="row extra-mrg" id="jobfilter">


            @foreach($allJobs as $eachJob)
            <div class="col-md-4 col-sm-6">
                <div class="grid-view brows-job-list">
                    <div class="brows-job-company-img">
                        @if(!empty($eachJob->image))
                        <img class="img-responsive" src="{{asset('/images/' . $eachJob->image)}}"
                            alt="User profile picture">
                        @else
                        <img class="img-responsive" src="{{asset('/memeberImage/noimage.png')}}"
                            alt="User profile picture">
                        @endif

                    </div>
                    <div class="brows-job-position">
                        <h3><a href="/jobView/{{ $eachJob->id }}">{{ $eachJob->job_category }}</a></h3>
                        <p><span>{{ $eachJob->address }}</span></p>
                    </div>
                    <div class="job-position">
                        <span class="job-num">{{ $eachJob->number_of_vacancies }} Position</span>
                    </div>
                    <div class="brows-job-type">
                        <?php
                        $empStatus = explode(',', $eachJob->employee_status);
                        $countStatus = count($empStatus);
                        ?>
                        @if(count($empStatus) < 2) <span class="full-time">
                            {{ $eachJob->employee_status }}
                            </span>
                            @else
                            <span class="part-time">
                                Multi
                            </span>
                            @endif

                            <!--{{ $eachJob->employee_status }}-->
                            <!--                        <span class="part-time">Part Time</span>
                         <span class="freelanc">Freelancer</span>
                         <span class="enternship">Enternship</span>-->
                    </div>
                    <ul class="grid-view-caption">
                        <li style="width: 70%">
                            <div class="brows-job-location">
                                <p><i class="fa fa-globe"></i>{{ $eachJob->url }}</p>
                            </div>
                        </li>
                        <li>
                            <p><i class="fa fa-calendar"></i> {{ date('d-m-Y',
                                strtotime($eachJob->application_deadline)) }}</p>
                        </li>
                    </ul>
                    <span class="tg-themetag tg-featuretag">Premium</span>
                </div>
            </div>
            @endforeach
        </div>
        <!--/.Browse Job In Grid-->


    </div>
</section>All-job
@section('script')
<script>
    $(document).ready(function () {
        $('#jobSearchForm').on('submit', function (e) {
            e.preventDefault();
            var title = $('.searchTitle').val();
            var category = $('.searchCategory').val();

            $.ajax({
                url: "{{route('job.search')}}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    title: title,
                    category: category,
                },

                success: function (data) {

                    // $('#jobfilter').html(data).fadeIn('slow');
                    $('#jobfilter').hide().html(data).fadeIn(1000);
                },
            })
        })
    })
</script>
@endsection
@endsection
