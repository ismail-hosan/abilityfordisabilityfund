@extends('admin.masterTemplate')
@section('menu-name')
ADD Category
@endsection
@section('main-content')

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">update Category</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="/M-Category" class="btn btn-info btn-sm float-right">All list</a>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-edit"></i> update Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{'/update_mcategory/'.$update->id}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="exampleInputEmail1">Title Name</label>

                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" value="{{$update->title}}" name="title" class="form-control" id="exampleInputEmail1"
                                                placeholder="Title">
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="exampleInputEmail1">Member Fee</label>

                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="number" value="{{$update->fee}}" name="fee" class="form-control" id="exampleInputEmail1"
                                                placeholder="Member Fee">
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="exampleInputEmail1">Incentive (%)</label>

                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" value="{{$update->incentive}}" name="incentive" class="form-control" id="exampleInputEmail1"
                                                placeholder="Incentive">
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="exampleInputEmail1">Annual Fee</label>

                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="number" value="{{$update->yearly}}" name="annual" class="form-control" id="exampleInputEmail1"
                                                placeholder="Annual Fee">
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="exampleInputEmail1">Plans Detail</label>

                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <textarea class="textarea" name="plans_detail" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                  {!! $update->plans_detail !!}
                                        </textarea>
                                        </div>

                                    </div>
                                </div>
                                <p></p>
                                <div class="row col-md-12 offset-md-5">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>



@endsection