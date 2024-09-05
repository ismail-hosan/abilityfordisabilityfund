@extends('admin.masterTemplate')
@section('menu-name')
ALL APPLIED
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
                    <h5 class="m-0 text-dark">ALL APPLIED</h5>
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
                            <h3 class="card-title"> <i class="fa fa-users"></i>ALL APPLIED</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped tablestyle3">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        {{ Auth::user()->type ==1 ? '<th>Company</th>':'' }}
                                        <th>Applicant</th>
                                        <th>Expected Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $i = 1; ?>
                                    @foreach ($applications as $key => $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        @if(Auth::user()->type == 1)
                                        <td>{{ App\Models\user::where('id',$value->company_id)->pluck('name')->first()
                                            }}
                                        </td>
                                        @endif
                                        <td>{{ App\Models\user::where('id',$value->user_id)->pluck('name')->first() }}
                                        </td>
                                        <td>{{ $value->expectedSalary }}</td>
                                        <td>
                                            <a href="{{route('companyCvView',$value->user_id)}}"
                                                class="btn btn-xs btn-info"><i class="fas fa-desktop"></i>
                                                CV</a>
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
