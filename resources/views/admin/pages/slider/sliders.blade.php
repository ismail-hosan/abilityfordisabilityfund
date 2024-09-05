@extends('admin.masterTemplate')
@section('menu-name')
SLIDERS
@endsection
@section('main-content')
<style>
    .tablestyle3{
        margin: 0;
        padding: 0;
        line-height: 0;
        font-size: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">SLIDERS</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{ route('addslider') }}" class="btn btn-sm btn-info float-right"><i class="fa fa-plus-square"></i> ADD NEW</a>
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
                @if(session()->has('delete'))
                <div class="alert alert-success">
                {{session()->get('delete')}}
                </div>
                @endif
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-users"></i> All Sliders</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Type</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($allSliders as $key => $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->type }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td><img class="profile-user-img img-fluid zoom" src="{{asset('public/slider/' . $value->image)}}"></td>
                                        <td>
                                            @if($value->status == 0)

                                            <form method="post" action="">
                                                @csrf
                                                <a onclick="userStatusChanges('<?php echo $value->id; ?>', '1')" id="statusid" style="width: 60px; color:white"  class="btn btn-success btn-xs">Active</a>
                                                @elseif($value->status == 1)
                                                <a onclick="userStatusChanges('<?php echo $value->id; ?>', '0')" id="statusid"  style="color: white; width: 60px;" class="btn btn-warning btn-xs">Inactive</a>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('Are you sure you want to Delete This Record ?')" href="{{ '/deleteslider/'.$value->id }}" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>
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
    function userStatusChanges(id, status) {

        $.ajax({
            type: "post",
            url: "/sliderStatusChange", // path to function
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                status: status
            },
            success: function (val) {
                try {
                     location.reload();
                } catch (e) {
                    alert('Exception while request..');
                }
            },
            error: function () {
                alert('Error while request..');
            }
        });
    };

</script>
@endsection

