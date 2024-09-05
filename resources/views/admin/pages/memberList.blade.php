@extends('admin.masterTemplate')

@section('menu-name')
ALL USERS
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">ALL MEMBERS</h5>
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
            <div class="row">
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-12">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> All Members</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                         <th>SL</th>
                                        <th>ID Number</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                  <tbody>
                                     @foreach ($users as $key => $value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->id_number }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                         <td>{{ $value->phone }}</td>
                                        <td>
                                           @if ($value->payment == 1)
                                          <p class="text-center bg-success" style="padding: 10px;">{{'Paid Member'}}</p> 
                                           @else
                                           <p class="text-center bg-warning" style="padding: 10px;"> {{'Unpaid Member'}} </p>   
                                           @endif
                                       </td>
                                        <td>
                                            <a href="{{ 'view-member/'.$value->id }}" class="btn btn-xs btn-info"><i class="fas fa-desktop"></i></a>
                                            <a href="" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
<!-- Content Wrapper. Contains page content -->
