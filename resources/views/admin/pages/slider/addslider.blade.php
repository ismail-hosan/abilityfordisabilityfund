
@extends('admin.masterTemplate')

@section('menu-name')
ADD SLIDERS
@endsection
@section('main-content')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">ADD SLIDER</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{ route('sliders') }}" class="btn btn-sm btn-info float-right"><i class="fa fa-plus-square"></i> ALL SLIDERS</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-blue text-center">-: ADD NEW SLIDER :-</div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="POST" action="{{ route('storesliders')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Type</label>
                                            <div class="col-sm-9">
                                                <select name="type" class="form-control">
                                                    <option value="0" selected="" disabled="">Select Slider Type</option>
                                                    <option value="1" >Home Slide</option>
                                                    <option value="2" >Partner</option>
                                                </select>
                                                @error('type')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>    
                                                        {{$message}}
                                                    </strong>
                                                    <br>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="title" value="" class="form-control" id="" placeholder="Slider Title">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-3 col-form-label">Slider Image</label>
                                            <div class="col-sm-9" >
                                                <input type="file" class="form-control" name="image" value="" />
                                                <span style="color: red; font-size: 9px">Image size should be width: 1000px, height: 600px</span>
                                                @error('image')
                                                <div class="alert  alert-danger" style="padding: 0;">
                                                    <strong>    
                                                        {{$message}}
                                                    </strong>
                                                    <br>
                                                </div>
                                                @enderror
                                            </div>

                                        </div>
                                </div>

                                <div class="form-group row">

                                    <div class=" col-sm-3 "></div>
                                    <div class=" col-sm-3 ">
                                        <button type="submit" class="btn btn-info btn-block">SAVE</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div><!-- /.container-fluid -->
<!-- /.content -->

@endsection
<!-- Content Wrapper. Contains page content -->
