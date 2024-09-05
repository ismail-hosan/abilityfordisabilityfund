@extends('admin.masterTemplate')

@section('menu-name')
PROFILE DETAILS
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Member Details</h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row" style="border: 1px solid lightgrey; background: white">
                <!-- /.col --
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-12">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">

                                <h3 class="widget-user-username">
                                    <?php if(!empty($userDetails->name)){ echo $userDetails->name; } ?></h3>
                                <h5 class="widget-user-desc">
                                    <?php if(!empty($userDetails->designation)){ echo $userDetails->designation; } ?>
                                </h5>
                            </div>
                            <div class="widget-user-image">
                                @if(!empty($userDetails->image))
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset('/images/' . $userDetails->image)}}" alt="User profile picture">
                                @else
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset('/memeberImage/noimage.png')}}" alt="User profile picture">
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <span class="description-text"
                                                style="text-decoration: underline; font-weight: bold">-: Basic Info
                                                :-</span>
                                            <h6 class="">{{ $userDetails->dob }}</h6>
                                            <h6 class="">{{ $userDetails->phone }}</h6>
                                            <h6 class="">{{ $userDetails->email }}</h6>
                                            <h6 class=""> {{ $userDetails->area }}</h6>
                                            <h6 class="">
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
                                                @elseif(empty($userDetails->blood))
                                                {{ 'Unknown' }}
                                                @endif
                                            </h6>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <span class="description-text"
                                                style="text-decoration: underline; font-weight: bold">-: Education Info
                                                :-</span>
                                            <h6 class="">{{ $userDetails->education }}</h6>
                                            <h6 class="">{{ $userDetails->e_uv }}</h6>
                                            <h6 class="">{{ $userDetails->e_year }}</h6>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <div class="col-sm-4 ">
                                        <div class="description-block">
                                            <span class="description-text"
                                                style="text-decoration: underline; font-weight: bold">-: job Info
                                                :-</span>
                                            <h6 class=""> {{ $userDetails->company }}</h6>
                                            <h6 class="">{{ $userDetails->c_designation }}</h6>

                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->

                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>

                        </div>
                        <!-- /.widget-user -->
                    </div>
                </div>
                <!-- /.card-body -->

                <!--                <div class="col-sm-12 ">

                    <div class="card">
                        <div class="card-header bg-green">
                            dfdff
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th style="text-align: right">Amount</th>
                                </tr>
                                <tr>
                                    <td>10-10-1010</td>
                                    <td>1</td>
                                    <td style="text-align: right">2000</td>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: center">TOTAL</th>
                                    <td style="text-align: right">2000</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
</div>
<br>
<!-- /.content -->


@endsection
<!-- Content Wrapper. Contains page content -->
