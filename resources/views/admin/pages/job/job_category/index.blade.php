@extends('admin.masterTemplate')

@section('menu-name')
All Job Category
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Job</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{route('job.Category.create')}}" class="btn btn-sm btn-info float-right"><i
                            class="fa fa-plus-square"></i> Edit New</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-12">
                    @if(session()->has('success'))
                    <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i>All Job Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width=10%>SL</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th width=10%>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category as $key=>$value)
                                    <tr>
                                        <th>{{$key+ 1}}</th>
                                        <th>{{$value->name}}</th>
                                        <th>{{$value->type}}</th>
                                        <th>
                                            <a href="{{route('job.category.edit', $value->id)}}"
                                                class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                            <a onclick="return confirm('Are You Sure')"
                                                href="{{route('job.category.delete', $value->id)}}"
                                                class="btn btn-danger btn-xs"><i class="fas fa-times"></i></a>
                                        </th>
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
</div>

@endsection
