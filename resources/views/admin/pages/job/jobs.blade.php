@extends('admin.masterTemplate')
@section('menu-name')
ALL JOBS
@endsection
@section('main-content')
<style>
    .tablestyle3 {
        margin: 0;
        padding: 0;
        line-height: 0;
        font-size: 9px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">ALL JOBS</h5>
                </div><!-- /.col -->

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

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped  ">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Deadline</th>
                                        <th>Vacancies</th>
                                        <th>Employee Status</th>
                                        <th class="whatever">Details</th>
                                        <th>Post By</th>
                                        <th>Status</th>
                                        <th>Approved By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($allJobs as $key => $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->job_category }}</td>
                                        <td>{{ $value->application_deadline }}</td>

                                        <td>{{ $value->number_of_vacancies }}</td>
                                        <td>{{ $value->employee_status }}</td>
                                        <td class="whatever">{!! $value->job_description !!}</td>
                                        <td>{{ $value->u_name }}</td>
                                        <td>
                                            @if($value->status == 1)
                                            <i class="fa fa-eye" style="color: green"></i>
                                            @else
                                            <i class="fa fa-eye-slash" style="color: orange"></i>
                                            @endif
                                        </td>
                                        <td>{{ $value->approved_by }}</td>

                                        <td>
                                            <a href="{{route('job.post.edit',$value->id)}}"
                                                class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="" class="btn btn-xs btn-danger"><i
                                                    class="fas fa-trash-alt"></i></a>
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
@endsection
