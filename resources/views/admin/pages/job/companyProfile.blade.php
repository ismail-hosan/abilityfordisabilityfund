@extends('admin.masterTemplate')

@section('menu-name')
COMPANY PROFILE
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">COMPANY PROFILE</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{ route('edit-comp') }}" class="btn btn-xs btn-info float-right"><i
                            class="fa fa-edit"></i> EDIT PROFILE</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header bg-blue text-center">-: COMPANY PROFILE DETAILS :-</div>
                        <div class="card-body box-profile">

                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tr>

                                            <td colspan="3" style="text-align : center">
                                                @if(!empty($userDetails->image))
                                                <img class="profile-user-img img-fluid img-circle"
                                                    src="{{asset('images/' . $userDetails->image)}}"
                                                    alt="User profile picture">
                                                @else
                                                <img class="profile-user-img img-fluid img-circle"
                                                    src="{{asset('/memeberImage/noimage.png')}}"
                                                    alt="User profile picture">
                                                @endif
                                                <br>
                                                <h5> {{ $userDetails->name }}</h5>
                                                <h5> {{ $userDetails->email }}</h5>
                                                <em> {{ $userDetails->address }}</em> <br>
                                                <a target="_blank" href="{{ $userDetails->url }}">{{ $userDetails->url
                                                    }}</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th width="25%">Establishment</th>
                                            <th width="1%">:</th>
                                            <td>{{ $userDetails->establishment }}</td>
                                        </tr>

                                        <tr>
                                            <th>Division</th>
                                            <th>:</th>
                                            <td>{{ $userDetails->diviName }}</td>
                                        </tr>
                                        <tr>
                                            <th>District</th>
                                            <th>:</th>
                                            <td>{{ $userDetails->distName }}</td>
                                        </tr>
                                        <tr>
                                            <th>Thana</th>
                                            <th>:</th>
                                            <td>{{ $userDetails->thanaName }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Type</th>
                                            <th>:</th>
                                            <td>{{ $userDetails->industry_type }}</td>
                                        </tr>
                                        <tr>
                                            <th>Trade license</th>
                                            <th>:</th>
                                            <td>{{ $userDetails->trade_license }}</td>
                                        </tr>
                                        <tr>
                                            <th>Registration</th>
                                            <th>:</th>
                                            <td>{{ $userDetails->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Person Name</th>
                                            <th>:</th>
                                            <td>{{ $userDetails->contact_person }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Person Designation</th>
                                            <th>:</th>
                                            <td>{{ $userDetails->contact_designation }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Person Email</th>
                                            <th>:</th>
                                            <td>{{ $userDetails->contact_email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Person Phone</th>
                                            <th>:</th>
                                            <td>{{ $userDetails->contact_person_phone }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div><!-- /.container-fluid -->



@endsection
<!-- Content Wrapper. Contains page content -->
