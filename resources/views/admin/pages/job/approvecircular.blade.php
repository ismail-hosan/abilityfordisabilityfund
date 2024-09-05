@extends('admin.masterTemplate')
@section('menu-name')
ALL APPLIED
@endsection
@section('main-content')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Job Circular</h5>
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
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> All Jobs</h3>
                        </div>

                        <div class="card-body" id="datereturn">
                            <table id="example1" class="table table-bordered table-striped  ">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Deadline</th>
                                        <th>Vacancies</th>
                                        <th class="whatever">Details</th>
                                        <th>Post By</th>
                                        <th>Status</th>
                                        <th>Approved By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach($joblist as $no=>$job)
                                    <tr id="datereturn">
                                        <td>{{$no+1}}</td>
                                        <td>{{$job->job_category}}</td>
                                        <td>{{$job->application_deadline}}</td>
                                        <td>{{$job->number_of_vacancies}}</td>
                                        <td class="whatever">{!! $job->job_description !!}</td>
                                        <td>{{ Auth::user()->where('id',$job->user_id)->pluck('name')->first() }}</td>
                                        <td>
                                            @if($job->status == 1)
                                            <i class="fa fa-eye" style="color: green"></i>
                                            @else
                                            <i class="fa fa-eye-slash" style="color: orange"></i>
                                            @endif
                                        </td>
                                        <td>{{ $job->approved_by }}</td>
                                        <td>
                                            @if($job->status == 1)
                                            <a onclick="jobpoststatus('<?php echo $job->id; ?>', '0')" class="btn btn-sm btn-danger">Unapprove</a>
                                            @else
                                            <a onclick="jobpoststatus('<?php echo $job->id; ?>', '1')" class="btn btn-sm btn-info">Approve</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function jobpoststatus(job_id, status) {

        $.ajax({
            type: "Post",
            url: '/jobpoststatus',
            data: {
                "_token": "{{ csrf_token() }}",
                job_id: job_id,
                status: status
            },
            success: function(val) {
                $("#datereturn").html(val);
            }
        })
    }
</script>

@endsection