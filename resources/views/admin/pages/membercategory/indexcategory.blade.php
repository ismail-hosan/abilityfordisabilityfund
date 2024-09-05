@extends('admin.masterTemplate')

@section('menu-name')
Member Type
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">MEMBERS category</h5>
                </div>
                <div class="col-sm-6">
                    <a href="{{route('addmember_category')}}" class="btn btn-info float-right btn-sm">Add New</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">

    </div>


    @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

   
    <section class="content">
        <div class="container-fluid">


        @if(session()->has('delete'))
            <div class="alert alert-success">
                {{ session()->get('delete') }}
            </div>
            @endif
        @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
            @endif

            <div class="row">

                <div class="col-12 col-sm-6 col-md-12">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> Members category</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Joining Fee</th>
                                        <th>Incentive</th>
                                        <th>Annual Fee</th>
                                        <th>Plans Detail</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($showcategory as  $key=>$show )
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$show->title}}</td>
                                        <td>{{$show->fee}}</td>
                                        <td>{{$show->incentive}} %</td>
                                        <td>{{$show->yearly}}</td>
                                        <td>{!! $show->plans_detail !!}</td>
                                        <td>
                                        @if($show->status == 0)
                                        <a href="{{'cate_mem_activity/'.$show->id.'/'.$show->status}}" class="btn btn-success btn-sm">Active</a>
                                        @else
                                        <a href="{{'cate_mem_activity/'.$show->id.'/'.$show->status}}" class="btn btn-danger btn-sm">Inactive</a>
                                        @endif
                                        </td>
                                        <td>
                                            <a href="{{'/edit_membercat/'.$show->id}}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>

                                            <!-- <a onclick="return confirm('Are you sure you want to Delete This Record ?')" href="{{'/delet_mcategory/'.$show->id}}" class="btn btn-xs btn-danger"><i -->
                                                    <!-- class="fas fa-trash-alt"></i></a> -->
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