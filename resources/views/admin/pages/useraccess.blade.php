
@extends('admin.masterTemplate')

@section('menu-name')
GALLERY
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">About Content</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">

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

                    <!-- @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif -->

                    <!-- Profile Image -->
                    <form action="{{route('insert_menu_accessList')}}?>" method="POST" class="form-horizontal" role="form">
                          @csrf
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="user_id" id="user_id">
                                            <option selected="" disabled="">Select User</option>
                                            @foreach($userlist as $each)
                                            <option value="{{$each->id}}">{{$each->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="col-sm-12">

                                    <div id="new_data"></div>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </form>
                    <!-- /.content -->
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function () {
    $('#user_id').change(function () {
        var user_id = $('#user_id').val();
        $.ajax({
            type: "post",
            url: "/get_menu_list", // path to function
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                 user_id: user_id
            },
            success: function (val) {
                $("#new_data").html(val);
            }
        });
    });
});
</script>

@endsection

