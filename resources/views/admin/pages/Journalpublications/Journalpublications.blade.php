@extends('admin.masterTemplate')
@section('menu-name')
publications
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Journal and publications</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{route('addpublications')}}" class="btn btn-sm btn-info float-right"><i class="fa fa-plus-square"></i> Add New</a>
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
                            <h3 class="card-title"> <i class="fa fa-users"></i> Journal and publications</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">SL</th>
                                        <th style="width: 20%;">Title</th>
                                        <th style="width: 55%;">Description</th>
                                        <th style="width: 10%;">Edit</th>
                                        <th style="width: 10%;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($publication as $key=>$Journal)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$Journal->title}}</td>
                                        <td>{!! $Journal->description !!}</td>
                                        <td><a href="{{'editJournal/'.$Journal->id}}"><button class="btn btn-info"><i class="fas fa-edit"></i></button></a></td>
                                        <td><a onclick="return confirm('Are you sure you want to Delete This Record ?')" href="{{'deleteJournal/'.$Journal->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
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

