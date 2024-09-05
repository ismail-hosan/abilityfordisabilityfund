@extends('frontend.masterTemp')
@section('fmenuname')
Training Details
@endsection
@section('front-main-content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title"
    style="background-image:url({{asset('/frontend_assets/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>Training Detail</h1>
    </div>
</section>
<div class="clearfix"></div>

<!-- training Detail Start -->
<section class="detail-desc">
    <div class="container white-shadow">

        <div class="row">

            <div class="detail-pic">
                @if(!empty($trainings->image))
                <img class="img-responsive" src="{{asset($trainings->image)}}" alt="User profile picture">
                @else
                <img class="img-responsive" src="{{asset('/memeberImage/noimage.png')}}" alt="User profile picture">
                @endif
            </div>

            <div class="detail-status">
                <span>{{\Carbon\Carbon::createFromTimeStamp(strtotime($trainings->created_at))->diffForHumans()}}
                </span>
            </div>
        </div>

        <div class="row bottom-mrg">
            <div class="col-md-12 col-sm-8">
                <div class="detail-desc-caption">
                    <h4>{{$trainings->title}}</h4>

                    <p>{!! $trainings->description !!}</p>

                </div>
            </div>

            <!-- <div class="col-md-4 col-sm-4">
                <div class="get-touch">
                    <h4>Get in Touch</h4>
                    <ul>
                        <li><i class="fa fa-map-marker"></i><span>Menlo Park, CA</span></li>
                        <li><i class="fa fa-envelope"></i><span>danieldax704@gmail.com</span></li>
                        <li><i class="fa fa-globe"></i><span>microft.com</span></li>
                        <li><i class="fa fa-phone"></i><span>0 123 456 7859</span></li>
                        <li><i class="fa fa-money"></i><span>$1000 -$1200/Month</span></li>
                    </ul>
                </div>
            </div> -->

        </div>

        <div class="row no-padd">
            <div class="detail pannel-footer">
                <div class="col-md-5 col-sm-5">

                </div>
                @if(auth()->check())
                @if($studentadmission)
                <div class="col-md-7 col-sm-7">
                    <div class="detail-pannel-footer-btn pull-right">
                        <button class="btn btn-success">You are already applied</button>
                        <!-- <a href="#" class="footer-btn blu-btn" title="">Save Draft</a> -->
                    </div>
                </div>
                @elseif($payment)
                <div class="col-md-7 col-sm-7">
                    <div class="detail-pannel-footer-btn pull-right" id="datacheck">
                        <button class="btn btn-info" id="admission">Apply For
                            Admission</button>
                        <!-- <a href="#" class="footer-btn blu-btn" title="">Save Draft</a> -->
                    </div>
                </div>
                @else
                <div class="col-md-7 col-sm-7">
                    <div class="detail-pannel-footer-btn pull-right">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#admission"
                            class="footer-btn blu-btn" title="">Unpaid Member</a>
                        <!-- <a href="#" class="footer-btn blu-btn" title="">Save Draft</a> -->
                    </div>
                </div>
                @endif
                @else
                <div class="col-md-7 col-sm-7">
                    <div class="detail-pannel-footer-btn pull-right">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#loginfortraining"
                            class="footer-btn blu-btn" title="">Login For Admission</a>
                        <!-- <a href="#" class="footer-btn blu-btn" title="">Save Draft</a> -->
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- training Detail End -->

<div class="modal fade" id="loginfortraining" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li role="" class="active" style="width: 100%"><a role="tab" data-toggle="tab">Sign In</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content" id="myModalLabel2">
                        <div role="tabpanel" class="tab-pane fade in active" id="login">

                            <div class="subscribe wow fadeInUp">
                                <form class="form-inline" method="post" action="{{ route('training.login')}}">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email Address" required="">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" required="">
                                            <input type="hidden" name="urlid" class="form-control"
                                                value="{{ $trainings->id }}">
                                            <div class="center">
                                                <button type="submit" id="login-btn" class="submit-btn"> Login
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#admission').on('click', function () {
            var trainingID = "{{$id}}";
            // var self = $(this).text('joyanta');
            // console.log(self);
            $.ajax({
                url: "{{route('training.admission.store')}}",
                method: "post",
                data: {
                    "_token": "{{csrf_token()}}",
                    trainingID: trainingID
                },
                success: function (data) {
                    $('#datacheck').html(data.button)

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    })

                }
            })
        })
    })
</script>
@endsection
