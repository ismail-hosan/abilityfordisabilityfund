@extends('admin.masterTemplate')

@section('menu-name')
ALL GALLERY Video
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">ALL GALLERY VIdeo</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{route('addshowvideo')}}" class="btn btn-sm btn-info float-right"><i
                            class="fa fa-plus-square"></i> Add Video</a>
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
                    @if(session()->has('succes'))
                    <div class="alert alert-success">
                        {{ session()->get('succes') }}
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> ALL GALLERY VIdeo</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category</th>
                                        <th>VIdeo</th>
                                        <th>Create</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($video as $key=>$videoshow)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$videoshow->title}}</td>
                                        <td> <table style="width:10px" class="table table-bordered table-striped">
                                        <tr><th>Video</th></tr>
                                        <tr><th>   {!! $videoshow->video !!}</th></tr>
                                        </table>
                                        </td>
                                        <td>{{$videoshow->created_at}}</td>
                                        <td>
                                            @if($videoshow->webstatus == 0)
                                            <a href="{{'/activeinactive/'.$videoshow->webstatus.'/'.$videoshow->webid}}">
                                                <button style="width: 50px" class="btn btn-success btn-xs">Active</button>
                                            </a>
                                            @elseif($videoshow->webstatus == 1)
                                            <a href="{{'/activeinactive/'.$videoshow->webstatus.'/'.$videoshow->webid}}"> 
                                                <button style="color: white" class="btn btn-warning btn-xs">Inactive</button>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a onclick="return confirm('Are you sure you want to Delete This Record ?')" href="{{'/deletevideo/'.$videoshow->id}}"
                                                class="btn btn-xs btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
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
</div>
@endsection
<!-- Content Wrapper. Contains page content -->