@extends('admin.masterTemplate')
@section('menu-name')
Category
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Program</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <button type="button" class="btn btn-sm btn-info float-right" data-toggle="modal"
                        data-target="#modal-lg">
                        <i class="fa fa-plus-square"></i> Add New
                    </button>

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
                            <h3 class="card-title"> <i class="fa fa-users"></i>Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">SL</th>
                                        <th style="width: 20%;">Type</th>
                                        <th style="width: 55%;">Category</th>
                                        <th style="width: 10%;">Delete</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach($viewcategory as $key=>$category)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$category->type}}</td>
                                        <td>{{$category->title}}</td>
                                        <td><a href="{{'deletecategory/'.$category->id}}" onclick="return confirm('Are you sure you want to Delete This Record ?')"><button class="btn btn-danger"><i
                                                        class="fas fa-trash"></i></button></a></td>
                                    </tr>
                                    @endforeach --}}

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



<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <form action="{{route('addcategory')}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Program</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type</label>

                                <select name="type" class="form-control" id="">
                                    <option value="Gallery" >Gallery</option>
                                    <option value="Video" >Video</option>
                                    <option value="About" >About</option>
                                    <option value="Mission" >Mission</option>
                                    <option value="Message" >Message</option>
                                    <option value="Committee" >BIEA Committee</option>
                                    <option value="Cell" >BIEA Cell</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                                    placeholder="Enter Menu name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
@endsection