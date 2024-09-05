@extends('admin.masterTemplate')
@section('menu-name')
Edit Category
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Edit Category</h5>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h3 class="card-title"> <i class="fa fa-list-alt"></i> Edit Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('job.Category.update',$id)}}" method="POST">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <label> Category *</label>
                                        <input type="text" placeholder="Category name" value="{{$category->name}}"
                                            name="category"
                                            class="form-control @error('category')  is-invalid @else is-valid @enderror">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 col-xs-12 col-sm-12 ">
                                        <label> Type *</label>
                                        <select class="form-control" name="type">
                                            <option selected disabled>--select--</option>
                                            <option {{$category->type == "job" ? "selected":''}} value="job">Job
                                            </option>
                                            <option {{$category->type == "training" ? "selected":''}}
                                                value="training">Training</option>
                                        </select>
                                    </div>
                                </div>
                                @error('type')
                                <span class="error text-danger">{{$message}}</span>
                                @enderror
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
