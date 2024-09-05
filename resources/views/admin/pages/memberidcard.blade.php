@extends('admin.masterTemplate')

@section('menu-name')
ID Card
@endsection
@section('main-content')

<style>
    .fixed-dimantion {
        width: 300px;
        height: 450px;
        overflow: hidden;
        border: 1px solid #dfdcdc;
    }

    .bg_radius {
        border-top-left-radius: 32% !important;
    }

    .bgc_green {
        background: #005500 !important;
        -webkit-print-color-adjust: exact;
    }

    .position-relative {
        position: relative;
    }

    .position-absolute {
        position: absolute;
    }

    .position-0 {
        top: 0;
        left: 0;
    }

    .dif_for_bg {
        background: white;
        -webkit-print-color-adjust: exact;
        width: 100%;
        height: 92%;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        overflow: hidden;
    }

    .layer {
        width: 100%;
        height: 100%;
        background: white !important;
        -webkit-print-color-adjust: exact;
        opacity: .9;
    }

    .inner_content {
        background: transparent !important;
        -webkit-print-color-adjust: exact;
        width: 100%;
    }

    .border-style {
        border-radius: 20px;
    }

    .user-img-profile {
        width: 30%;
        height: 90%
    }

    .footer-style {
        background: green !important;
        -webkit-print-color-adjust: exact;
    }

    .header-title {
        font-size: 16px;
        color: black;
    }

    .profile-img {
        z-index: 20;
        border: 1px solid #000000;
    }

    .box-profile {
        margin: -15px 0 0 40px;
    }

    .footer-content {
        width: 100%;
        text-align: center;
    }

    .font-18 {
        font-size: 18px;

    }

    .footer-content .footer-url {
        color: white;
        font-weight: 600;
        padding-top: 4px;
        font-size: 16px;
        display: inline-block;
    }

    .footer-left-img {
        width: 80px;
        height: auto;
        transform: translate(-12px, -30px);
        position: absolute;
        left: 0;
    }

    .top-image {
        top: 0;
        right: 0;
        width: 62px;
    }

    .image-signature {
        float: left;
        width: 80px;
        transform: translateX(-20px);
    }

    .footer-logo {
        float: right;
        width: 65px;
        transform: translate(0px, 6px);
    }

    @media print {

        .fixed-dimantion {
            width: 300px;
            height: 450px;
            overflow: hidden;
            border: 1px solid #dfdcdc;
        }

        .bg_radius {
            border-top-left-radius: 32% !important;
        }

        .bgc_green {
            background: #005500 !important;
            -webkit-print-color-adjust: exact;
        }

        .position-relative {
            position: relative;
        }

        .position-absolute {
            position: absolute;
        }

        .position-0 {
            top: 0;
            left: 0;
        }

        .dif_for_bg {
            background: white;
            width: 100%;
            height: 92%;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: contain;
            overflow: hidden;
        }

        .layer {
            width: 100%;
            height: 100%;
            background: white !important;
            -webkit-print-color-adjust: exact;
            opacity: .9;
        }

        .inner_content {
            background: transparent !important;
            -webkit-print-color-adjust: exact;
            width: 100%;
        }

        .border-style {
            border-radius: 20px;
        }

        .user-img-profile {
            width: 30%;
            height: 90%
        }

        .footer-style {
            background: green !important;
            -webkit-print-color-adjust: exact;
        }

        .header-title {
            font-size: 16px;
            color: black;
        }

        .profile-img {
            z-index: 20;
            border: 1px solid #000000;
        }

        .box-profile {
            margin: -15px 0 0 40px;
        }

        .footer-content {
            width: 100%;
            text-align: center;
        }

        .font-18 {
            font-size: 18px;

        }

        .footer-content .footer-url {
            color: white;
            font-weight: 600;
            padding-top: 4px;
            font-size: 16px;
            display: inline-block;
        }

        .footer-left-img {
            width: 80px;
            height: auto;
            transform: translate(-12px, -30px);
            position: absolute;
            left: 0;
        }

        .top-image {
            top: 0;
            right: 0;
            width: 62px;
        }

        .image-signature {
            float: left;
            width: 80px;
            transform: translateX(-20px);
        }

        .footer-logo {
            float: right;
            width: 65px;
            transform: translate(0px, 6px);
        }
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">ID Card</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <section class="content">
        <div class="container-fluid">
            @if($userDetails->payment == 0)

            <h1 class="text-center">You have not yet paid.<br>Click here to make payment <br> <a
                    href="{{'/Member-payment'}}" class="btn btn-success">Click</a></h1>

            @elseif($userDetails->payment == 1)
            <div class="row justify-content-center">
                <div class="fixed-dimantion bgc_green position-relative">
                    <div class="position-relative dif_for_bg bg_radius"
                        style="background-image: url('images/OUTsd-Logo.png');">
                        <div class="layer bg_radius text-center"></div>

                        <img class="top-image position-absolute" src="{{asset('admin_assets/card/20.png')}}" alt="">

                        <div class="inner_content position-absolute position-0">
                            <h6 class="pt-5 pb-4 text-center font-weight-bold">Bangladesh Industrial <br>Engineer's
                                Association(BIEA)
                            </h6>

                            <div class="text-center">
                                @if(!empty($userDetails->image))
                                <img class="profile-user-img img-fluid rounded userimg"
                                    src="{{asset('/images/' . $userDetails->image)}}" alt="User profile picture">
                                @else
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset('memeberImage/noimage.png')}}" alt="User profile picture">
                                @endif
                            </div>
                            <p class="pb-2 m-0 font-18 text-center font-weight-bold">{{ $userDetails->name }}</p>
                            <div class="card-body box-profile font-weight-bold text-left">

                                <p class="text-left p-0 m-0"> Member:
                                    {{!empty($memberplans->title)? $memberplans->title : '' }}
                                </p>
                                <p class="p-0 m-0"> ID: {{ $userDetails->id_number }}</p>
                                <p class="p-0 m-0">Blood group:
                                    @if($userDetails->blood ==1)
                                    {{ 'A+' }}
                                    @elseif($userDetails->blood ==2)
                                    {{ 'A-' }}
                                    @elseif($userDetails->blood ==3)
                                    {{ 'B+' }}
                                    @elseif($userDetails->blood ==4)
                                    {{ 'B-' }}
                                    @elseif($userDetails->blood ==5)
                                    {{ 'O+' }}
                                    @elseif($userDetails->blood ==6)
                                    {{ 'O-' }}
                                    @elseif($userDetails->blood ==7)
                                    {{ 'AB+' }}
                                    @elseif($userDetails->blood ==8)
                                    {{ 'AB-' }}
                                    @elseif($userDetails->blood ==9)
                                    {{ 'Unknown' }}
                                    @endif

                                </p>
                                <p class="p-0 m-0">Mobile : {{ $userDetails->phone ?? '' }}</p>

                                <img class="image-signature" src="{{asset('admin_assets/logo/signeture.png')}}">
                                <img class="footer-logo" src="{{asset('admin_assets/logo/flogo.png')}}">
                            </div>

                        </div>
                    </div>
                    <div class="footer-content">
                        <img class="footer-left-img" src="{{asset('admin_assets/card/21.png')}}">
                        <span class="footer-url">
                            www.bieabangladesh.org
                        </span>
                    </div>
                </div>
            </div>
            <button class="btn btn-info" id="printPageButton" onclick="window.print()">Print</button>
            @endif
        </div>

    </section>

</div>
@endsection
<!-- Content Wrapper. Contains page content -->
