@extends('admin.masterTemplate')

@section('menu-name')
All user
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">ALL User</h5>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">

    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <!-- /.col -->

                <div class="col-12 col-sm-12 col-md-12">

                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <button class="close" data-dismiss="alert"></button>
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    @if(session()->has('Wrong'))
                    <div class="alert alert-warning" role="alert">
                        <button class="close" data-dismiss="alert"></button>
                        {{ session()->get('Wrong') }}
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fas fa-hand-holding-usd"></i> All User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:5%">SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th style="width:20%">Designation</th>
                                        <th style="width:5%">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($userlist as $key=>$user)
                                    <tr>
                                        <th>{{$key+1}}</th>
                                        <th>{{$user->name}}</th>
                                        <th>{{$user->email}}</th>
                                        <th>
                                            @if($user->type == 1)
                                            {{'Admin'}}
                                            @elseif($user->type == 2)
                                            {{'Member'}}
                                            @elseif($user->type == 3)
                                            {{'Job Seeker'}}
                                            @elseif($user->type == 4)
                                            {{'Company'}}
                                            @endif

                                        </th>
                                        <th><button class="btn btn-info" data-toggle="modal" href="#UserDialog"
                                                onclick="getData(<?php echo $user->id ?>)"> <i
                                                    class="fas fa-unlock"></i> </button></th>

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

<div class="modal fade" id="UserDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn btn-info shadow-sm rounded text-center" data-dismiss="modal"><i
                    class="fas fa-times-circle"></i></button>
            <form action="{{route('updateuserpassword')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>New password</label>
                        <input class="form-control" type="password" name="newpassword" placeholder="New password">
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input class="form-control" type="password" name="confirmpassword"
                            placeholder="Confirm password">

                        <input class="form-control" type="hidden" name="getUserId" id="user_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="return confirm('Are you sure?')"
                        class="btn btn-success shadow-lg p-2 rounded text-center">save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
function getData(user_id) {
    $("#user_id").val(user_id);
}
</script>

@endsection