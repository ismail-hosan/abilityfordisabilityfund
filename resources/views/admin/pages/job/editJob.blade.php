@extends('admin.masterTemplate')

@section('menu-name')
POST A JOB
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">JOB POST</h5>
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
                        <div class="card-header bg-blue text-center">-:Edit POST JOB :-</div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="post"
                                        action="{{ route('job.post.update',$allJobs->id)}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Job Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="job_category"
                                                    value="{{$allJobs->job_category}}" class="form-control" id=""
                                                    placeholder="Job Title">
                                                @error('job_category')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                    <br>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Job Category</label>
                                            <div class="col-sm-9">
                                                <select name="job_type" class="form-control select2">
                                                    <option selected disabled>--Select Category--</option>
                                                    @foreach($alljobcategorys as $value)
                                                    <option {{ $allJobs->job_type == $value->id ? "selected":""}}
                                                        value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('job_type')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                    <br>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Job
                                                Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="textarea" style="padding: 36px!important;"
                                                    name="job_description"
                                                    placeholder="Full Job Description with Contact info"
                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                    {!! $allJobs->job_description !!}
                                                </textarea>
                                                @error('establishment')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                    <br>
                                                </div>
                                                @enderror
                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label"> Number Of Vacancies
                                                *</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="number_of_vacancies"
                                                    value="{{$allJobs->number_of_vacancies}}" class="form-control" id=""
                                                    placeholder="Number Of Vacancies">
                                            </div>
                                            <div class="col-sm-2 pt-2">
                                                <input type="checkbox" name="number_of_vacancies"
                                                    {{$allJobs->number_of_vacancies == null ? "checked":""}}> Undefined
                                            </div>

                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label"> Employee Status *</label>
                                    <div class="col-sm-9 pt-2">
                                        <input type="checkbox" class="form-check-label" {{$allJobs->employee_status
                                        == "Full Time" ? "checked":""}} name="employee_status[]"
                                        value="Full Time"> Full Time
                                        <input type="checkbox" {{$allJobs->employee_status
                                        == "Part Time" ? "checked":""}} class="form-check-label"
                                        name="employee_status[]"
                                        value="Part Time"> Part Time
                                        <input type="checkbox" {{$allJobs->employee_status
                                        == "Contractual" ? "checked":""}} class="form-check-label"
                                        name="employee_status[]"
                                        value="Contractual"> Contractual
                                        <input type="checkbox" {{$allJobs->employee_status
                                        == "Internship" ? "checked":""}} class="form-check-label"
                                        name="employee_status[]"
                                        value="Internship"> Internship
                                        <input type="checkbox" {{$allJobs->employee_status
                                        == "Freelance" ? "checked":""}} class="form-check-label"
                                        name="employee_status[]"
                                        value="Freelance"> Freelance
                                        @error('industry_type')
                                        <div class="alert  alert-danger" style="padding: 0;">
                                            <strong>
                                                {{$message}}
                                            </strong>
                                            <br>
                                        </div>
                                        @enderror
                                    </div>
                                </div>





                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Application Deadline
                                        *</label>
                                    <div class="col-sm-3">
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" value="{{$allJobs->application_deadline}}"
                                                name="application_deadline" class="form-control datetimepicker-input"
                                                data-target="#reservationdate" />
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('trade_license')
                                        <div class="alert  alert-danger" style="padding: 0;">
                                            <strong>
                                                {{$message}}
                                            </strong>
                                            <br>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class=" col-sm-3 "></div>
                                    <div class=" col-sm-3 ">
                                        <button type="submit" class="btn btn-info btn-block">POST JOB</button>
                                    </div>
                                </div>
                                </form>
                            </div>

                            <!-- /.tab-pane -->


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
