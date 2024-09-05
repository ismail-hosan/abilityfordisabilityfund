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
                    <h5 class="m-0 text-dark">Zone</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{route('addzone')}}" class="btn btn-sm btn-info float-right"><i
                            class="fa fa-plus-square"></i> Add New</a>
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
                <div class="col-md-10">
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> All Rules</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Divisions </th>
                                        <th>Districts </th>
                                        <th>Thana </th>
                                        <th>Zone</th>
                                        <th style="width: 5%;">Edit</th>
                                        <th style="width: 5%;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($zoneindex as $key=>$zone)
                                    <tr>
                                        <td>{{$zone->divisions}}</td>
                                        <td>{{$zone->districts}}</td>
                                        <td>{{$zone->upazilas}}</td>
                                        <td>{{$zone->zone}}</td>
                                        <td><a href="{{'editzone/'.$zone->id}}"><button class="btn btn-info"><i
                                                        class="fas fa-edit"></i></button></a></td>
                                        <td><a href="{{'deletezone/'.$zone->id}}"><button class="btn btn-danger"><i
                                                        class="fas fa-trash"></i></button></a></td>
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
