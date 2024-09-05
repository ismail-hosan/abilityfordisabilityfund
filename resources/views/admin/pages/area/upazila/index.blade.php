@extends('admin.masterTemplate')
@section('menu-name')
ADD UPAZILA
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Add New Upazila</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    @if($errors->any())
                    <div class="alert alert-danger" {>
                        <ui>
                            @foreach($errors->all() as $error )
                            <li>{{$error}}</li>
                            @endforeach()
                        </ui>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif


                    <div class="card">
                        <div class="card-header">
                            Upazila List
                            <button type="button" class="btn btn-info btn-xs float-right" data-toggle="modal"
                                data-target="#myModal">+ New Upazila</button>
                        </div>
                        <div class="card-body register-card-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <td>SL</td>
                                    <td>District</td>
                                    <td>Name</td>
                                    <td>Bangla Name</td>
                                    <td>Url</td>
                                    <td>Action</td>
                                </thead>

                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach ($upazilas as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->district->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->bn_name }}</td>
                                        <td>{{ $item->url }}</td>
                                        <td>
                                            <a style="color:white" type="button" class="btn btn-info btn-xs"
                                                data-toggle="modal" data-target="#editMyModal">
                                                <i style="color:white"
                                                    onclick="getData('<?php echo $item->id; ?>','<?php echo $item->district_id; ?>','<?php echo $item->name; ?>','<?php echo $item->bn_name; ?>','<?php echo $item->url; ?>')"
                                                    class="ace-icon fa fa-desktop"> EDIT</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>


                        </div>

                    </div><!-- /.card -->


                </div>
            </div>
        </div>
    </section>
</div>


<div class="modal fade" id="editMyModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="{{route('upazila_update')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Name *:</label>
                        <select class="form-control select2" name="district_id" id="district_id" required>
                            <option value="">Select Districts</option>
                            @foreach ($districts as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Name *:</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                        <input type="hidden" name="updateId" class="form-control" id="updateId">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Bangla Name:</label>
                        <input type="text" name="bn_name" class="form-control" id="bn_name">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Url:</label>
                        <input type="text" name="url" class="form-control" id="url">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="{{route('upazila_store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Name *:</label>
                        <select class="form-control select2" name="district_id" id="district_id" required>
                            <option value="">Select Districts</option>
                            @foreach ($districts as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Name *:</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Bangla Name:</label>
                        <input type="text" name="bn_name" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Url:</label>
                        <input type="text" name="url" class="form-control" id="pwd">
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    function getData(uid,district_id, name, bn_name, url){
        $("#updateId").val(uid);
       var district_id =  $("#district_id").val(district_id);
        $("#name").val(name);
        $("#bn_name").val(bn_name);
        $("#url").val(url);
        var value = district_id.options[district_id.selectedIndex].value;
        var text = district_id.options[district_id.selectedIndex].text;
}
</script>

@endsection
