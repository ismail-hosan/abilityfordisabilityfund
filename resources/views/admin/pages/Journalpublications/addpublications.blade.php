@extends('admin.masterTemplate')
@section('menu-name')
ADD Journal and publications
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
                            <h3 class="card-title"> <i class="fa fa-list-alt"></i> Add Journal and publications</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('storepublications')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                <input type="text" class="form-control" name="title" placeholder="Title">
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                     
                                        <textarea class="textarea" name="description" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        </textarea>
                                    </div>
                                    <div class=" col-sm-5 "></div>
                                        <div class=" col-sm-6 ">
                                        <button type="submit" class="btn btn-info">SAVE</button>
                                    </div>

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

