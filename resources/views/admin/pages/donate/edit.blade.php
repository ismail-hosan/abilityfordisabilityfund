@extends('admin.masterTemplate')

@section('menu-name')
Edit A Training
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Donations POST</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-blue text-center"> EDIT DONATIONS</div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="post"
                                        action="{{route('training.update',$donates->id)}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="">First Name*</label>
                                                <input type="text" value="{{$donates->first_name}}" name="first_name"
                                                    class="form-control" required>
                                            </div>
                                            @error('first_name')
                                            <div class="alert  alert-danger" style="padding: 0;">
                                                <strong>
                                                    {{$message}}
                                                </strong>
                                            </div>
                                            @enderror
                                            <div class="col-md-6 form-group">
                                                <label for="">Last Name*</label>
                                                <input type="text" name="last_name"
                                                    value="{{$donates->last_name}}" class="form-control" required>
                                            </div>
                                            @error('last_name')
                                            <div class="alert  alert-danger" style="padding: 0;">
                                                <strong>
                                                    {{$message}}
                                                </strong>
                                            </div>
                                            @enderror
                                            <div class="col-sm-6">
                                                <label for="inputName">Email*</label>
                                                <input type="email" name="email"
                                                    value="{{$donates->email}}" class="form-control" required>
                                                @error('email')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="first-name">Contact Number*</label>
                                                <input type="number" id="number" name="number" value="{{$donates->contact_number}}" class="form-control" required>
                                                @error('contact_number')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="first-name">Number of Child/Children You Want to Sponsor*</label>
                                                <select name="sponsor_number" id="sponsor_number" style="margin-bottom: 10px;border-radius: 5px;" class="form-control" required>
                                                    <option value="">--None--</option>
                                                    @for ($i = 1; $i <= 10; $i++)
                                                        <option value="{{ $i }}" {{ $i == $donates->sponsor_number ? 'selected' : '' }}>
                                                        {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('sponsor_number')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="first-name">Preferred Interval for Contribution*</label>
                                                <select name="contribution_type" id="contribution_type" style="margin-bottom: 10px;border-radius: 5px;" class="form-control" required>
                                                    <option value="">--None--</option>
                                                    <option value="Monthly" {{ $donates->contribution_type == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                                    <option value="Yearly" {{ $donates->contribution_type == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                                                    <option value="OneTime" {{ $donates->contribution_type == 'OneTime' ? 'selected' : '' }}>OneTime</option>
                                                </select>
                                                @error('contribution_type')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


@endsection
<!-- Content Wrapper. Contains page content -->